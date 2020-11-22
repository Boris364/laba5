<html>
<head>
    <title> Кулаков Борис </title>
</head>
<body>
   <h2>Редактирование данных о жильце</h2>
<?php
$connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");

$rows = mysqli_query($connect, "SELECT 	FIO_resident, year_resident, adress_resident FROM residents WHERE id_resident = ".$_GET['id_resident']);

while ($st = mysqli_fetch_array($rows)) {
    $id = $_GET['id_resident'];
    $FIO = $st['FIO_resident'];
    $year = $st['year_resident'];
	$adress = $st['adress_resident'];
}

print "<form action='save_edit.php' metod='get'>";
print "ФИО: <br><input name='inp_FIO' size='50' type='text' value='" .$FIO . "'>";
print "<br><br>Дата рождения: <br><input name='inp_year' size='20' type='text' value='" . $year . "'>";
print "<br><br>Адрес: <br><input name='inp_adress' size='50' type='text' value='" . $adress . "' readonly>";
print "<br><input type='hidden' name='id_resident' value='".$id."'>";
print "<br><input type='submit' name='save' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку недвижимости </a>";

?>

</body>
</html>