<?php
/**
 * Mengambil seluruh data produk
 * @return array
 */
function semua(){
    $connection = new mysqli('localhost','root','','data');
    $q = $connection->query("SELECT * FROM karyawan");
    $hasil = []; // membuat variabel sebagai object
    while($row = $q->fetch_object()){ // mengambil data yg ada di database sesuai perintah di $q
        $hasil[] = $row; // menyimpan data hasil while kedalam $hasil dalam bntuk object
    }
    return $hasil; // menampilkan $hasil
}
/**
 * Pencarian produk berdasarkan kecocokan nama produk maupun kode produk dengan keyword tertentu
 * Jika tidak terdapat keyword, maka hasilnya semua produk
 * @return Array of Associative Array dari rownya
 */
function cari(){
    $keyword = isset($_GET['cari'])?$_GET['cari']:'';
    $connection = new mysqli('localhost','root','','data');
    $q = $connection->query("SELECT * FROM karyawan 
			WHERE nomor_induk LIKE '%$keyword%' or 
			nama LIKE '%$keyword%'");

    $hasil = [];
    while($row = $q->fetch_object()){
        $hasil[] = $row;
    }
    return $hasil;
}
/**
 * Insert produk
 */
function insert(){
    $nomor_induk = $_POST['nomor_induk'];
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $connection = new mysqli('localhost','root','','data');
    $connection -> query("INSERT INTO karyawan VALUES
		('$nomor_induk','$nama','$nomor_hp','$alamat')");
}
/**
 * Edit produk berdasarkan kode produk yang diberikan
 */
function edit(){
    $nomor_induk = $_POST['nomor_induk'];
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $connection = new mysqli('localhost','root','','data');
    $connection->query("UPDATE karyawan SET 
		nama='$nama',nomor_hp='$nomor_hp',alamat='$alamat' WHERE nomor_induk='$nomor_induk'");
}
/**
 * Delete produk berdasarkan kode produk yang diberikan
 */
function delete(){
    $nomor_induk = $_GET['nomor_induk'];
    $connection = new mysqli('localhost','root','','data');
    $connection->query("DELETE FROM karyawan 
		WHERE nomor_induk ='$nomor_induk'");
}

/**
 * Ambil satu produk saja berdasarkan kode produknya, dipake buat edit
 * @return object
 */
function satu($nomor_induk){
    $connection = new mysqli('localhost','root','','data');
    $result = $connection->query("SELECT * FROM karyawan WHERE nomor_induk='$nomor_induk'");
    return $result->fetch_object();
}
?>
