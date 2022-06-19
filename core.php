<?php
ob_start();
session_start();
include 'connect.php';

/*Blog İşlemleri*/
//Admin
//Blog Ekleme
if (isset($_POST['blogekle'])) {
	$uploads_dir = 'assets/img/blog/';

	@$tmp_name = $_FILES['resim']["tmp_name"];
	@$name = $_FILES['resim']["name"];

	$imgpath = $uploads_dir . $name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$name");

	$blogkaydet = $db->prepare("INSERT INTO bloglar SET
		baslik=:baslik,
		icerik=:icerik,
		kategori_id=:kategori,
		yazar_id=:yazar_id,
		tarih=:tarih,
		resim=:resim
		");
	$insert = $blogkaydet->execute(array(
		'baslik' => $_POST['baslik'],
		'icerik' => $_POST['icerik'],
		'kategori' => $_POST['kategori_id'],
		'yazar_id' => $_POST['yazar_id'],
		'tarih' => $_POST['tarih'],
		'resim' => $imgpath
	));

	if ($insert) {
		Header("Location:admin/bloglar.php?basarili=1");
	} else {
		Header("Location:admin/bloglar.php?basarisiz=0");
	}
}
//Blog düzenleme
if (isset($_POST['blogduzenle'])) {

	$blogsor = $db->prepare("SELECT * FROM bloglar where id=:id");
	$blogsor->execute(array("id" => $_POST['id']));
	$blogcek = $blogsor->fetch(PDO::FETCH_ASSOC);

	if ($_FILES['resim']['size'] != 0) {
		$uploads_dir = 'assets/img/blog/';

		@$tmp_name = $_FILES['resim']["tmp_name"];
		@$name = $_FILES['resim']["name"];

		$imgpath = $uploads_dir . $name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$name");
	} else {
		$imgpath = $blogcek['resim'];
	}

	$blogduzenle = $db->prepare("UPDATE bloglar SET
		baslik=:baslik,
		icerik=:icerik,
		kategori_id=:kategori,
		yazar_id=:yazar_id,
		tarih=:tarih,
		resim=:resim
		WHERE id={$_POST['id']}
		");
	$update = $blogduzenle->execute(array(
		'baslik' => $_POST['baslik'],
		'icerik' => $_POST['icerik'],
		'kategori' => $_POST['kategori_id'],
		'yazar_id' => $_POST['yazar_id'],
		'tarih' => $_POST['tarih'],
		'resim' => $imgpath
	));

	$id = $_POST['id'];

	if ($update) {
		Header("Location:admin/bloglar.php?id=$id&durum=ok");
	} else {
		Header("Location:admin/bloglar.php?durum=no");
	}
}

//Blog silme
if ($_GET['blogsil'] == "ok") {

	//resmi dosyadan silme işlemi
	$select = $db->prepare("SELECT * FROM bloglar where id=:id");
	$select->execute(array('id' => $_GET['id']));
	$bul = $select->fetch(PDO::FETCH_ASSOC);

	unlink($bul['resim']);


	//veriyi silme işlemi
	$sil = $db->prepare("DELETE FROM bloglar WHERE id=:id");
	$kontrol = $sil->execute(array(
		'id' => $_GET['id']
	));

	if ($kontrol) {
		header("Location:admin/bloglar.php?islem=ok");
	} else {
		header("Location:admin/bloglar.php?islem=no");
	}
}

//Kullanıcı Blog İşlemleri
//Ekleme
if (isset($_POST['kullaniciblogekle'])) {
	$uploads_dir = 'assets/img/blog/';

	@$tmp_name = $_FILES['resim']["tmp_name"];
	@$name = $_FILES['resim']["name"];

	$imgpath = $uploads_dir . $name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$name");

	$blogkaydet = $db->prepare("INSERT INTO bloglar SET
		baslik=:baslik,
		icerik=:icerik,
		kategori_id=:kategori,
		yazar_id=:yazar_id,
		tarih=:tarih,
		resim=:resim
		");
	$insert = $blogkaydet->execute(array(
		'baslik' => $_POST['baslik'],
		'icerik' => $_POST['icerik'],
		'kategori' => $_POST['kategori_id'],
		'yazar_id' => $_POST['yazar_id'],
		'tarih' => $_POST['tarih'],
		'resim' => $imgpath
	));

	if ($insert) {
		Header("Location:author.php?basarili=1");
	} else {
		Header("Location:author.php?basarisiz=0");
	}
}
//düzenleme
if (isset($_POST['kullaniciblogduzenle'])) {

	$blogsor = $db->prepare("SELECT * FROM bloglar where id=:id");
	$blogsor->execute(array("id" => $_POST['id']));
	$blogcek = $blogsor->fetch(PDO::FETCH_ASSOC);

	if ($_FILES['resim']['size'] != 0) {
		$uploads_dir = 'assets/img/blog/';

		@$tmp_name = $_FILES['resim']["tmp_name"];
		@$name = $_FILES['resim']["name"];

		$imgpath = $uploads_dir . $name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$name");
	} else {
		$imgpath = $blogcek['resim'];
	}

	$blogduzenle = $db->prepare("UPDATE bloglar SET
		baslik=:baslik,
		icerik=:icerik,
		kategori_id=:kategori,
		yazar_id=:yazar_id,
		tarih=:tarih,
		resim=:resim
		WHERE id={$_POST['id']}
		");
	$update = $blogduzenle->execute(array(
		'baslik' => $_POST['baslik'],
		'icerik' => $_POST['icerik'],
		'kategori' => $_POST['kategori_id'],
		'yazar_id' => $_POST['yazar_id'],
		'tarih' => $_POST['tarih'],
		'resim' => $imgpath
	));

	$id = $_POST['id'];

	if ($update) {
		Header("Location:author.php?id=$id&durum=ok");
	} else {
		Header("Location:author.php?durum=no");
	}
}

//Blog silme
if ($_GET['kullaniciblogsil'] == "ok") {

	//resmi dosyadan silme işlemi
	$select = $db->prepare("SELECT * FROM bloglar where id=:id");
	$select->execute(array('id' => $_GET['id']));
	$bul = $select->fetch(PDO::FETCH_ASSOC);

	unlink($bul['resim']);


	//veriyi silme işlemi
	$sil = $db->prepare("DELETE FROM bloglar WHERE id=:id");
	$kontrol = $sil->execute(array(
		'id' => $_GET['id']
	));

	if ($kontrol) {
		header("Location:author.php?islem=ok");
	} else {
		header("Location:author.php?islem=no");
	}
}


/*Kategori işlemleri*/
//Kategori Ekleme
if (isset($_POST['kategoriekle'])) {
	$kategorikaydet = $db->prepare("INSERT INTO kategoriler SET
		kategori_adi=:ad
		");
	$insert = $kategorikaydet->execute(array(
		'ad' => $_POST['kategori_adi']
	));

	if ($insert) {
		Header("Location:admin/kategoriler.php?basarili=1");
	} else {
		Header("Location:admin/kategoriler.php?basarisiz=0");
	}
}

//Kategori düzenleme
if (isset($_POST['kategoriduzenle'])) {

	$kategorisor = $db->prepare("SELECT * FROM kategoriler where id=:id");
	$kategorisor->execute(array("id" => $_POST['id']));
	$kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);

	$kategoriduzenle = $db->prepare("UPDATE kategoriler SET
		kategori_adi=:ad
		WHERE id={$_POST['id']}
		");
	$update = $kategoriduzenle->execute(array(
		'ad' => $_POST['kategori_adi']
	));

	$id = $_POST['id'];

	if ($update) {
		Header("Location:admin/kategoriler.php?id=$id&durum=ok");
	} else {
		Header("Location:admin/kategoriler.php?durum=no");
	}
}

//Kategori silme
if ($_GET['kategorisil'] == "ok") {

	//veriyi silme işlemi
	$sil = $db->prepare("DELETE FROM kategoriler WHERE id=:id");
	$kontrol = $sil->execute(array(
		'id' => $_GET['id']
	));

	if ($kontrol) {
		header("Location:admin/kategoriler.php?islem=ok");
	} else {
		header("Location:admin/kategoriler.php?islem=no");
	}
}

//Kayıt Olma
if (isset($_POST['kullaniciekle'])) {
	$kullanicikaydet = $db->prepare("INSERT INTO kullanicilar SET
		isim=:isim,
		soyisim=:soyisim,
		email=:email,
		sifre=:sifre
		");
	$insert = $kullanicikaydet->execute(array(
		'isim' => $_POST['isim'],
		'soyisim' => $_POST['soyisim'],
		'email' => $_POST['email'],
		'sifre' => md5($_POST['sifre'])
	));

	if ($insert) {
		Header("Location:login.php?basarili=1");
	} else {
		Header("Location:login.php?basarisiz=0");
	}
}
//Giriş Yapma
if (isset($_POST['kullanicigiris'])) {

	$email = $_POST['email'];
	$sifre = $_POST['sifre'];

	if ($email && $sifre) {

		$kullanicisor = $db->prepare("SELECT * FROM kullanicilar where email=:email and sifre=:sifre");
		$kullanicisor->execute(array(
			'email' => $email,
			'sifre' => md5($sifre)
		));

		echo $say = $kullanicisor->rowCount();

		if ($say > 0) {
			$_SESSION['email'] = $email;
			header('Location:index.php');
		} else {
			header('Location:login.php?durum=no');
		}
	}
}

//Çıkış Yapma
if ($_GET['logout'] == 'ok') {

	$cikis = session_destroy();

	if ($cikis) {
		header('location:login.php?durum=ok');
	} else {
		header('Location:' . __DIR__);
	}
}

/***********Admin Tarafı İşlemler ***********/

//Admin Giriş Yapma
if (isset($_POST['admingiris'])) {

	$email = $_POST['email'];
	$sifre = $_POST['sifre'];

	if ($email && $sifre) {

		$kullanicisor = $db->prepare("SELECT * FROM kullanicilar where email=:email and sifre=:sifre and yetki=0");
		$kullanicisor->execute(array(
			'email' => $email,
			'sifre' => md5($sifre)
		));

		echo $say = $kullanicisor->rowCount();

		if ($say > 0) {
			$_SESSION['email'] = $email;
			header('Location:admin/index.php');
		} else {
			header('Location:admin/login.php?durum=no');
		}
	}
}

//Admin Çıkış Yapma
if ($_GET['logout'] == 'admin') {

	$cikis = session_destroy();

	if ($cikis) {
		header('location:admin/login.php?durum=ok');
	} else {
		header('Location:' . __DIR__);
	}
}

//admin kullanici düzenleme
if (isset($_POST['admin-kullaniciduzenle'])) {

	$kullanicisor = $db->prepare("SELECT * FROM kullanicilar where id=:id");
	$kullanicisor->execute(array("id" => $_POST['id']));
	$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

	if ($_FILES['resim']['size'] != 0) {

		unlink($kullanicicek['resim']);

		$uploads_dir = 'assets/img/users/';

		$random = Rand (1000, 9999);
		@$tmp_name = $_FILES['resim']["tmp_name"];
		@$name = $_FILES['resim']["name"];

		$imgpath = $uploads_dir . $random.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$random$name");
	} else {
		$imgpath = $kullanicicek['resim'];
	}

	$kullaniciduzenle = $db->prepare("UPDATE kullanicilar SET
		isim=:isim,
		soyisim=:soyisim,
		aciklama=:aciklama,
		email=:email,
		sifre=:sifre,
		yetki=:yetki,
		resim=:resim
		WHERE id={$_POST['id']}
		");
	$update = $kullaniciduzenle->execute(array(
		'isim' => $_POST['isim'],
		'soyisim' => $_POST['soyisim'],
		'aciklama' => $_POST['aciklama'],
		'email' => $_POST['email'],
		'sifre' => md5($_POST['sifre']),
		'yetki' => $_POST['yetki'],
		'resim' => $imgpath
	));

	$id = $_POST['id'];

	if ($update) {
		Header("Location:admin/kullanicilar.php?id=$id&durum=ok");
	} else {
		Header("Location:admin/kullanicilar.php?durum=no");
	}
}
//profil düzenleme
if (isset($_POST['kullaniciduzenle'])) {

	$kullanicisor = $db->prepare("SELECT * FROM kullanicilar where id=:id");
	$kullanicisor->execute(array("id" => $_POST['id']));
	$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

	if ($_FILES['resim']['size'] != 0) {

		unlink($kullanicicek['resim']);

		$uploads_dir = 'assets/img/users/';

		$random = Rand (1000, 9999);
		@$tmp_name = $_FILES['resim']["tmp_name"];
		@$name = $_FILES['resim']["name"];

		$imgpath = $uploads_dir . $random.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$random$name");
	} else {
		$imgpath = $kullanicicek['resim'];
	}

	$kullaniciduzenle = $db->prepare("UPDATE kullanicilar SET
		isim=:isim,
		soyisim=:soyisim,
		aciklama=:aciklama,
		email=:email,
		resim=:resim
		WHERE id={$_POST['id']}
		");
	$update = $kullaniciduzenle->execute(array(
		'isim' => $_POST['isim'],
		'soyisim' => $_POST['soyisim'],
		'aciklama' => $_POST['aciklama'],
		'email' => $_POST['email'],
		'resim' => $imgpath
	));

	$id = $_POST['id'];

	if ($update) {
		Header("Location:author.php?id=$id&durum=ok");
	} else {
		Header("Location:author.php?durum=no");
	}
}
