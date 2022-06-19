<?php 
include 'header.php';

$blogcek = $db->prepare("SELECT * FROM bloglar ORDER BY tarih DESC");
$blogcek->execute(array());
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <a class="btn btn-primary" href="blog-ekle.php"><i class="fa fa-plus"></i> Yeni Ekle</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fotoğraf</th>
                            <th>Başlık</th>
                            <th>Kategorisi</th>
                            <th>Yazar</th>
                            <th>Tarih</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($blogcek as $blog){ ?>
                            <tr>
                                <td><img width="50" src="../<?=$blog['resim']?>" alt="<?=$blog['baslik']?>"></td>
                                <td><?=$blog['baslik']?></td>
                                <td><?php echo get_categoryname($blog['kategori_id'])?></td>
                                <td><?php echo get_author($blog['yazar_id'])?></td>
                                <td><?=$blog['tarih']?></td>
                                <td>
                                    <a class="btn btn-primary rounded-0" href="blog-duzenle.php?id=<?=$blog['id'] ?>">Düzenle</a>
                                    <a class="btn btn-danger rounded-0" href="../core.php?blogsil=ok&id=<?=$blog['id']?>">Sil</a>
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