<?php
ob_start();
session_start();
include 'connect.php';
include_once 'functions.php';

$kullanicisor = $db->prepare("SELECT * FROM kullanicilar WHERE email=:email");
$kullanicisor->execute(array(
	'email' => $_SESSION['email']
));
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

if (!isset($_SESSION['email'])) {

	header('location:login.php?durum=gecersizistek');
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="assets/img/favicon.ico">
	<title>Blog</title>
	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Fonts -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="assets/css/mediumish.css" rel="stylesheet">
</head>

<body>

	<!-- Begin Nav
================================================== -->
	<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container">
			<!-- Begin Logo -->
			<a class="navbar-brand" href="index.php">
				<img src="assets/img/logo.png" alt="logo">
			</a>
			<!-- End Logo -->
			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<!-- Begin Menu -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="author.php?id=<?= $kullanicicek['id'] ?>">Profilim</a>
					</li>
					<?php
					if (empty($kullanicicek['email'])) { ?>
						<li class="nav-item">
							<a class="nav-link" href="register.php">Kayıt Ol</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login.php">Giriş Yap</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link" href="core.php?logout=ok"> <i class="fa fa-arrow-right"></i> Çıkış Yap</a>
						</li>
					<?php } ?>
				</ul>
				<!-- End Menu -->
			</div>
		</div>
	</nav>
	<!-- End Nav
================================================== -->

	<!-- Begin Site Title
================================================== -->
	<div class="container">
		<div class="mainheading">
			<h1 class="sitetitle">Mediumish</h1>
			<p class="lead">
				Basit, sade, kullanıcı dostu
			</p>
		</div>
		<!-- End Site Title
================================================== -->