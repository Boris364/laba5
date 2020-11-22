<html>
    <head> <title> Кулаков Борис </title> </head>
    <body>
        <H2>Добавление нового жильца</H2>
        <?php
        $connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
        mysqli_query($connect, "SET NAMES utf8");

        $result = mysqli_query($connect, "SELECT home_adress FROM home WHERE id_home = ".$_GET['id']);

        while ($row = mysqli_fetch_array($result)){
            $adress = $row['home_adress'];
        }

        print "<form action='save_new.php' metod='get'>";
        print "ФИО: <br><input name='FIO' size='40' type='text'>";

        print " <br><br>Дата рождения: 
                <br><input type='date' id='birthday' name='birthday'>";

        print "<br><br>Адрес:
            <br><input name='adress' value='" . $adress . "' size='40' type='text' readonly>";

        print "<br><input type='hidden' name='id' value='".$_GET['id']."'>";       
        print "<br><br><input name='add_resident' type='submit' value='Добавить'>";
        print "<br><br><input name='b2' type='reset' value='Очистить'>";
        print "</form>";
        print "<br><a href=\"index.php\"> Вернуться к списку недвижимости </a>";
        ?>
        
    </body>
</html>