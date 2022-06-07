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


   $allExpense = mysqli_query($db_conn,"SELECT * FROM expense order by id desc");
		if(mysqli_num_rows($allExpense) > 0){
			while($row_expense = mysqli_fetch_array($allExpense)){ 
				$json_array[] = array(
				  'id' =>  $row_expense['id'],
				  'DB_name' =>  $row_expense['DB_name'],
				  'DB_price' =>  $row_expense['DB_price'],
                  'DB_description' => $row_description[DB_description],
				);
			}
			echo json_encode(["success"=>true,"fetchexpense"=>$json_array]);
			return;
		}
		else{
			echo json_encode(["success"=>false]);
			return;
		}
 ?>