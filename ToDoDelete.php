<?php
// including the database connection file
        $con=mysqli_connect('localhost', 'root', '', 'TODOLIST');
        $id=$_GET['id'];
        $mysql="Delete FROM LIST WHERE LISTID ='$id'";
        mysqli_query($con, $mysql);

header('Location: ToDoHome.php' );
    
?>

