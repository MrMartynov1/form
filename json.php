<?php
if(isset($_POST['submit']) && $_POST['g-recaptcha-response'] != ""){
	//recaptcha primary code here-------------------------------^
	//WIP
	//include "db_config.php"; unnecessary

	/*$servername='localhost';
    $username='root';
    $password='';
    $dbname="mydatabase";
    $conn=mysqli_connect($servername, $username, $password, "$dbname");
        if(!$conn) {
            die('Cold not connect to MySQL server:' .mysql_error());
        }
	*/
	//
	$secret ="";//recaptcha secret code here
	$verifyResponse = file_get_contents('' . $secret . '&response=' . $_POST['g-recaptcha-response']);
	//WIP
	$responseData = json_decode($verifyResponse);
	if ($responseData->success) {
	//
	header("Content-Type: application/json; charset=UTF-8");
	$dbh = new PDO('mysql:host=localhost;dbname=mydatabase', 'root', '');

	$array = [
		"id" => "",
		"name" => $_POST['name'],
		"email" => $_POST['email'],
		"phone" => $_POST['phone'],
		"address" => $_POST['address'],
		//add last, zip & city
	];

	function insertjson($array){
		return json_encode($array);
	}
	function viewjson($dbh){
		$stmt = $dbh->prepare("SELECT * FROM addata");
		$stmt->execute();
		$arr = array();
		while($opt = $stmt->fetch()){
			$arr[] = $opt;
		}
		echo json_encode($arr);
	}
	function insertmysql ($dbh, $data){
		$stmt = $dbh->prepare("INSERT INTO addata VALUES (?,?,?,?,?)");
		$stmt->bindParam(1, $id);
		$stmt->bindParam(2, $name);
		$stmt->bindParam(3, $email);
		$stmt->bindParam(4, $phone);
		$stmt->bindParam(5, $address);
		//add last, zip, city & check ?s

		// insert 1 row
		$id = $data['id'];
		$name = $data['name'];
		$email = $data['email'];
		$phone = $data['phone'];
		$address = $data['address'];
		$stmt->execute();
	}
	function formjsonmysql($dbh, $array){
		$myjson = insertjson($array);
		$obj = json_decode($myjson, true);
		insertmysql($dbh, $obj);
		viewjson($dbh);
	}

	formjsonmysql ($dbh, $array);
}
else{
	header('Location: Form.php');
}
}
?>