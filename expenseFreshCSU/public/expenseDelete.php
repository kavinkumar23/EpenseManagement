<php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
    header("Content-type:application/json");

    $db_conn = mysqli_connect("localhost","root","Crmkavin@23","expense","","");

    f($db_conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    error_reporting(E_ALL);
    ini_set('display_errors','Off');
    $data = json_decode(file_get_contents("php://input"));


    $expenseid=mysqli_real_escape_string($db_conn, trim($data->expenseid));

    $allExpenses = mysqli_query($db_conn,"Delete FROM expense where id=$expenseid");
    if($expenseid){ 
		echo json_encode(["success"=>true]);
		return;
	}
	else{
		echo json_encode(["success"=>false]);
		return;
	}
?>