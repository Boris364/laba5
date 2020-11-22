<html>
<head>
    <title> Кулаков Борис </title>
</head>
<body>
    <h2>Редактирование данных о должнике</h2>
<?php
$connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");

$rows = mysqli_query($connect, "SELECT 	FIO_debtor, sum FROM debtors WHERE id_debtor = ".$_GET['id_debtor']);

while ($st = mysqli_fetch_array($rows)) {
    $id = $_GET['id_debtor'];
    $FIO = $st['FIO_debtor'];
    $sum = $st['sum'];

}

print "<form action='save_edit.php' metod='get'>";
print "ФИО: <br><input name='inp_FIO' size='50' type='text' value='" .$FIO . "'readonly>";
print "<br><br>Долг: <br><input name='inp_sum' size='20' type='text' value='" . $sum . "'>";
print "<br><input type='hidden' name='id_debtor' value='".$id."'>";
print "<br><input type='submit' name='save' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку недвижимости </a>";

?>

</body>
</html>