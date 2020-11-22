<?php
$connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");

if ($_GET['id'] != null) {
	$zapros = "DELETE FROM home WHERE id_home =" . $_GET['id'];
}
if ($_GET['id_resident'] != null) {
	$zapros = "DELETE FROM residents WHERE id_resident =" . $_GET['id_resident'];
}
if ($_GET['id_debtor'] != null) {
	$zapros = "DELETE FROM debtors WHERE id_debtor =" . $_GET['id_debtor'];
}

mysqli_query($connect, $zapros);
header("Location: index.php");
exit;
?>