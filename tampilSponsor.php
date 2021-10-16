<?php
include 'koneksi.php';

$id = $_POST['id'];

$data = mysql_query("SELECT * FROM tb_sponsor WHERE id_sponsor = '$id'");

$data1 = mysql_fetch_array($data);

echo json_encode($data1);
