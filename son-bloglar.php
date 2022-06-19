	<!-- Begin Featured
	================================================== -->
	<section class="featured-posts">
		<div class="section-title">
			<h2><span>Son Eklenen Bloglar</span></h2>
		</div>
		<div class="card-columns listfeaturedtag">

			<?php
			$bloggetir = $db->prepare("SELECT * FROM bloglar ORDER BY tarih DESC LIMIT 4");
			$bloggetir->execute(array());

			foreach ($bloggetir as $blog) {
				$yazar_id = $blog['yazar_id'];
				$yazarcek = $db->prepare("SELECT * FROM kullanicilar WHERE id=$yazar_id");
				$yazarcek->execute(array());
				$yazar = $yazarcek->fetch(PDO::FETCH_ASSOC);

				$kategori_id = $blog['kategori_id'];
				$kategoricek = $db->prepare("SELECT * FROM kategoriler WHERE id=$kategori_id");
				$kategoricek->execute(array());
				$kategori = $kategoricek->fetch(PDO::FETCH_ASSOC);
			?>
				<!-- begin post -->
				<div class="card">
					<div class="row">
						<div class="col-md-5 wrapthumbnail">
							<a href="post.php?id=<?=$blog['id']?>">
								<div class="thumbnail" style="background-image:url(<?= $blog['resim'] ?>);">
								</div>
							</a>
						</div>
						<div class="col-md-7">
							<div class="card-block">
								<h2 class="card-title"><a href="post.php?id=<?=$blog['id']?>"><?= $blog['baslik'] ?></a></h2>
								<h4 class="card-text"><?= kisalt($blog['icerik'],189) ?></h4>
								<div class="metafooter">
									<div class="wrapfooter">
										<span class="meta-footer-thumb">
											<a href="author.php?id=<?= $yazar['id'] ?>"><img class="author-thumb" src="<?= $yazar['resim'] ?>" alt="Sal"></a>
										</span>
										<span class="author-meta">
											<span class="post-name"><a href="author.php?id=<?= $yazar['id'] ?>"><?= $yazar['isim'] ?></a></span><br />
											<span class="post-name"><?=$kategori['kategori_adi']?></span><br />
											<span class="post-date"><?= $blog['tarih'] ?></span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end post -->
			<?php }  ?>
		</div>
	</section>
	<!-- End Featured
	================================================== -->