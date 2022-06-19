<?php include 'header.php';

$kategoricek = $db->prepare("SELECT * FROM kategoriler where id=:id");
$kategoricek->execute(array('id' => $_GET['id']));
$kategori = $kategoricek->fetch(PDO::FETCH_ASSOC);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
      <form action="../core.php" method="POST">

        <input type="hidden" name="id" value="<?=$kategori['id']?>">

        <div class="form-group">
          <label class="form-label">Kategori Adı</label>
          <input type="text" class="form-control" name="kategori_adi" placeholder="Kategori Adı" value="<?=$kategori['kategori_adi']?>">
        </div>
        <button type="submit" class="btn btn-primary" name="kategoriduzenle">Düzenle</button>
        <a href="kategoriler.php" class="btn btn-warning">Geri Dön</a>
      </form>
    </div>
  </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php' ?>