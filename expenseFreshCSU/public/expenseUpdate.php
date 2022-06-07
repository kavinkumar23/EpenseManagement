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

   if(isset($data->name)&& isset($data->price) && !empty(trim($data->name))&& !empty(trim($data->price)&& isset($data->description)&&!empty(trim($data->description)))

          $name = mysqli_real_escape_string($db_conn, trim($data->name));
	      $price = mysqli_real_escape_string($db_conn, trim($data->price));
          $description=mysqli_real_escape_string($db_conn, trim($data->description));
          $expenseid=mysqli_real_escape_string($db_conn, trim($data->expenseid));

          $edit = mysqli_query($db_conn,"UPDATE expense set DB_name='".$name."',DB_price='".$price."' where id= '".$expenseid."' ");

         if($edit){
		    echo json_encode(["success"=>true]);
		    return;
	     }else{
		    echo json_encode(["success"=>false,"msg"=>"Server Problem. Please Try Again"]);
		    return;
	     } 
     } else{
       echo json_encode(["success"=>false,"msg"=>"Please fill all the required fields!"]);
	  return;
   }
 ?>