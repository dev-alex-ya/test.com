<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


include_once $_SERVER["SERVER_ROOT"].'/controller/PersonController.php';
include_once $_SERVER["SERVER_ROOT"].'/controller/EventController.php';
?>
<!Doctype html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>
    <div class="head">
        <?php include $_SERVER["SERVER_ROOT"].'/header.php'; ?>
    </div>
    <div class="all">
        <div class="my_menu">
            <?php include $_SERVER["SERVER_ROOT"].'/menu.php'; ?>
        </div>
        <div class="my_table">
            <form action="/controller/EventController.php" method="POST">
                <table border="1" cellpadding="5" cellspacing="0" width="50%">
                    <caption><h2>Добавить новое событие</h2></caption>                    
                    <tr>
                        <td>Персона:</td>
                        <td>
                            <select name="id_person" size="1" required>
                                <option>Выбрать персону</option>                                
                                <?php
                                $persons = Person::getAll();
                                $N = count($persons);
                                for($i=0; $i<$N; $i++)
                                {
                                    echo '<option value=" '.$persons[$i][0].' "> id='.$persons[$i][0].'->'.$persons[$i][1].' '.$persons[$i][2].' '.$persons[$i][3].' </option>';
                                }
                                ?>
                            </select>
                            <a href="<?php $_SERVER["SERVER_ROOT"]?>/newPerson.php">Настройка персон</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Конечная дата:</td>
                        <td><input type="date" name="calendar" required ></td>
                    </tr>
                    <tr>
                        <td>Тема:</td>
                        <td><input type="text" name="title" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Описание:</td>
                        <td><textarea rows="5" cols="51" maxlength="200" name="description"></textarea></td>
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
        
        <!--таблица событий из БД-->
        <div class="my_table">
            <table border="1" cellpadding="5" cellspacing="0" width="50%">
                <caption><h2>Все события</h2></caption>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Очество</th>
                    <th>Фамилия</th>
                    <th>Начальное время</th>
                    <th>конечное время</th>
                    <th>Тема</th>
                    <th>Описание</th>                        
                </tr>
                <?php
                //print_r($events);
                $M = count($events);
                for($i = 0; $i < $M; $i++)
                {
                    echo '<tr>';
                    $N = count($events[$i]);
                    for($j = 0; $j < $N; $j++)
                    {
                        if($j==5 || $j==4)
                        {
                            echo '<td>';
                            echo date('d-m-Y', $events[$i][$j]);
                            echo '</td>';
                        }
                        else
                        {
                            echo '<td>';
                            echo $events[$i][$j];
                            echo '</td>';
                        }
                    }
                    echo '<td>';
                    echo '<a href="/controller/EventController.php?id=' .$events[$i][0]. '">Удалить</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>