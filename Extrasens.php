<?php
//функция валидации введенных пользователем данных
class Extrasens {
    public $hist = array();
    //функция вывода предположений экстрасенсов
    function show_assumption() {
        if (!isset($_SESSION['attempt'])) $_SESSION['attempt'] = 1;
        echo "Это " . $_SESSION["attempt"] . "-я попытка экстрасенсов<br/>";
        $i = 1;
        while ($i <= 3) {
            $_SESSION['sharl'][$i] = rand(10, 99);
            echo $i . "й предположил что это цифра: " . $_SESSION['sharl'][$i] . "<br/>";
            $i++;
        }
    }
    //Функция подсчета достоверности экстрасенсов
    function calculation() {
        $ip = 1;
        while ($ip <= 3) {
            if ($_POST['number'] == $_SESSION['sharl'][$ip]) {
                $_SESSION['prav'][$ip]++;
                $_SESSION['dostovern'][$ip] = ($_SESSION['prav'][$ip] / $_SESSION['attempt']) * 100;
                echo $ip . "-й угадал ваше число. Его достоверность равна: " . $_SESSION['dostovern'][$ip] . "%<br/>";
            } else {
                $_SESSION['dostovern'][$ip] = ($_SESSION['prav'][$ip] / $_SESSION['attempt']) * 100;
                echo $ip . "-й не угадал ваше число. Его достоверность равна: " . $_SESSION['dostovern'][$ip] . "%<br/>";
            }
            $ip++;
        }
    }
    //функция подсчета попыток экстрасенсов
    function count_assumption() {
        if (!isset($_SESSION['attempt'])) $_SESSION['attempt'] = 1;
        echo "Это была " . $_SESSION["attempt"]++ . "-я попытка экстрасенсов<br/>";
        echo "<br><a href='/index.php'>Попробовать еще раз</a><br/><br/>";
    }
    //функция вывода исторических данных
    function show_hist($hist) {
        for ($is = 0; $is <= count($hist); $is++) {
            echo $hist[$is] . "<br/>";
        }
    }
    //функция добавления значений в историю
    function add_hist ($param,$value) {
        if (!isset($_SESSION[$param])) $_SESSION[$param] = array();
        array_push($_SESSION[$param], $value);
    }

}

?>

