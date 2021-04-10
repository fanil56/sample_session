<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тестовое задание с экстрасенсами</title>
</head>
<body>
<form method="POST">
    <p>Введите загаданное число: <input type="text" name="chislo" /></p>
    <input type="submit" value="Отправить">
</form>
<?php
session_start();
if (!isset($_SESSION['sharl'])) $_SESSION['sharl']=array_fill(1, 3, 0);
if (!isset($_POST['chislo'])) {
    if (!isset($_SESSION['popitka'])) $_SESSION['popitka'] = 1;
    echo "Это " . $_SESSION["popitka"] . "-я попытка экстрасенсов<br/>";
    $i = 1;
    while ($i <= 3) {
        $_SESSION['sharl'][$i] = rand(10, 99);
        echo $i . "й предположил что это цифра: " . $_SESSION['sharl'][$i] . "<br/>";
        $i++;
    }
}else{
    if (!isset($_SESSION['prav'])) $_SESSION['prav']=array_fill(1, 3, 0);
    if (!isset($_SESSION['dostovern'])) $_SESSION['dostovern']=array_fill(1, 3, 0);
    if (!isset($_SESSION['chislo'])) $_SESSION['chislo']=array();
    array_push($_SESSION['chislo'],$_POST['chislo']);
    $ip = 1;
        while ($ip <= 3) {
            if ($_POST['chislo']==$_SESSION['sharl'][$ip]) {
                $_SESSION['prav'][$ip]++;
                $_SESSION['dostovern'][$ip] = ($_SESSION['prav'][$ip] / $_SESSION['popitka'])*100;
                echo $ip."-й угадал ваше число. Его достоверность равна: ".$_SESSION['dostovern'][$ip]."%<br/>";
            }else{
                $_SESSION['dostovern'][$ip] = ($_SESSION['prav'][$ip] / $_SESSION['popitka'])*100;
                echo $ip."-й не угадал ваше число. Его достоверность равна: ".$_SESSION['dostovern'][$ip]."%<br/>";
            }
            $ip++;
        }
    if (!isset($_SESSION['popitka'])) $_SESSION['popitka'] = 1;
    echo "Это была " . $_SESSION["popitka"]++ . "-я попытка экстрасенсов<br/>";
    echo "<br><a href=".$_SERVER['PHP_SELF'].">Попробовать еще раз</a><br/><br/>";
    if (!isset($_SESSION['hist1'])) $_SESSION['hist1']=array();
    array_push($_SESSION['hist1'],$_SESSION['sharl'][1]);
    if (!isset($_SESSION['hist2'])) $_SESSION['hist2']=array();
    array_push($_SESSION['hist2'],$_SESSION['sharl'][2]);
    if (!isset($_SESSION['hist3'])) $_SESSION['hist3']=array();
    array_push($_SESSION['hist3'],$_SESSION['sharl'][3]);
    echo "<p><b>Исторические данные</b></p><br/>Вы вводили:<br/>";
    for ($is=0;$is<=count($_SESSION['chislo']);$is++) {
        echo $_SESSION['chislo'][$is]."<br/>";
    }

    echo "история попыток первого экстрасенса:<br/>";
    for ($is=0;$is<=count($_SESSION['hist1']);$is++) {
        echo $_SESSION['hist1'][$is]."<br/>";
    }
    echo "история попыток второго экстрасенса:<br/>";
    for ($is=0;$is<=count($_SESSION['hist2']);$is++) {
        echo $_SESSION['hist2'][$is]."<br/>";
    }
    echo "история попыток третьего  экстрасенса:<br/>";
    for ($is=0;$is<=count($_SESSION['hist3']);$is++) {
        echo $_SESSION['hist3'][$is]."<br/>";
    }
}

?>
</body>
</html>
