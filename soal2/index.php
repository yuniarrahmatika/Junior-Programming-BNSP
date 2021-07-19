<?php
    require('model/karyawan.php'); // mengakses isi program dari file/halaman model/produk.php
    // index.php?cari=...
    if(isset($_GET['cari'])) //jika cari memiliki nilai
        $alldata = cari(); // maka $alldata adalah isi dari hasil function cari
    else
        $alldata = semua(); // maka $alldata adalah isi dari hasil function semua

    // index.php
    if(!isset($_GET['action'])) // jika tidak ada nilai action
        include('view/home.php'); // maka akan menampilkan file/halaman view/home.php
    // index.php?action=...
    else{
        $form = $_GET['action']; 
        switch ($form){
            case 'form-tambah': // index.php?action=tambah
                include('view/insert.php');
                break;
            case 'form-edit': // index.php?action=edit
                // nyiapin variabel yang dibutuhkan di view/edit.php
                // cek dulu apa aja
                $nomor_induk = $_GET['nomor_induk'];
                $data = satu($nomor_induk); // variabel data berisi data berdasarkan kode_produk
                $nama = $data->nama;
                $nomor_hp = $data->nomor_hp;
                $alamat = $data->alamat;
                require('view/edit.php'); // mengakses isi program dari file/halaman view/edit.php
                break;
            case 'tambah': // index.php?action=tambah
                insert();
                header('Location: index.php');
                break;
            case 'edit': // index.php?action=edit
                edit();
                header('Location: index.php');
                break;
            case 'delete': // index.php?action=delete
                delete();
                header('Location: index.php');
                break;
        }
    }
?>