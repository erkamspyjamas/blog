<?php 
include 'header.php';

$kullanicilar = $db->prepare("SELECT * FROM kullanicilar");
$kullanicilar->execute(array());
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
                            <th>ID</th>
                            <th>Resim</th>
                            <th>Email</th>
                            <th>Şifre</th>
                            <th>İsim</th>
                            <th>Soyisim</th>
                            <th>Yetki</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($kullanicilar as $kullanici){ ?>
                            <tr>
                                <td><?=$kullanici['id']?></td>
                                <td><img src="../<?=$kullanici['resim']?>" width="100" alt=""></td>
                                <td><?=$kullanici['email']?></td>
                                <td><?=$kullanici['sifre']?></td>
                                <td><?=$kullanici['isim']?></td>
                                <td><?=$kullanici['soyisim']?></td>
                                <td><?=($kullanici['yetki']==1 ? 'Kullanıcı' : 'Admin')?></td>
                                <td>
                                    <a class="btn btn-primary rounded-0" href="kullanici-duzenle.php?id=<?=$kullanici['id'] ?>">Düzenle</a>
                                    <a class="btn btn-danger rounded-0" href="../core.php?kullanicisil=ok&id=<?=$kullanici['id']?>">Sil</a>
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