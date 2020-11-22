<html>
    <head> <title> Кулаков Борис </title> </head>
<body>
<?php
$connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");
?>

<h2>Список недвижимости:</h2>
<table border="1">
    <tr>
    <th> Адрес </th> <th> Тип дома </th> <th> Метраж </th>
    <th> Количество комнат </th> <th> Стоимость </th>
    <th> </th> <th> </th> <th> </th><th> </th></tr>
    <?php
    $result = mysqli_query($connect, "SELECT id_home, home_adress, home_type, home_metr, home_room, home_cost FROM home");
    while ($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['home_adress'] . "</td>";
        echo "<td>" . $row['home_type'] . "</td>";
        echo "<td>" . $row['home_metr'] . "</td>";
        echo "<td>" . $row['home_room'] . "</td>";
        echo "<td>" . $row['home_cost'] . "</td>";
        echo "<td><a href='resident.php?id=" . $row['id_home'] . "'>Список жильцов</a></td>";
        echo "<td><a href='debtors.php?id=" . $row['id_home'] . "'>Должники</a></td>";
        echo "<td><a href='edit.php?id=" . $row['id_home'] . "'>Редактировать</a></td>";
        echo "<td><a href='delete.php?id=" . $row['id_home'] . "'>Удалить</a></td>";
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result);
    print("<P>Всего недвижимости: $num_rows </p>");
    ?>
    <p> <a href = "new.php"> Добавить недвижимость в список </a>
    </br></br>
    <p> <a href = "create_pdf.php"> Сформировать PDF </a>
    </br></br>
    <p><a href="http://f0472439.xsph.ru/">К списку лабораторных работ</a>
</body> 
</html>

