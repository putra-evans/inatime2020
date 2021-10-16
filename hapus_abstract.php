<?php
include "koneksi.php";
$sql = mysql_query("SELECT * FROM tb_abstract WHERE kd_abstract='$_GET[kd]'");
$pecah = mysql_fetch_array($sql);
$nama = $pecah['isi'];
unlink("file_abstract/" . $nama);
$sql_hapus = mysql_query("DELETE FROM tb_abstract WHERE kd_abstract='$_GET[kd]'");
if ($sql_hapus) {
    echo "<script>
alert('Delete Success');
window.location.href='index.php?p=entry_abstract';
</script>";
}
?>