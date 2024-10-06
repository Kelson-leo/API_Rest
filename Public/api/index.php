<?php 

require_once("../../vendor/autoload.php"); //agora tem acesso a "App"

//HEADER 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$controller = null;
$id = null; //param
$data = null;
$method = $_SERVER["REQUEST_METHOD"]; //POST, PUT, DELETE and GET
$uri = $_SERVER["REQUEST_URI"];
$unsetCount = 4;

//TRATA A URI
$ex = explode("/", $uri);

for ($i=0; $i < $unsetCount; $i++) { 
	unset($ex[$i]);
}

$ex = array_filter(array_values($ex)); //filtra se tem vazio, e começa do zero os indice do array

if(isset($ex[0])) {
	$controller = $ex[0];
}

if(isset($ex[1])) {
	$id = $ex[1];
}

var_dump($ex);

parse_str(file_get_contents('php://input'), $data); //parse_str é pra transofmrar em array
echo json_encode(["controller"=>$controller, "id"=>$id]);

 ?>