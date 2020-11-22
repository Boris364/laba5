<html>
    <head> <title> Кулаков Борис </title> </head>
    <body>
        <H2>Добавление нового должника</H2>
        <?php
        $connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
        mysqli_query($connect, "SET NAMES utf8");

        $rows = mysqli_query($connect, "SELECT  id_resident, FIO_resident FROM residents WHERE id_home = ".$_GET['id_home']);

        $i=0;
        while ($st = mysqli_fetch_array($rows)) {
            $FIO[$i] = $st['FIO_resident'];
            $id_res[$i] = $st['id_resident'];
            $i++;
        }
        ?>
        <form action='save_new.php' metod='get'>
        ФИО:<br>
        <select class='form-control' name='FIO'>
        <?php
        for($i = 0; $FIO[$i] != null; $i++): ?>
            <option value="<?=$FIO[$i].$i?>"><?=$FIO[$i]?></option>
        <?php endfor;
        for($i = 0; $FIO[$i] != null; $i++){
            $name = "num_res". $i;
            $value = "" . $id_res[$i];
            print "<input type='hidden' name='".$name."' value='".$value."'>";
        }
        ?>
        </select>
        <br><br>Долг: <br><input name='sum' size='20' type='text'>
       
        <br><p><input name='add_debtor' type='submit' value='Добавить'>
        <br><br><input name='b2' type='reset' value='Очистить'></p>
        </form>
        <p><a href="index.php"> Вернуться к списку недвижимости </a>

        
    </body>
</html>