<?php
$connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");

if ($_GET['inp_id'] != null) {
	
	$zapros = "UPDATE `home` SET `home`.`home_adress` = '{$_GET['inp_adress']}', `home`.`home_type` = '{$_GET['inp_type']}', 
	`home`.`home_metr` = '{$_GET['inp_metr']}', `home`.`home_room` = '{$_GET['inp_room']}', `home`.`home_cost` = '{$_GET['inp_cost']}' 
	WHERE `home`.`id_home` = '{$_GET['inp_id']}'";

}elseif ($_GET['id_resident'] != null) {
	
	$zapros = "UPDATE `residents` SET `residents`.`FIO_resident` = '{$_GET['inp_FIO']}', `residents`.`year_resident` = '{$_GET['inp_year']}', 
	`residents`.`adress_resident` = '{$_GET['inp_adress']}'	WHERE `residents`.`id_resident` = '{$_GET['id_resident']}'";

}elseif ($_GET['id_debtor'] != null) {
	
	$zapros = "UPDATE `debtors` SET `debtors`.`FIO_debtor` = '{$_GET['inp_FIO']}', `debtors`.`sum` = '{$_GET['inp_sum']}'
	WHERE `debtors`.`id_debtor` = '{$_GET['id_debtor']}'";
}


mysqli_query($connect, $zapros);
header("Location: index.php");
?>