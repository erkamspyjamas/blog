<?php include 'header.php' ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
      <form action="../core.php" method="POST">
        <div class="form-group">
          <label class="form-label">Kategori Adı</label>
          <input type="text" class="form-control" name="kategori_adi" placeholder="Kategori Adı">
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="kategoriekle">Ekle</button>
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