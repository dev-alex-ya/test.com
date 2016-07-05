<?php
include_once $_SERVER["SERVER_ROOT"].'/controller/ObjectTypeController.php';
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
            <form action="/controller/ObjectTypeController.php" method="POST">
                <table border="1" cellpadding="5" cellspacing="0" width="50%">
                    <caption><h2>Добавить новый тип объекта</h2></caption>
                    <tr>
                        <td>Введите название для нового типа:</td>
                        <td><input type="text" name="object_type" maxlength="100" size="100" required ></td>
                    </tr>            
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Добавить">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="my_table">
            <table border="1" cellpadding="5" cellspacing="0" width="50%">
                <caption><h2>Имеющиеся типы объектов</h2></caption>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Удаление записи</th>
                </tr>
                <?php
                //print_r($types);
                $N = count($types);
                for ($i = 0; $i < $N; $i++)
                {
                    ?>
                    <tr>
                        <td>
                            <?= $types[$i][0]; ?>
                        </td>
                        <td>
                            <?= $types[$i][1]; ?>
                        </td>
                        <td>
                            <a href="/controller/ObjectTypeController.php?id=<?= $types[$i][0];?>">Удалить</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>