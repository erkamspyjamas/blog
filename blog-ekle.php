<?php include 'header.php';

$kategoriler = $db->prepare("SELECT * FROM kategoriler");
$kategoriler->execute(array());

$yazarlar = $db->prepare("SELECT * FROM kullanicilar");
$yazarlar->execute(array());

$id = $kullanicicek['id'];
$bloggetir = $db->prepare("SELECT * FROM bloglar WHERE yazar_id=$id");
$bloggetir->execute(array());


?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
      <form action="core.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label class="form-label">Blog Fotoğrafı</label>
          <input type="file" class="form-control" name="resim">
        </div>
        <div class="form-group">
          <label class="form-label">Blog Başlık</label>
          <input type="text" class="form-control" name="baslik" placeholder="Başlık">
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Blog İçerik</label>
          <textarea name="icerik" type="submit" id="ckeditor1"></textarea>
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Blog Yazarı</label><br>
         <b> <?= $kullanicicek['isim'] ?> </b>
        <input type="hidden" name="yazar_id" value="<?php echo $id ?>">
        </div>
        <div class="form-group">
          <label class="form-label">Blog Tarih</label>
          <input type="date" class="form-control" name="tarih">
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Blog Kategorisi</label><br>
          <select class="form-control" aria-label="Default select example" name="kategori_id">
            <?php foreach($kategoriler as $kategori){ ?>
              <option value="<?=$kategori['id']?>"><?php echo $kategori['kategori_adi'] ?></option>
            <?php } ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary" name="kullaniciblogekle">Ekle</button>
        <a href="author.php" class="btn btn-warning">Geri Dön</a>

      </form>
    </div>
  </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php' ?>