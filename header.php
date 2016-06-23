<h4>Введите ваши логин и пароль</h4> 
<div class = "container form-signin">

<?php
    session_start();
    $msg = '';

    if (isset($_POST['login']) && !empty($_POST['username']) 
       && !empty($_POST['password'])) 
    {

        if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin')
        {       
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = 'admin';
            echo 'You have entered valid use name and password';
            
            header('Refresh: 1; URL = ../orders.php');
            exit();
        }
        else 
        {
           $msg = 'Wrong username or password';
           header('Refresh: 1; URL = ../index.php');
           exit();
        }
    }
?>
</div> <!-- /container -->

<div class = "container">
   <form role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">
       <h4><?php echo $msg; ?></h4>
       <input type = "text" name = "username" placeholder = "enter login" required autofocus>
       <input type = "password" name = "password" placeholder = "enter password" required>
       <button type = "submit" name = "login">Ок</button>
   </form>

   <a href = "inc/logout.php" title = "Logout"> Выход

</div> 
