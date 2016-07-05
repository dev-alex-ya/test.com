<?php
include_once $_SERVER["SERVER_ROOT"].'/controller/AppealController.php';
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
            <form action="<?php $_SERVER["SERVER_ROOT"]?>/controller/AppealController.php" method="POST">
                <table border="1" cellpadding="5" cellspacing="0" width="50%">
                    <caption><h2>Добавить новую жалобу</h2></caption>
                    <tr>
                        <td>Заголовок:</td>
                        <td><input type="text" name="title" maxlength="50" size="50" required ></td>
                    </tr>
                    <tr>
                        <td>Описание:</td>
                        <td><textarea rows="5" cols="51" maxlength="254" name="description"></textarea></td>
                        
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
                <caption><h2>Имеющиеся виды жалоб</h2></caption>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Удаление записи</th>
                </tr>
                <?php
                //print_r($appeals);
                $N = count($appeals);
                for ($i = 0; $i < $N; $i++)
                {
                    ?>
                    <tr>
                        <td>
                            <?= $appeals[$i][0]; ?>
                        </td>
                        <td>
                            <?= $appeals[$i][1]; ?>
                        </td>
                        <td>
                            <?= $appeals[$i][2]; ?>
                        </td>
                        <td>
                            <a href="<?php $_SERVER["SERVER_ROOT"]?>/controller/AppealController.php?id=<?= $appeals[$i][0];?>">Удалить</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>