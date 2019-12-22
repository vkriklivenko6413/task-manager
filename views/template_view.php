<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<link rel="icon" type="image/png" src="./resources/img/favicon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="./resources/css/style.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="./resources/js/app.js"></script>
</head>
<body>
	<div class="wrapper">
		<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<!-- Brand and toggle get grouped for better mobile display -->
    			<div class="navbar-header">
			      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        	<span class="sr-only">Toggle navigation</span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			      	</button>
	      			<a class="navbar-brand" href="/">Task Manager</a>
    			</div>
    			<!-- Collect the nav links, forms, and other content for toggling -->
    			<?php if (isset($_SESSION["is_admin"])) { ?>
    				<p class="navbar-text">Hello, <?php echo $_SESSION['login'] ?></p>
	        	<?php }
      			?>
    			<div class="collapse navbar-right navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
				        <li class="active"><a href="#">Main</a></li>
				        <?php if (!isset($_SESSION["is_admin"])) { ?>
				        <li><a href="#" id="signin">Sign in</a></li>
				    	<?php } ?>
				    	<?php if (isset($_SESSION["is_admin"])) { ?>
				        <li><a href="#" id="logout">logout</a></li>
				    	<?php } ?>
			      	</ul>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
		<?php include './views/'.$content_view; ?>
		<?php include './views/components/sign_in_modal.php'; ?>
	</div>
</body>
</html>