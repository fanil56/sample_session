<?php
class User {
    function getValidation($number)
    {
        if (!is_numeric($number)) {
            return false;
        }else{
            if ($number<10 || $number > 99) {return false;}else{
                return true;}
        }

    }
    function getReset() {
        session_destroy();
        echo "Сессия сброшена";
        echo "<meta  http-equiv='Refresh' content='1; url=/index.php'";
    }
}

?>