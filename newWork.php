<?php
include_once $_SERVER["SERVER_ROOT"].'/controller/WorkController.php';
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
            <form action="/controller/WorkController.php" method="POST">
                <table border="1" cellpadding="5" cellspacing="0" width="50%">
                    <caption><h2>Добавить новую работу</h2></caption>
                    <tr>
                        <td>Введите заголовок работы:</td>
                        <td><input type="text" name="title" maxlength="100" size="100" required ></td>
                    </tr>
                    <tr>
                        <td>Описание:</td>
                        <td><textarea cols="51" maxlength="64000" name="description"></textarea></td>
                        
                    </tr>
                    <tr>
                        <td>Стоимость:</td>
                        <td><input type="text" name="cost" maxlength="10" size="10" ></td>
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
                <caption><h2>Имеющиеся виды работ</h2></caption>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Стоимость</th>
                    <th>Удаление записи</th>
                </tr>
                <?php
                //print_r($works);
                $N = count($works);
                for ($i = 0; $i < $N; $i++)
                {
                    ?>
                    <tr>
                        <td>
                            <?= $works[$i][0]; ?>
                        </td>
                        <td>
                            <?= $works[$i][1]; ?>
                        </td>
                        <td>
                            <?= $works[$i][2]; ?>
                        </td>
                        <td>
                            <?= $works[$i][3]; ?>
                        </td>
                        <td>
                            <a href="/controller/WorkController.php?id=<?= $works[$i][0];?>">Удалить</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>