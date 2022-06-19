	<!-- Begin List Posts
	================================================== -->
	<section class="recent-posts">
		<div class="section-title">
			<h2><span>Tüm Bloglar</span></h2>
		</div>
		<div class="card-columns listrecent">
			<?php
			$bloggetir = $db->prepare("SELECT * FROM bloglar");
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
					<a href="post.php">
						<img class="img-fluid" src="<?php echo $blog['resim']?>" alt="">
					</a>
					<div class="card-block">
						<h2 class="card-title"><a href="post.php?id=<?php echo $blog['id']?>"><?php echo $blog['baslik']?></a></h2>
						<h4 class="card-text"><?php echo $blog['icerik']?></h4>
						<div class="metafooter">
							<div class="wrapfooter">
								<span class="meta-footer-thumb">
									<a href="author.php"><img class="author-thumb" src="<?=$yazar['resim']?>" alt="Sal"></a>
								</span>
								<span class="author-meta">
									<span class="post-name"><a href="author.php"><?=$yazar['isim']?></a></span><br />
									<span class="post-date"><?php echo $kategori['kategori_adi']?></span>
								</span>
								<span class="post-read-more"><a href="post.php?id=<?php echo $blog['id']?>" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
											<path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
										</svg></a></span>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- end post -->

		</div>
	</section>
	<!-- End List Posts
	================================================== -->