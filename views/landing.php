<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Universal FQA Calculator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/fqa.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    
    <script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fqa.js"></script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
    	<div class="navbar-inner">
        	<div class="container">
          		<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          		<a class="brand" href="index.html">Universal FQA</a>
          		<div class="nav-collapse collapse pull-right">
            		<ul class="nav pull-right">
              			<li><a href="php/login.php">Login / Register</a></li>
            		</ul>
          		</div>
        	</div>
      	</div>
    </div>
	<br>
    <div class="container padding-top">
		<div class="nice_margins">
			<div class="row-fluid">
				<div class="span3">
					<img src="images/blue-eyed.jpg" class="img-rounded">
				</div>
				<div class="span9">
					<!-- <img src="images/header4.png"> -->
					<h1>Universal FQA Calculator</h1>
					<br><br>
					<p class="nice-text">
						Floristic Quality Assessments (FQAs) are a measurement of a natural area's habitat condition or quality.
					</p>
					<p class="nice-text">
					This tool will calculate site inventory and transect FQAs. Any existing FQA database can be used or modified, and as new FQA databases are developed they can be uploaded.
					Help expand this tool by uploading your region's list of species and their coefficients of conservatism.
					</p>
					<button class="btn btn-info" onclick="window.location='php/login.php';">Login / Register</button> 
				</div>
			</div>
			
		</div>
    </div> 
    <br><br><br><br><br><br><br><br><br>		
	<footer class="footer">
		<div class="container">
			<p><a href="http://universalFQA.org">universalFQA.org</a> | <a href="about.html">About this site</a></p>
		</div>
	</footer>
  </body>
</html>