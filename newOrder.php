<?php
include_once $_SERVER["SERVER_ROOT"].'/model/Order.php';
include_once $_SERVER["SERVER_ROOT"].'/model/Person.php';
include_once $_SERVER["SERVER_ROOT"].'/model/Object.php';
include_once $_SERVER["SERVER_ROOT"].'/model/Appeal.php';
include_once $_SERVER["SERVER_ROOT"].'/model/Check.php';
include_once $_SERVER["SERVER_ROOT"].'/model/Event.php';
include_once $_SERVER["SERVER_ROOT"].'/model/Calendar.php';
include_once $_SERVER["SERVER_ROOT"].'/controller/OrderController.php';
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
            <form action="/controller/OrderController.php" method="POST">
                <table border="1" cellpadding="5" cellspacing="0" width="50%">
                    <caption><h2>Добавить новый заказ</h2></caption>
                    <tr>
                        <td>Статус:</td>
                        <td>
                            <select name="status" size="1">
                                <option value="Принят">Принят</option>
                                <option value="В обработке">В обработке</option>
                                <option value="На согласовании">На согласовании</option>
                                <option value="В работе">В работе</option>
                                <option value="Возврат">Возврат</option>
                                <option value="Готова к выдаче">Готова к выдаче</option>
                                <option value="Закрыта">Закрыта</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Конечная дата:</td>
                        <td><input type="date" name="date_out" required ></td>
                    </tr>
                    
                    <tr>
                        <td>Источник:</td>                        
                        <td>
                            <select name="source" size="1">                                
                                <option value="Менеджер">Менеджер</option>
                                <option value="2гис">2гис</option>
                                <option value="ВК">ВК</option>
                                <option value="Рекоммендация">Рекоммендация</option>
                                <option value="Повторный">Повторный</option>
                                <option value="Директ">Директ</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Выбрать менеджера(опционально):</td>
                        <td>
                            <select name="id_manager" size="1" >
                                <option>Выбрать менеджера:</option>                                
                                <?php
                                $managers = Person::getManagers();
                                $N = count($managers);
                                for($i=0; $i<$N; $i++)
                                {
                                    echo '<option value=" '.$managers[$i][0].' "> '.$managers[$i][1].' '.$managers[$i][2].' '.$managers[$i][3].' </option>';
                                }
                                ?>
                            </select>
                            <a href="/newPerson.php">Настройка персон</a>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Объект со склада:</td>
                        <td>
                            <select name="id_object" size="1" required>
                                <option selected>Выбрать объект</option>                                
                                <?php
                                $objects = Object::getAll();
                                $N = count($objects);
                                for($i=0; $i<$N; $i++)
                                {
                                    echo '<option value=" '.$objects[$i][0].' "> '.$objects[$i][1].' - '.$objects[$i][2].' '.$objects[$i][3].' '.$objects[$i][4].' </option>';
                                }
                                ?>
                            </select>
                            <a href="<?php $_SERVER["SERVER_ROOT"]?>/newObject.php">Настройка объектов</a>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Жалоба(можно выбрать несколько через ctrl):</td>
                        <td>
                            <select name="appeals[]" size="5" required multiple>                                
                                <?php
                                $appeals = Appeal::getAll();
                                $N = count($appeals);
                                for($i=0; $i<$N; $i++)
                                {
                                    echo '<option value=" '.$appeals[$i][0].' "> '.$appeals[$i][1].' </option>';
                                }
                                ?>
                            </select>
                            <a href="/newAppeal.php">Настройка жалоб</a>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Событие:</td>
                        <td>
                            <select name="id_event" size="1" required>
                                <option selected>Выбрать событие</option>                                
                                <?php
                                $events = Event::getAll();
                                $N = count($events);
                                for($i=0; $i<$N; $i++)
                                {
                                    echo '<option value=" '.$events[$i][0].' "> '.$events[$i][1].' '.$events[$i][2].' '.$events[$i][3].' - '.$events[$i][7].' </option>';
                                }
                                ?>
                            </select>
                            <a href="/newEvent.php">Настройка событий</a>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Чек:</td>
                        <td>
                            <select name="id_check" size="1" required>
                                <option selected>Выбрать чек</option>                                
                                <?php
                                $checks = Check::getAll();
                                $N = count($checks);
                                for($i=0; $i<$N; $i++)
                                {
                                    echo '<option value=" '.$checks[$i][0].' "> '.$checks[$i][0].' </option>';
                                }
                                ?>
                            </select>
                            <a href="/newCheck.php">Настройка чеков</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Комментарий(64 kB ~ 13 листов А4):</td>
                        <td><textarea rows="5" cols="51" maxlength="200" name="comment"></textarea></td>
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

        <!--таблица объектов из БД-->
        <div class="my_table">
            <table border="1" cellpadding="5" cellspacing="0" width="50%">
                <caption><h2>Заказы</h2></caption>
                <tr>
                    <th>ID</th>
                    <th>Добавлен</th>
                    <th>Статус</th>
                    <th>Дата выдачи</th>
                    <th>Источник</th>
                    <th>id_manager</th>
                    <th>id_object</th>
                    <th>Жалобы</th>
                    <th>id_event</th>
                    <th>id_check</th>
                    <th>comment</th>
                </tr>
                <?php
                $orders=Order::getAll();
                //print_r($objects);
                $M = count($orders);
                for($i = 0; $i < $M; $i++)
                {
                    echo '<tr>';
                    $N = count($orders[$i]);
                    for($j = 0; $j < $N; $j++)
                    {
                        if($j==1 || $j==3)
                        {
                            echo '<td>';
                            echo date('d-m-Y', $orders[$i][$j]);
                            echo '</td>';
                        }
                        else
                        {
                            echo '<td>';
                            echo $orders[$i][$j];
                            echo '</td>';
                        }
                    }
                    echo '<td>';
                    echo '<a href="/controller/OrderController.php?id='.$orders[$i][0].'">Удалить</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>