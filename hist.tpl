<div width="99%">
    <h1>Исторические данные</h1>
    <div style="width: 20%; display: inline-block;">
        <p>Вы вводили:</p>
        <?php
        show_hist($_SESSION['number']);//вывод истории введенных пользователем значений
        ?>
    </div>
    <div style="width: 20%; display: inline-block;">
        <p>История попыток первого экстрасенса</p>
        <?php
        show_hist($_SESSION['hist1']);//вывод истории попыток первого экстрасенса
        ?>
    </div>
    <div style="width: 20%; display: inline-block;">
        <p>История попыток второго экстрасенса</p>
        <?php
        show_hist($_SESSION['hist2']);//вывод истории попыток первого экстрасенса
        ?>
    </div>
    <div style="width: 20%; display: inline-block;">
        <p>История попыток третьего экстрасенса</p>
        <?php
        show_hist($_SESSION['hist3']);//вывод истории попыток первого экстрасенса
        ?>
    </div>
</div>