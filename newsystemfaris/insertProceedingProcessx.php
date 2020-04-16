<?php
$id=$_POST['id'];
$title=$_POST['title'];
$author=$_POST['author'];
$ipt=$_POST['ipt'];
$email=$_POST['email'];
$abstract=$_POST['abst'];
$keywords=$_POST['keywords'];
	
if(($id==NULL)||($title==NULL)){
/* 	
	The reason I did not use 'isset' function is because it is not consistent. 
	Sometimes browser can execute the function but sometimes no.
	So I put a condition where it is the same as 'isset'.
*/
	header("Location: insertProceedingForm.php");
}
else{
	
	//database connect
	$dc=mysqli_connect("localhost","root","","newsystem"); 
		if (mysqli_connect_errno()) { 
			printf("Connect failed: %s\n", mysqli_connect_error($db)); 
			exit();
	} //end database connect
		
	$sql="INSERT INTO proceedings (id,title,author,institution_code,email,abstract,keywords) 
			VALUES ('$id','$title','$author','$ipt','$email','$abstract','$keywords')";
	
	mysqli_query($dc,$sql);

	echo "ayy success"; 
	//redirect to forminsert.php
	//header("Location: forminsert.php?message=New+student+$name+saved");
}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Proceeding record</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<!--<link href="style.css" rel="stylesheet">-->
	
	<style>
		.header {
			color: #36A0FF;
			font-size: 27px;
			padding: 10px;
		}
	</style>
</head>
<body>


</body>
</html>