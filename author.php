<?php include 'header.php';

$id = $kullanicicek['id'];
$bloggetir = $db->prepare("SELECT * FROM bloglar WHERE yazar_id=$id ORDER BY tarih DESC ");
$bloggetir->execute(array());

?>


<!-- Begin Top Author Page
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 col-md-offset-2">
			<div class="mainheading">
				<div class="row post-top-meta authorpage">
					<div class="col-md-10 col-xs-12">
						<h1><?= $kullanicicek['isim'] ?></h1>
						<span class="author-description"><?= $kullanicicek['aciklama'] ?></span>
					</div>
					<div class="col-md-2 col-xs-12">
						<img class="author-thumb" src="<?= $kullanicicek['resim'] ?>" alt="Resim Yok">
						
					</div>
					<a href="blog-ekle.php">Blog Ekle</a>
					<p>--</p>
					<a href="kullanici-duzenle.php?id=<?php echo $id?>">Profili Düzenle</a>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Top Author Meta
================================================== -->

<!-- Begin Author Posts
================================================== -->
<div class="graybg authorpage">
	<div class="container">
		<div class="listrecent listrelated">

			<?php foreach ($bloggetir as $blog) { ?>
				<!-- begin post -->
				<div class="authorpostbox">
					<div class="card">
						<a href="post.php?id=<?= $blog['id'] ?>">
							<img class="img-fluid img-thumb" src="<?= $blog['resim'] ?>" alt="<?= $blog['baslik'] ?>">
						</a>
						<div class="card-block">
							<h2 class="card-title"><a href="post.php?id=<?= $blog['id'] ?>"><?= $blog['baslik'] ?></a></h2>
							<h4 class="card-text"><?= $blog['icerik'] ?></h4>
							<div class="metafooter">
							<a href="blog-duzenle.php?id=<?php echo $blog['id']?>">Düzenle</a>
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
										<a href="author.php"><img class="author-thumb" src="<?= $kullanicicek['resim'] ?>" alt="<?= $kullanicicek['isim'] ?>"></a>
									</span>
									<span class="author-meta">
										<span class="post-name"><a href="author.php"><?= $kullanicicek['isim'] ?></a></span><br />
										<span class="post-date"><?= $blog['tarih'] ?></span>
									</span>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- end post -->
		</div>
	</div>
</div>

<?php include 'footer.php' ?>