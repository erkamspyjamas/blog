	<?php
	include 'header.php';

	$blogcek = $db->prepare("SELECT * FROM bloglar WHERE id= :id");
	$blogcek->execute(array('id' => $_GET['id']));
	$blog = $blogcek->fetch(PDO::FETCH_ASSOC);

	$yazar_id = $blog['yazar_id'];
	$yazarcek = $db->prepare("SELECT * FROM kullanicilar WHERE id=$yazar_id");
	$yazarcek->execute(array());
	$yazar = $yazarcek->fetch(PDO::FETCH_ASSOC);

	?>

	<!-- Begin Article
================================================== -->
	<div class="container">
		<div class="row">

			<!-- Begin Fixed Left Share -->
			<div class="col-md-2 col-xs-12"></div>
			<!-- End Fixed Left Share -->

			<!-- Begin Post -->
			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<div class="mainheading">

					<!-- Begin Top Meta -->
					<div class="row post-top-meta">
						<div class="col-md-2">
							<a href="author.php"><img class="author-thumb" src="<?=$yazar['resim']?>" alt=""></a>
						</div>
						<div class="col-md-10">
							<a class="link-dark" href="author.php"></a><a href="#" class="btn follow"><?php echo $yazar['isim'] ?></a>
							<br>
							<span class="author-description"><?php echo $yazar['aciklama'] ?></span>
							<br>

							<span class="post-date"><?= $blog['tarih'] ?></span>
						</div>
					</div>
					<!-- End Top Menta -->

					<h1 class="posttitle"><?= $blog['baslik'] ?></h1>

				</div>

				<!-- Begin Featured Image -->
				<img class="featured-image img-fluid" src="<?= $blog['resim'] ?>" alt="">
				<!-- End Featured Image -->

				<!-- Begin Post Content -->
				<div class="article-post">
					<p>
						<?= $blog['icerik'] ?>
					</p>
				</div>
				<!-- End Post Content -->

			</div>
			<!-- End Post -->

		</div>
	</div>
	<!-- End Article
================================================== -->

	<!-- Begin Footer
================================================== -->
	<?php include 'footer.php' ?>