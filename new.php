<html>
    <head> <title> Кулаков Борис </title> </head>
    <body>
        <H2>Добавление нового объекта недвижимости</H2>
        <form action="save_new.php" metod="get">
            Адрес:<br> <input name="home_adress" size="50" type="text">
            <br>Тип дома: <br><input name="home_type" size="20" type="text">
            <br>Метраж: <br><input name="home_metr" size="20" type="text">
            <br>Количество комнат: <br><input name="home_room" size="30" type="text">
            <br>Стоимость: <br><input name="home_cost"  size="30" type="text">
            <br><p><input name="add_home" type="submit" value="Добавить">
            <br><br><input name="b2" type="reset" value="Очистить"></p>
        </form>
        <p>
            <a href = "index.php"> Вернуться к списку недвижимости </a>
    </body>
</html>