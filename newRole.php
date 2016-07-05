<?php
include_once $_SERVER["SERVER_ROOT"].'/controller/RoleController.php';
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
            <form action="<?php $_SERVER["SERVER_ROOT"]?>/controller/RoleController.php" method="POST">
                <table border="1" cellpadding="5" cellspacing="0" width="50%">
                    <caption><h2>Добавить новую роль</h2></caption>
                    <tr>
                        <td>Введите название для новой роли:</td>
                        <td><input type="text" name="person_role" maxlength="45" size="45" required ></td>
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
                <caption><h2>Имеющиеся роли</h2></caption>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Удаление записи</th>
                </tr>
                <?php
                //print_r($roles);
                $N = count($roles);
                for ($i = 0; $i < $N; $i++)
                {
                    ?>
                    <tr>
                        <td>
                            <?= $roles[$i][0]; ?>
                        </td>
                        <td>
                            <?= $roles[$i][1]; ?>
                        </td>
                        <td>
                            <a href="<?php $_SERVER["SERVER_ROOT"]?>/controller/RoleController.php?id=<?= $roles[$i][0];?>">Удалить</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>