<!------Begin 'header.php'-------->
<html>
<head>
	<title><?php echo title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $includes_uri; ?>/styles.css" />
	<script src="<?php echo $includes_uri; ?>/sorttable.js"></script>
</head>

<body>
<div id='wrap'>
	<div id='header'>
		<h1><?php echo title; ?></h1>
	</div>

<?php include $menu; ?>
<div id='columnbackground'>
<!------ End 'header.php' -------->
