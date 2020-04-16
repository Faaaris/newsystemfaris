<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Proceeding record</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="proceeding.css" rel="stylesheet"></link>
</head>
<body>
<div class="container contact">
	<div class="row">
		<div class="col-md-3"> <!-- bhg kanan -->
			<div class="infotepi">
				<h2>ICITS 2019</h2>
				<h4>INTERNATIONAL CONFERENCE ON INFORMATION TECHNOLOGY & SOCIETY 2019</h4>
					<button type="button" onclick="location.href='searchProceeding.php';" class="btn btn-default buttonkiri">Search title</button>
			</div>
		</div>
		<div class="col-md-9"> <!-- bhg kiri -->
			<div class="contact-form">
				<form class="" method="post" action="insertProceedingProcess.php">
					<fieldset>
                        <legend class="text-xs-center header">Create new Proceeding record</legend>
						
						<?php
						//display info from saverecord.php
						if(isset($_GET['message'])){
							echo "<div class='alert alert-danger' role='alert'>";
							echo $_GET['message']."</div>";
						}
						?>
						<div class="form-group">
						  <label class="control-label col-sm-2" for="id">ID:</label>
						  <div class="col-sm-10">          
							<input name="id" id="id" type="text" placeholder="Enter proceeding ID" class="form-control">
						  </div>
						</div>
						<div class="form-group">
						  <label class="control-label col-sm-2" for="title">Title:</label>
						  <div class="col-sm-10">          
							<input name="title" id="title" type="text" placeholder="Enter proceeding title" class="form-control">
						  </div>
						</div>
						<div class="form-group">
						  <label class="control-label col-sm-2" for="author">Author:</label>
						  <div class="col-sm-10">
							<input name="author" id="author" type="text" placeholder="Main author" class="form-control">
						  </div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="ipt">Institution Code:</label>
                            <div class="col-sm-10">
								<select name="ipt" id="ipt" class="form-control">
									<option value="" style="color:#999;">Please choose one</option>
									<?php
										//database connect
										$dc=mysqli_connect("localhost","root","","newsystem"); 
										if (mysqli_connect_errno()) { 
											printf("Connect failed: %s\n", mysqli_connect_error($db)); 
											exit(); 
										} //end database connect
										
										//command
										$qr=mysqli_query($dc,"select * from institutions");
										while ($data=mysqli_fetch_assoc($qr)){
									?>		
										<option value="<?=$data['institution_code']?>"><?=$data['name']?></option>
									<?php	
										}
									?>
								</select>
                            </div>
                        </div>
						
						<div class="form-group">
						  <label class="control-label col-sm-2" for="email">Email:</label>
						  <div class="col-sm-10">
							<input name="email" id="email" type="text" placeholder="Corresponding Email" class="form-control">
						  </div>
						</div>
						<div class="form-group">
						  <label class="control-label col-sm-2" for="abst">Abstract:</label>
						  <div class="col-sm-10">
							<textarea name="abst" id="abst" class="form-control" placeholder="Enter proceeding abstract" rows="5"></textarea>
						  </div>
						</div>
						<div class="form-group">
						  <label class="control-label col-sm-2" for="keywords">Keyword:</label>
						  <div class="col-sm-10">
							<input name="keywords" id="keywords" type="text" placeholder="Seperate keywords by comma" class="form-control">
						  </div>
						</div>
						<div class="form-group">        
						  <div class="col-sm-11">
							<button type="submit" class="btn btn-default buttonkanan">Save Proceeding</button>
						  </div>
						</div>
					</fieldset>
				</form>	
			</div>
		</div>
	</div>
</div>
</body>