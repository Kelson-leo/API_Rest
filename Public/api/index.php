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
$method = $_SERVER["REQUEST_METHOD"]; //POST, PUT, DELETE and GET
$uri = $_SERVER["REQUEST_URI"];
$data = null;
parse_str(file_get_contents('php://input'), $data); //parse_str é pra transofmrar em array

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

//FIM TRATA A URI

switch ($method) {
	case 'GET':
		if ($controller != null && $id == null) {
			echo (new \App\Controller\GameController()) -> readAll();
		}elseif($controller != null && $id != null) {
			echo (new \App\Controller\GameController()) -> readById($id);
		}else {
			echo json_encode(["result" => "invalid"]); //poderia tbm ser só "echo json_encode(array("", ""));"
		}
		break;
	case 'POST':
		if ($controller != null && $id == null) {
			echo (new \App\Controller\GameController()) -> create($data);
		}else {
			echo json_encode(["result" => "invalid"]);
		}
		break;
	case 'PUT':
		if ($controller != null && $id != null) {
			echo (new \App\Controller\GameController()) -> update($id, $data);
		}else {
			echo json_encode(["result" => "invalid"]);
		}
		break;
	case 'DELETE':
		if ($controller != null && $id != null) {
			echo (new \App\Controller\GameController()) -> delete($id);
		}else {
			echo json_encode(["result" => "invalid"]);
		}
		break;
	
	default:
		echo json_encode(["result" => "invalid request"]);
		break;
}
//var_dump($ex);

//echo json_encode(["controller"=>$controller, "id"=>$id]);

 ?>