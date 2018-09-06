 <?php
        {
            session_start();
            session_unset();
            session_destroy();
            echo "You logged out";
            header('Location: ToDoLogin.php');
        }
?>