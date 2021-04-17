<?php
session_start();
include ("header.tpl");
require "support.php";

if (!isset($_SESSION['sharl'])) $_SESSION['sharl']=array_fill(1, 3, 0); //создание массива истории попыток экстрасенсов
if (!isset($_POST['number'])) {
    include ("formnumber.tpl");
    show_assumption();
}else {
    if (getValidation($_POST['number'])) {
        if (!isset($_SESSION['prav'])) $_SESSION['prav'] = array_fill(1, 3, 0);//создание массива с количеством правильных попыток каждого экстрасенса
        if (!isset($_SESSION['dostovern'])) $_SESSION['dostovern'] = array_fill(1, 3, 0);//создание массива с достоверностью каждого экстрасенса (можно обойтись и расчитывать значение каждый раз при обращении)
        add_hist('number',$_POST['number']);//добавление в историю введенного пользователем значения
        calculation();//подсчет достоверности экстрасенсов
        count_assumption();//Подсчет количества попыток
        add_hist('hist1',$_SESSION['sharl'][1]);//добавление в историю попытки первого экстрасенса
        add_hist('hist2',$_SESSION['sharl'][2]);//добавление в историю попытки второго экстрасенса
        add_hist('hist3',$_SESSION['sharl'][3]);//добавление в историю попытки третьего экстрасенса
        echo "<p><b>Исторические данные</b></p><br/>Вы вводили:<br/>";
        show_hist($_SESSION['number']);//вывод истории введенных пользователем значений
        echo "история попыток первого экстрасенса:<br/>";
        show_hist($_SESSION['hist1']);//вывод истории попыток первого экстрасенса
        echo "история попыток второго экстрасенса:<br/>";
        show_hist($_SESSION['hist2']);//вывод истории попыток второго экстрасенса
        echo "история попыток третьего  экстрасенса:<br/>";
        show_hist($_SESSION['hist3']);//вывод истории попыток третьего экстрасенса

    }else{
        echo "Введенное значение не число или не удовлетворяет условию. Попробуйте снова.";
        echo "<br><a href=" . $_SERVER['PHP_SELF'] . ">Попробовать снова</a><br/><br/>";
    }
}

?>
</body>
</html>
