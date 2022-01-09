
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>User Form</title>
	<link href="w3.css" rel="stylesheet">
	<link href="colors.css" rel="stylesheet" type="text/css">
	<link href="w3.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
	
<body class="hstuff">

	<?php
		
		$fnerr = $lnerr = $eerr = $perr = $adderr = $zerr = $cerr = " ";
		$name = $last = $email = $phone = $address = $zip = $city = " ";
		$boolen = false;

		if($_SERVER["REQUEST_METHOD"]=="POST"){


		function validate_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		//$str?
		function strlenght($str){
			$ln = strlen($str);
			if($ln < 10){
				return "Phone number too short or invalid";
			}
			elseif($ln > 10) {
				return "Invalid Phone number";
			}
			return;
		}
		$lenght = strlenght($_POST["phone"]);
		/*
		function str2lenght($str2){
			$ln2 = strlen($str2);
			if($ln2 < 5){
				return "Postcode too short or invalid";
			}elseif($ln2 > 6) {
				return "Invalid Postcode";
			}
			return;
		}
		$lenght2 = str2lenght($_POST["zip"]);
		*/

			if(empty($_POST["name"])){
				$fnerr = "First Name required...!";
				$boolen = false;
			}else{
				$name = validate_input($_POST["name"]);
				$boolen = true;
			}
			/*
			if(empty($_POST["last"])){
				$lnerr = "Last Name required...!";
				$boolen = false;
			}else{
				$last = validate_input($_POST["last"]);
				$boolen = true;
			}
			*/
			if(empty($_POST["email"])){
				$eerr = "Email required...!";
				$boolen = false;
			}elseif (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
				//is FILTER_VALIDATE_EMAIL correct?
				$eerr = "Invalid Email";
				$boolen = false;
			}else{
				$email = validate_input($_POST["email"]);
				$boolen = true;
			}

			if(empty($_POST["phone"])){
				$perr = "Phone Number required...!";
				$boolen = false;
			}elseif($lenght){
				$perr = $lenght;
				$boolen = true;
			}else{
				$phone = validate_input($_POST["phone"]);
				$boolen = true;
			}

			if(empty($_POST["address"])){
				$adderr = "Address required...!";
				$boolen = false;
			}else{
				$address = validate_input($_POST["address"]);
				$boolen = true;
			}
			/*
			if(empty($_POST["zip"])){
				$zerr = "Postcode required...!";
				$boolen = false;
			}elseif($lenght2){
				$zerr = $lenght2;
				$boolen = true;
			}else{
				$zip = validate_input($_POST["zip"]);
				$boolen = true;
			}

			if(empty($_POST["city"])){
				$cerr = "Locality required...!";
				$boolen = false;
			}else{
				$city = validate_input($_POST["city"]);
				$boolen = true;
			}*/
		}

	?>

	<p class="menu"><a href="index.html" title="Artturi - Etusivu">Etusivu</a> | <a href="harr.html" title="Artturi - Harrastukset">Harrastukset</a> | <a href="portf.html" title="Artturi - Portfolio">Portfolio</a></p>
	<br>

	<div id="page">
		<form action="json.php" method="post">
			<p>
				<label>First Name</label>
				<input type="text" name="name" id="name" class="w3-input w3-border"/>
				<!--required=""-->
				<span id="c1" class="glyphicon glyphicon-user"></span>
			</p>
			<span><?php echo $fnerr; ?></span>
			<!--p>
				<label>Last Name</label>
				<input type="text" name="last" id="last" class="w3-input w3-border"/>
				<span id="c2" class="glyphicon glyphicon-user"></span>
			</p-->
			<!--span></?php echo $lnerr; ?></span-->
			<p>
				<label>Email</label>
				<input type="email" name="email" id="email" class="w3-input w3-border"/>
				<span id="c3" class="glyphicon glyphicon-envelope"></span>
			</p>
			<span><?php echo $eerr; ?></span>
			<p>
				<label>Phone Number</label>
				<input type="tel" name="phone" id="phone" class="w3-input w3-border"/>
				<span id="c4" class="glyphicon glyphicon-envelope"></span>
			</p>
			<span><?php echo $perr; ?></span>
			<p>
				<label>Address</label>
				<textarea name="address" id="address" class="w3-input w3-border"></textarea>
				<span id="c5" class="glyphicon glyphicon-envelope"></span>
			</p>
			<span><?php echo $adderr; ?></span>
			<!--p>
				<label>Postcode</label>
				<textarea name="zip" id="zip" class="w3-input w3-border"></textarea>
				<span id="c6" class="glyphicon glyphicon-envelope"></span>
			</p-->
			<!--span></?php echo $zerr; ?></span-->
			<!--p>
				<label>City/Municipality</label>
				<textarea name="city" id="city" class="w3-input w3-border"></textarea>
				<span id="c7" class="glyphicon glyphicon-envelope"></span>
			</p-->
			<!--span></?php echo $cerr; ?></span-->

			<div class="g-recaptcha" data-sitekey=""></div>
			<!--WIP-->
			<br>
			<input type="submit" name="submit" value="Submit" class="w3-button w3-green"/><!--id="submit"-->
		</form>

		<script>

			$(document).ready(function(){
				var icon ="";
				var $txt1 = $("name");
				var $txt2 = $("last");
				var $txt3 = $("email");
				var $txt4 = $("phone");
				var $txt5 = $("address");
				var $txt6 = $("zip");
				var $txt7 = $("city");
				//something for captcha check?
				
				$("input").focus(function(){
					var id = document.ActiveElement.id;

					if(id="name") {
						//$("#c1").css("color","green");
						//icon = "#c1";

					}
					if(id="last") {
						//$("#c2").css("color","green");
						//icon = "#c2";

					}
					if(id="email") {
						//$("#c3").css("color","green");
						//icon = "#c3";

					}
					if(id="phone") {
						//$("#c4").css("color","green");
						//icon = "#c4";

					}
					if(id="address") {
						//$("#c5").css("color","green");
						//icon = "#c5";

					}
					if(id="zip") {
						//$("#c6").css("color","green");
						//icon = "#c6";

					}
					if(id="city") {
						//$("#c7").css("color","green");
						//icon = "#c7";

					}
				});

				$("input").blur(function(){
					$(icon).css("color","#b2b2b2");
					if($txt1.val() != ""){
						//$("#c1").css("color","green");
					}
				});
				$("input").blur(function(){
					$(icon).css("color","#b2b2b2");
					if($txt2.val() != ""){
						//$("#c2").css("color","green");
					}
				});
				$("input").blur(function(){
					$(icon).css("color","#b2b2b2");
					if($txt3.val() != ""){
						//$("#c3").css("color","green");
					}
				});
				$("input").blur(function(){
					$(icon).css("color","#b2b2b2");
					if($txt4.val() != ""){
						//$("#c4").css("color","green");
					}
				});
				$("input").blur(function(){
					$(icon).css("color","#b2b2b2");
					if($txt5.val() != ""){
						//$("#c5").css("color","green");
					}
				});
				$("input").blur(function(){
					$(icon).css("color","#b2b2b2");
					if($txt6.val() != ""){
						//$("#c6").css("color","green");
					}
				});
				$("input").blur(function(){
					$(icon).css("color","#b2b2b2");
					if($txt7.val() != ""){
						//$("#c7").css("color","green");
					}
				});
			});

		</script>
	</div>

</body>
<!--footer >
	<div id="page">
		<div id="footer">
			<p>© Artturi Martynov 2021</p>
		</div>
	</div>
</footer-->
</html>