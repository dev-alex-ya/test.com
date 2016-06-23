<?php
include_once $_SERVER['DOCUMENT_ROOT'].'controller/CheckController.php';
?>
<!Doctype html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>
    <div class="head">
        <?php include 'header.php'; ?>
    </div>
    <div class="all">
        <div class="my_menu">
            <?php include 'menu.php'; ?>
        </div>
        <div class="my_table">
            <form action="http://test.com/controller/CheckController.php" method="POST">
                <table border="1" cellpadding="5" cellspacing="0" width="50%">
                    <caption><h2>Добавить новый чек</h2></caption>                    
                    <tr>
                        <td>Получил на руки:</td>
                        <td><input type="text" name="got_on_hands" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Чистый чек:</td>
                        <td><input type="text" name="blank_check" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Запчасти:</td>
                        <td><input type="text" name="parts_cost" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Транспортные расходы:</td>
                        <td><input type="text" name="transport" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Менеджеру:</td>
                        <td><input type="text" name="managers_part" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Мастеру:</td>
                        <td><input type="text" name="masters_part" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Коммиссия:</td>
                        <td><input type="text" name="commission" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Чистыми:</td>
                        <td><input type="text" name="total" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Долг по заявке:</td>
                        <td><input type="text" name="debt" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Перечисления:</td>
                        <td><input type="text" name="transfer" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Дата перевода:</td>
                        <td><input type="date" name="date_transfer" required ></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id">
                            <input type="submit" value="Добавить/Обновить">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        
        <!--таблица персон из БД-->
        <div class="my_table">
            <table border="1" cellpadding="5" cellspacing="0" width="50%">
                <caption><h2>Персоны из базы</h2></caption>
                <tr>
                    <th>ID</th>
                    <th>Получил на руки</th>
                    <th>Чистый чек</th>
                    <th>Запчасти</th>
                    <th>Транспортные расходы</th>
                    <th>Менеджеру</th>
                    <th>Мастеру</th>
                    <th>Коммиссия</th>
                    <th>Чистыми</th>
                    <th>Долг по заявке</th>
                    <th>Перечисления</th>
                    <th>Дата перевода</th>
                </tr>
                <?php
                print_r($checks);
                $M = count($checks);
                for($i = 0; $i < $M; $i++)
                {
                    echo '<tr>';
                    $N = count($checks[$i]);
                    for($j = 0; $j < $N; $j++)
                    {
                        echo '<td>';
                        echo $checks[$i][$j];
                        echo '</td>';
                    }
                    echo '<td>';
                    
                    echo '<a href="http://test.com/controller/CheckController.php?id=' .$checks[$i][0]. '">Удалить</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>