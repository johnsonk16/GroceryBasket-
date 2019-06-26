<?php
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
   echo 'favorites';
    echo 'CONNECTED TO DB';
 ?>


<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/home.css"> <!-- Resource style -->
  	<link rel="stylesheet" href="css/demo.css"> <!-- Demo style -->
  	<link rel="stylesheet" href="css/carousel.css"> <!-- Carousel style -->
  	
	<title>Grocery Basket</title>
</head>
<body>
	<header class="cd-main-header">
		<header>
     		<?php include 'header.php';?>
    	</header>
  	</header>
  	<br>
  	<div class="cd-intro">
  		<h1>Just For You</h1>  
	</div>
  <body>  
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-center m-auto">
          <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				      <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>   
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
              <div class="item carousel-item active">
                <div class="row">
                  <div class="col-sm-4">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="/examples/images/cities/london.png" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4>Pic 1</h4>
									<p>Please add favorites to curate a Just For a List</p>
									<a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
								</div>						
							</div>
						</div>
						<div class="col-sm-4">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="/examples/images/cities/new-york.png" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4>J4U</h4>
									<p>Please add favorites to curate a Just For a List</p>
									<a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
								</div>						
							</div>
						</div>				
						<div class="col-sm-4">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="/examples/images/cities/paris.png" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4>J4U</h4>
									<p>Please add favorites to curate a Just For a List</p>
									<a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
								</div>						
							</div>					
						</div>
					</div>
				</div>
				<div class="item carousel-item">
					<div class="row">
						<div class="col-sm-4">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="/examples/images/cities/kuala-lumpur.png" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4>J4u</h4>
									<p>Please add favorites to curate a Just For a List</p>
									<a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
								</div>						
							</div>
						</div>
						<div class="col-sm-4">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="/examples/images/cities/agra.png" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4>J4U</h4>
									<p>Please add favorites to curate a Just For a List</p>
									<a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
								</div>						
							</div>
						</div>
						<div class="col-sm-4">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="/examples/images/cities/dubai.png" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4>J4U</h4>
									<p>Please add favorites to curate a Just For a List</p>
									<a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
								</div>						
							</div>					
						</div>
					</div>
				</div>
				<div class="item carousel-item">
					<div class="row">
						<div class="col-sm-4">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="/examples/images/cities/rio-de-janeiro.png" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4>J4U</h4>
									<p>Please add favorites to curate a Just For a List</p>
									<a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
								</div>						
							</div>
						</div>
						<div class="col-sm-4">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="/examples/images/cities/giza.png" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4>J4U</h4>
									<p>Please add favorites to curate a Just For a List</p>
									<a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
								</div>						
							</div>
						</div>
						<div class="col-sm-4">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="/examples/images/cities/sydney.png" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4>J4U</h4>
									<p>Please add favorites to curate a Just For a List</p>
									<a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
								</div>						
							</div>					
						</div>
					</div>
				</div>
			</div>
			<!-- Carousel controls -->
			<a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
		</div>
	</div>
</div>

<script src="js/placeholders.min.js"></script> <!-- polyfill for the HTML5 placeholder attribute -->
<script src="js/main.js"></script> <!-- Resource JavaScript -->
</body>
</html>                                		                            