<?php 
include 'header.php';

$kategoricek = $db->prepare("SELECT * FROM kategoriler");
$kategoricek->execute(array());
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <a class="btn btn-primary" href="kategori-ekle.php"><i class="fa fa-plus"></i> Yeni Ekle</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kategori Adı</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($kategoricek as $kategori){ ?>
                            <tr>
                                <td><?=$kategori['kategori_adi']?></td>
                                <td>
                                    <a class="btn btn-primary rounded-0" href="kategori-duzenle.php?id=<?=$kategori['id'] ?>">Düzenle</a>
                                    <a class="btn btn-danger rounded-0" href="../core.php?kategorisil=ok&id=<?=$kategori['id']?>">Sil</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php' ?>