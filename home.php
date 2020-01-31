<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Product List Carousel for Ecommerce Website</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">


</head>


<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Charaktere</h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
				<div class="item carousel-item active">
					<div class="row">

<?php

include("DatabaseHandler.php");
session_start();
$sql = connectToDatabase();

$sth = $sql->prepare("SELECT * FROM charakter");
$sth->execute();

if (($result = $sth->fetchAll()) == TRUE) {

    $statement = $sql->prepare("SELECT c.Name, c.Bildlink
    FROM Charakter c");
    $statement->execute();
    $result = $statement->fetchAll();
 
    foreach ($result as $charakterData) 
    {

        ?>
                        <div class="col-sm-3">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="<?php echo $charakterData[1] ?>" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4> <?php echo $charakterData[0] ?> </h4>
									<a href="#" class="btn btn-primary">Nähere Infos</a>
								</div>						
							</div>
						</div>

        <?php

    }

}

?>

					</div>
				</div>
			</div>
			</a>
		</div>
		</div>
	</div>
</div>
</body>


</html>

