<html>
    <head> <title> Кулаков Борис </title> </head>
<body>

<?php
$connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");
?>

<h2>Список жильцов:</h2>
<table border="1">
    <tr>
    <th> ФИО </th> <th> Дата рождения </th> <th> Адрес </th>
    <th> </th> <th> </th> </tr>
    <?php
    $result = mysqli_query($connect, "SELECT id_resident, FIO_resident, year_resident, id_home, adress_resident FROM residents WHERE id_home = '{$_GET['id']}'");

    while ($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['FIO_resident'] . "</td>";
        echo "<td>" . $row['year_resident'] . "</td>";
        echo "<td>" . $row['adress_resident'] . "</td>";
        echo "<td><a href='edit_resident.php?id_resident=" . $row['id_resident'] . "'>Редактировать</a></td>";
        echo "<td><a href='delete.php?id_resident=" . $row['id_resident'] . "'>Удалить</a></td>";
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result); 
    print("<P>Всего жильцов: $num_rows </p>");
    echo "<br><a href = 'new_resident.php?id=" . $_GET['id'] . "'> Добавить жильца в список </a>";
    ?>
    <p> <a href = "index.php"> Вернуться к списку недвижимости </a>
    </br></br>
    </body> 
</html>