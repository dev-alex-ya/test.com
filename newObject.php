<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once $_SERVER["SERVER_ROOT"].'/controller/BrandController.php';
include_once $_SERVER["SERVER_ROOT"].'/controller/ObjectTypeController.php';
include_once $_SERVER["SERVER_ROOT"].'/controller/ObjectController.php';
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
            <form action="/controller/ObjectController.php" method="POST">
                <table border="1" cellpadding="5" cellspacing="0" width="50%">
                    <caption><h2>Добавить новый объект</h2></caption>                                            
                    <tr>
                        <td>Тип:</td>
                        <td>
                            <select name="id_type" size="1" required>
                                <option>Выбрать тип</option>                                
                                <?php
                                $types = ObjectType::getAll();
                                $N = count($types);
                                for($i=0; $i<$N; $i++)
                                {
                                    echo '<option value=" '.$types[$i][0].' "> '.$types[$i][1].' </option>';
                                }
                                ?>
                            </select>
                            <a href="<?php $_SERVER["SERVER_ROOT"]?>/newObjectType.php">Настройка типов</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Бренд:</td>
                        <td>
                            <select name="id_brand" size="1" required>
                                <option>Выбрать бренд</option>                                
                                <?php
                                $brands = Brand::getAll();
                                $N = count($brands);
                                for($i=0; $i<$N; $i++)
                                {
                                    echo '<option value=" '.$brands[$i][0].' "> '.$brands[$i][1].' </option>';
                                }
                                ?>
                            </select>
                            <a href="<?php $_SERVER["SERVER_ROOT"]?>/newBrand.php">Настройка брендов</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Модель:</td>
                        <td><textarea rows="5" cols="51" maxlength="254" name="model" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Серийный номер:</td>
                        <td><textarea rows="5" cols="51" maxlength="254" name="serial_number"></textarea></td>
                    </tr>
                    <tr>
                        <td>Стоимость:</td>
                        <td><input type="text" name="cost" maxlength="10" size="10" ></td>
                        
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
                <caption><h2>Объекты со склада</h2></caption>
                <tr>
                    <th>ID</th>
                    <th>Тип</th>
                    <th>Бренд</th>
                    <th>Модель</th>
                    <th>Серийный номер</th>
                    <th>стоимость</th>
                </tr>
                <?php
                //print_r($objects);
                $M = count($objects);
                for($i = 0; $i < $M; $i++)
                {
                    echo '<tr>';
                    $N = count($objects[$i]);
                    for($j = 0; $j < $N; $j++)
                    {
                        echo '<td>';
                        echo $objects[$i][$j];
                        echo '</td>';
                    }
                    echo '<td>';
                    
                    echo '<a href="/controller/ObjectController.php?id=' .$objects[$i][0]. '">Удалить</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>