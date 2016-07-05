<?php
include_once $_SERVER["SERVER_ROOT"].'/controller/RoleController.php';
include_once $_SERVER["SERVER_ROOT"].'/controller/PersonController.php';
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
            <form action="<?php $_SERVER["SERVER_ROOT"]?>/controller/PersonController.php" method="POST">
                <table border="1" cellpadding="5" cellspacing="0" width="50%">
                    <caption><h2>Добавить новую персону</h2></caption>
                    <tr>
                        <td>Имя:</td>
                        <td><input type="text" name="firstname" maxlength="20" size="20" required ><i>*(обязательное поле)</i></td>
                    </tr>
                    <tr>
                        <td>Отчество:</td>
                        <td><input type="text" name="middlename" maxlength="20" size="20" ></td>
                    </tr>
                    <tr>
                        <td>Фамилия:</td>
                        <td><input type="text" name="lastname" maxlength="30" size="30" ></td>
                    </tr>
                    <tr>
                        <td>Роль:</td>
                        <td>
                            <select name="id_role" size="1" required>
                                <option>Выбрать роль</option>
                                <?php
                                $roles = Role::getAll();
                                $N = count($roles);
                                for($i=0; $i<$N; $i++)
                                {
                                    echo '<option value=" '.$roles[$i][0].' "> '.$roles[$i][1].' </option>';
                                }
                                ?>
                            </select>
                            <a href="<?php $_SERVER["SERVER_ROOT"]?>/newRole.php">Настройка ролей</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Телефон:</td>
                        <td><input type="text" name="phone" maxlength="25" size="25" ></td>
                    </tr>
                    <tr>
                        <td>Адрес:</td>
                        <td><textarea rows="4" cols="50" maxlength="200" name="address"></textarea></td>
                        
                    </tr>
                    <tr>
                        <td>Банковская карта:</td>
                        <td><input type="text" name="card" maxlength="45" size="45" ></td>
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
                    
                    echo '<a href="'.$_SERVER["SERVER_ROOT"].'/controller/PersonController.php?id=' .$persons[$i][0]. '">Удалить</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>