<html>
    <head> <title> Кулаков Борис </title> </head>
<body>

<?php
$connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");
?>

<h2>Список должников:</h2>
<table border="1">
    <tr>
    <th> ФИО </th> <th> Долг </th>
    <th> </th> <th> </th> </tr>
    <?php

    $result = mysqli_query($connect, 
        "SELECT d.id_debtor, d.FIO_debtor, d.id_resident, d.sum, r.id_home 
        FROM debtors d
        INNER JOIN residents r ON d.id_resident = r.id_resident 
        WHERE r.id_home = '{$_GET['id']}'");

    while ($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['FIO_debtor'] . "</td>";
        echo "<td>" . $row['sum'] . "</td>";
        echo "<td><a href='edit_debtor.php?id_debtor=" . $row['id_debtor']. "'>Редактировать</a></td>";
        echo "<td><a href='delete.php?id_debtor=" . $row['id_debtor'] . "'>Удалить</a></td>";
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result);
    print("<P>Всего должников: $num_rows </p>");
    
    echo "<a href = 'new_debtor.php?id_home=" . $_GET['id'] . "'>Добавить должника в список</a>";
    echo "<br><br><a href = 'index.php'> Вернуться к списку недвижимости </a>"
    ?>
    </br></br>
    </body> 
</html>