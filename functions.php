<?php
/*Fonksiyonlar */

function get_categoryname($id)
{
	include 'connect.php';
	$kategorigetir = $db->prepare("SELECT * FROM kategoriler WHERE id=$id");
	$kategorigetir->execute(array());
	$kategoricek = $kategorigetir->fetch(PDO::FETCH_ASSOC);

	if ($kategoricek) {
		return $kategoricek['kategori_adi'];
	} else {
		return 'Tanımsız kategori';
	}
}


function get_author($id)
{
	include 'connect.php';
	$yazargetir = $db->prepare("SELECT * FROM kullanicilar WHERE id=$id");
	$yazargetir->execute(array());
	$yazarcek = $yazargetir->fetch(PDO::FETCH_ASSOC);

	if ($yazarcek) {
		return $yazarcek['isim'];
	} else {
		return 'Tanımsız yazar';
	}
}

function kisalt($metin, $uzunluk)
{
	$metin = substr($metin, 0, $uzunluk) . "...";
	$metin_son = strrchr($metin, " ");
	$metin = str_replace($metin_son, " ...", $metin);

	return $metin;
}
