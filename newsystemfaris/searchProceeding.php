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
				<h4>INTERNATIONAL CONFERENCE ON INFORMATION TECHNOLOGY & SOCIETY 2019</h4>
				
					<button type="button" onclick="location.href='insertProceedingForm.php';" class="btn btn-default buttonkiri">Insert new record</button>
				
			</div>
		</div>
		<div class="col-md-9"> <!-- bhg kiri -->
			<div class="contact-form">
			
				<form method="get" action="" class="card card-sm">
					<div class="card-body row no-gutters align-items-center">
						<!--end of col-->
						<div class="col">
							<input name="keyword" class="form-control form-control-lg form-control-borderless" id="searchtitle" type="search" placeholder="Search for proceeding title">
						</div>
						<!--end of col-->
						
							<button class="btn btn-lg buttonkanan" type="submit">Search</button>
						
						<!--end of col-->
					</div>
				</form>
				
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
				
			</div>
		</div>
	</div>
</div>
</body>