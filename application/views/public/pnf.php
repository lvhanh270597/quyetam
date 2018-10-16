<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>404 HTML Template by Colorlib</title>

	<!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"> </script>
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style_pnf.css'); ?>" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

<script>
    var imageUrl = '<?php echo base_url('assets/emoji.png'); ?>';
    $(document).ready(function(){
        $(".notfound .notfound-404").css('background-image', 'url(' + imageUrl + ')');
    });    
</script>
</head>

<body>

<canvas id="canvas"></canvas>
<link rel="stylesheet" href="<?php echo base_url('assets/css/snow.css'); ?>">
<script src="<?php echo base_url('assets/js/snow.js') ?>"> </script>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404"></div>
			<h1>404</h1>
			<h2>Oops! Page Not Be Found</h2>
			<p>Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
			<a href="<?php echo base_url(); ?>">Back to homepage</a>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
