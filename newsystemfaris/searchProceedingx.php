<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>

<style>
	.form-control-borderless {
		border: none;
	}

	.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
		border: none;
		outline: none;
		box-shadow: none;
}
</style>

<body>
<div class="container">
    <br/>
	<div class="row justify-content-center">
		<div class="col-12 col-md-10 col-lg-8">
			<form method="get" action="" class="card card-sm">
				<div class="card-body row no-gutters align-items-center">
					<div class="col-auto">
						<i class="fas fa-search h4 text-body"></i>
					</div>
					<!--end of col-->
					<div class="col">
						<input name="keyword" class="form-control form-control-lg form-control-borderless" id="searchtitle" type="search" placeholder="Search for proceeding title">
					</div>
					<!--end of col-->
					<div class="col-auto">
						<button class="btn btn-lg btn-success" type="submit">Search</button>
					</div>
					<!--end of col-->
				</div>
			</form>
		</div>
		<!--end of col-->
	</div>
</div>

<?php
//database connect
	$dc=mysqli_connect("localhost","root","","newsystem"); 
		if (mysqli_connect_errno()) { 
			printf("Connect failed: %s\n", mysqli_connect_error($db)); 
			exit();
	} //end database connect
	
//embed SQL commands
if(isset($_GET['keyword'])){//based on keyword entered
	$keyword=$_GET['keyword'];
	$sql = "SELECT proceedings.id,proceedings.title,proceedings.author,institutions.name
				FROM proceedings INNER JOIN institutions
				ON proceedings.institution_code = institutions.institution_code 
				WHERE title LIKE '%$keyword%'";
}
else{//first time page load, list all
	$sql = "SELECT proceedings.id,proceedings.title,proceedings.author,institutions.name
				FROM proceedings INNER JOIN institutions
				ON proceedings.institution_code = institutions.institution_code";
}


//execute sql commands that will return result set
$result = mysqli_query($dc, $sql);

//check records fetched available
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    ?>
	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Author</th>
			<th>Institutions</th>
		</tr>
	<?php
    while($row = mysqli_fetch_assoc($result)) {
    	echo "<tr>";
        echo "<td> ".$row['id']."</td>";
        echo "<td> ".$row['title'] ."</td>";
        echo "<td> ".$row['author'] ."</td>";
        echo "<td> ".$row['name'] ."</td>";
        echo "</tr>\n";
    }
    ?>
	</table>
    <?php
} 
else {
    echo "Search not found";
}

//purge dbconnect
mysqli_close($dc);
?>
</body>
</html>