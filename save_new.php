<?php
$connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");

if ($_GET['add_home'] != null) {
	$sql_add = "INSERT INTO home SET home_adress='" . $_GET['home_adress'] ."', home_type='".$_GET['home_type']."', 
				home_metr='" .$_GET['home_metr']."', home_room='".$_GET['home_room']. "', home_cost='".$_GET['home_cost']. "'";

}elseif ($_GET['add_resident'] != null) {
	
	$sql_add = "INSERT INTO residents SET FIO_resident='" . $_GET['FIO'] ."', year_resident='".$_GET['birthday']."', id_home='".$_GET['id']."',  adress_resident='".$_GET['adress']."'";

}elseif ($_GET['add_debtor'] != null) {

	$get_fio = $_GET['FIO'];
	$name = substr($_GET['FIO'], 0, (strlen($_GET['FIO'])-1));
	$num = substr($_GET['FIO'], -1, 1);
	$v = "num_res". $num;
	$hid = "" . $_GET[$v];

	$sql_add = "INSERT INTO debtors SET FIO_debtor='" . $name ."', id_resident='" . $hid ."', sum='".$_GET['sum']."'";
}

	mysqli_query($connect, $sql_add);
	header("Location: index.php");
?>