<html>
<head>
    <title> Кулаков Борис </title>
</head>
<body>
    <h2>Редактирование данных об объекте недвижимости</h2>
<?php

$connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");

$rows = mysqli_query($connect, "SELECT home_adress, home_type, home_metr, home_room, home_cost FROM home WHERE id_home=".$_GET['id']);

while ($st = mysqli_fetch_array($rows)) {
    $id = $_GET['id'];
    $adress = $st['home_adress'];
    $type = $st['home_type'];
    $metr = $st['home_metr'];
    $room = $st['home_room'];
    $cost = $st['home_cost'];
}

print "<form action='save_edit.php' metod='get'>";
print "Адрес: <br><input name='inp_adress' size='50' type='text' value='" . $adress . "'>";
print "<br>Тип дома: <br><input name='inp_type' size='20' type='text' value='" . $type . "'>";
print "<br>Метраж: <br><input name='inp_metr' size='20' type='text' value='" . $metr . "'>";
print "<br>Количество комнат: <br><input name='inp_room' size='30' type='text' value='".$room."'>";
print "<br>Стоимость: <br><input name='inp_cost' size='30' type='text' value='".$cost."'>";
print "<br><input type='hidden' name='inp_id' value='".$id."'> <br>";
print "<br><input type='submit' name='save' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку недвижимости </a>";

?>

</body>
</html>