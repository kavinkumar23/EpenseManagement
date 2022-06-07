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

    
    echo "received data";
    print_r($data_arr);


  if(isset($data->name)&& isset($data->price) && !empty(trim($data->name))&& !empty(trim($data->price)&& isset($data->description)&&!empty(trim($data->description)))
    {
	     $name = mysqli_real_escape_string($db_conn, trim($data->name));
	     $price = mysqli_real_escape_string($db_conn, trim($data->price));
         $description=mysqli_real_escape_string($db_conn, trim($data->description));
         $add = mysqli_query($db_conn,"insert into expense (DB_name,DB_price,DB_description) values('$name','$price','$description')");

         if($add){
		    $last_id = mysqli_insert_id($db_conn);
		    echo json_encode(["success"=>true,"newids"=>$last_id]);
		    return;
         }else{
            echo json_encode(["success"=>false,"msg"=>"Server Problem. Please Try Again"]);
		    return;
         } 
	
    }
?>