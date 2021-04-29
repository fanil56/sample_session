<?php
session_start();
include ("header.tpl");
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$extrasens =new Extrasens();
$user = new User();

if (!isset($_SESSION['sharl'])) $_SESSION['sharl']=array_fill(1, 3, 0); //создание массива истории попыток экстрасенсов
//Проверка на отсутствие введенного значения пользователя и вывод попыток экстрасенсов
if (!isset($_POST['number'])) {
    include ("formnumber.tpl");
    $extrasens->show_assumption();
}else {
//проверяем введенные данные
    if ($user->getValidation($_POST['number'])) {
        if (!isset($_SESSION['prav'])) $_SESSION['prav'] = array_fill(1, 3, 0);//создание массива с количеством правильных попыток каждого экстрасенса
        if (!isset($_SESSION['dostovern'])) $_SESSION['dostovern'] = array_fill(1, 3, 0);//создание массива с достоверностью каждого экстрасенса (можно обойтись и расчитывать значение каждый раз при обращении)
        $extrasens->add_hist('number',$_POST['number']);//добавление в историю введенного пользователем значения
        $extrasens->calculation();//подсчет достоверности экстрасенсов
        $extrasens->count_assumption();//Подсчет количества попыток
        $extrasens->add_hist('hist1',$_SESSION['sharl'][1]);//добавление в историю попытки первого экстрасенса
        $extrasens->add_hist('hist2',$_SESSION['sharl'][2]);//добавление в историю попытки второго экстрасенса
        $extrasens->add_hist('hist3',$_SESSION['sharl'][3]);//добавление в историю попытки третьего экстрасенса
        include ("hist.tpl");
    }else{
        echo "Введенное значение не число или не удовлетворяет условию. Попробуйте снова.";
        echo "<br><a href=" . $_SERVER['PHP_SELF'] . ">Попробовать снова</a><br/><br/>";
    }
}
if (isset($_POST['reset_ses']) && $_POST['reset_ses']==1) {$user->getReset();}else{
//Выводим кнопку при каком-либо введенном значении.
    if (isset($_POST['number'])) include ("reset.tpl");
}
include ("footer.tpl");


?>