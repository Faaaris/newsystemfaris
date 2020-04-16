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
	header("Location: insertProceedingForm.php?message=ID+and+Title+was+not+inserted.+Insertion failed.");
}
else{
	
	//database connect
	$dc=mysqli_connect("localhost","root","","newsystem"); 
		if (mysqli_connect_errno()) { 
			printf("Connect failed: %s\n", mysqli_connect_error($db)); 
			exit();
	} //end database connect
	
	//before inserting, check for availability of ID and TITLE
	$select_id="SELECT id FROM proceedings WHERE id LIKE '%$id%'";
	$result_id=mysqli_query($dc,$select_id);
	if (mysqli_num_rows($result_id)>0){
		header("Location: insertProceedingForm.php?message=ID+inserted+is+not+available");
	}
	$select_title="SELECT title FROM proceedings WHERE title LIKE '%$title%'";
	$result=mysqli_query($dc,$select_title);
	if (mysqli_num_rows($result)>0){
		header("Location: insertProceedingForm.php?message=Title+inserted+is+not+available");
	}
	
	
	$sql="INSERT INTO proceedings (id,title,author,institution_code,email,abstract,keywords) 
			VALUES ('$id','$title','$author','$ipt','$email','$abstract','$keywords')";
	
	mysqli_query($dc,$sql);
}
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Proceeding record</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="proceeding.css" rel="stylesheet">
</head>

<body>
<div class="container contact">
	<div class="row">
		<div class="col-md-3"> <!-- bhg kanan -->
			<div class="infotepi">
				<h2>ICITS 2019</h2>
				<h4>Insert the details to create a new proceeding record </h4>
				
					<button type="button" onclick="location.href='searchProceeding.php';" class="btn btn-default buttonkiri">Search title</button>
				
			</div>
		</div>
		<div class="col-md-9"> <!-- bhg kiri -->
			<div class="contact-form">
				<h4>INTERNATIONAL CONFERENCE ON INFORMATION TECHNOLOGY & SOCIETY 2019</h4>
			</div>
			<div class="contact-form">
				<h5>The recorded information are:</h5>
				<?php 
					echo "ID: $id<br>Title: $title<br>Author: $title<br>Institution: $ipt<br>Email: $email<br>Abstract: $abstract<br>Keywords: $keywords";
				?>
			</div>
			<button type="button" onclick="location.href='insertProceedingForm.php';" class="btn btn-default buttonkanan">Insert new Proceeding</button>
		</div>
	</div>
</div>
</body>