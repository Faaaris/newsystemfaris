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
		.isa_info{
			margin: 10px 0px;
			padding:12px;
			color: #9F6000;
			background-color: #FEEFB3;
			border-radius:.5em;
		}
		
	
	</style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
			
                <form class="" method="post" action="insertProceedingProcess.php">
                    <fieldset>
                        <legend class="text-xs-center header">Create new Proceeding record</legend>
						
						<?php
						//display info from saverecord.php
						//if(isset($_GET['message'])){
							echo "<div class='isa_info'>";
							echo "Replace this text with your own INFO text.</div>";
							//echo $_GET['message']."</div>";
						//}
						?>
							
                        <div class="form-group">
                            <div class="col-md-8">
                                <input name="id" type="text" placeholder="ID" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <input name="title" type="text" placeholder="Title" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                           
                            <div class="col-md-8">
                                <input name="author" type="text" placeholder="Author" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            
                            <div class="col-md-8">
								<select name="ipt" class="form-control" required>
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
										while ($data=mysqli_fetch_array($qr)){
									?>		
										<option value="<?=$data['institution_code']?>"><?=$data['name']?></option>
									<?php	
										}
									?>
								</select>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-8">
                                <input name="email" type="text" placeholder="Corresponding Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            
                            <div class="col-md-8">
                                <textarea class="form-control" name="abst" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="col-md-8">
                                <input name="keywords" type="text" placeholder="Keyword seperated by comma" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-xs-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>