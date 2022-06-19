<?php include 'header.php';

$kullanicicek = $db->prepare("SELECT * FROM kullanicilar where id=:id");
$kullanicicek->execute(array('id' => $_GET['id']));
$kullanici = $kullanicicek->fetch(PDO::FETCH_ASSOC);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
      <form action="core.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?=$kullanici['id']?>">

        <div class="form-group">
          <img src="<?=$kullanici['resim']?>" width="300"><br>
          <label class="form-label">Kullanıcı Fotoğrafı</label>
          <input type="file" class="form-control" name="resim">
        </div>
        <div class="form-group">
          <label class="form-label">İsim</label>
          <input type="text" class="form-control" name="isim" value="<?=$kullanici['isim']?>">
        </div>
        <div class="form-group">
          <label class="form-label">Soyisim</label>
          <input type="text" class="form-control" name="soyisim" value="<?=$kullanici['soyisim']?>">
        </div>
        <div class="form-group">
          <label class="form-label">Email</label>
          <input type="text" class="form-control" name="email" value="<?=$kullanici['email']?>">
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Açıklama</label>
          <textarea name="aciklama" type="submit" id="ckeditor1"><?=$kullanici['aciklama']?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="kullaniciduzenle">Düzenle</button>
        <a href="kullanicilar.php" class="btn btn-warning">Geri Dön</a>
      </form>
    </div>
  </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php' ?>