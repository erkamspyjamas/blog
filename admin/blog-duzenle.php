<?php include 'header.php';
$kategoriler = $db->prepare("SELECT * FROM kategoriler");
$kategoriler->execute(array());

$yazarlar = $db->prepare("SELECT * FROM kullanicilar");
$yazarlar->execute(array());

$blogcek = $db->prepare("SELECT * FROM bloglar where id=:id");
$blogcek->execute(array('id' => $_GET['id']));
$blog = $blogcek->fetch(PDO::FETCH_ASSOC);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
      <form action="../core.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?=$blog['id']?>">

        <div class="form-group">
          <img width="250" src="<?=$blog['resim']?>" alt="">
          <label class="form-label">Blog Fotoğrafı</label>
          <input type="file" class="form-control" name="resim">
        </div>
        <div class="form-group">
          <label class="form-label">Blog Başlık</label>
          <input type="text" class="form-control" name="baslik" placeholder="Başlık" value="<?=$blog['baslik']?>">
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Blog İçerik</label>
          <textarea name="icerik" type="submit" id="ckeditor1"><?=$blog['icerik']?></textarea>
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Blog Yazarı</label><br>
          <select class="form-control" aria-label="Default select example" name="yazar_id">
            <?php foreach($yazarlar as $yazar){ ?>
              <option value="<?=$yazar['id']?>" <?=$blog['yazar_id']==$yazar['id'] ? "selected" : "" ?> ><?php echo $yazar['isim'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Blog Tarih</label>
          <input type="date" class="form-control" name="tarih" value="<?=$blog['tarih']?>">
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Blog Kategorisi</label><br>
          <select class="form-control" aria-label="Default select example" name="kategori_id">
            <?php foreach($kategoriler as $kategori){ ?>
              <option value="<?=$kategori['id']?>" <?=$blog['kategori_id']==$kategori['id'] ? "selected" : "" ?> ><?php echo $kategori['kategori_adi'] ?></option>
            <?php } ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary" name="blogduzenle">Düzenle</button>
        <a href="bloglar.php" class="btn btn-warning">Geri Dön</a>
      </form>
    </div>
  </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php' ?>