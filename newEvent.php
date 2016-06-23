<?php
include_once $_SERVER['DOCUMENT_ROOT'].'controller/PersonController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'controller/EventController.php';
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
            <form action="http://test.com/controller/EventController.php" method="POST">
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
                            <a href="http://test.com/newPerson.php">Настройка персон</a>
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
        
        <!--таблица персон из БД-->
        <div class="my_table">
            <table border="1" cellpadding="5" cellspacing="0" width="50%">
                <caption><h2>Персоны из базы</h2></caption>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Очество</th>
                    <th>Фамилия</th>
                    <th>Роль</th>
                    <th>Телефон</th>
                    <th>Адрес</th>
                    <th>Банковская карта</th>
                    <th>Манипуляции</th>
                </tr>
                <?php
                //print_r($persons);
                $M = count($persons);
                for($i = 0; $i < $M; $i++)
                {
                    echo '<tr>';
                    $N = count($persons[$i]);
                    for($j = 0; $j < $N; $j++)
                    {
                        echo '<td>';
                        echo $persons[$i][$j];
                        echo '</td>';
                    }
                    echo '<td>';
                    
                    echo '<a href="http://test.com/controller/PersonController.php?id=' .$persons[$i][0]. '">Удалить</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>