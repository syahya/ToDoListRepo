<?php


session_start();

if($_SESSION['LoggedIn']==true)
{
echo 'Currently viewing '.$_SESSION['username']. '\'s ToDo List';
}

else
{
   header('Location: ToDoLogin.php');
}

?>


<form method="post" action="ToDoHome.php">
    <br><br/>
    <table>
           <tr>
            <td> Add Task </td>
            <td><input type = "text" name= "addtask"></td>
            </tr>
        
            <tr>
            <td> </td>
            <td><input type = "submit" name= "addtasksubmit" value= "Submit"></td>
            </tr>
        
        
       <!-- <tr>
            <td></td>
            <td> <input type="submit" name= "logoutButton" value="logout"></td>
        </tr>
        -->
        
    </table>
            
</form>

<?php

    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,"TODOLIST");
    
if(isset($_POST['addtasksubmit']))
{
    
    echo "Task Added to List";
}
if(isset($_POST['addtask']) && isset($_POST['addtasksubmit']))
{
    $Name=$_POST['addtask'];
    $Username= $_SESSION['username'];

    $sql=mysqli_query($con, "INSERT INTO LIST(LISTID, NAME, USERNAME) VALUES ('', '$Name', '$Username')");
 
}

if(isset($_POST['logoutButton']))
{
    session_destroy();
    header('Location: ToDoLogin.php');
}
$con->close();
?>

<br><br/>
  

<?php

echo "<table border='0'' cellspacing='10' cellpadding='0' width='200'>
<caption> Task List </caption>
    <tr>
   
    </tr>";


// Create connection
$con=mysqli_connect('localhost', 'root', '', 'TODOLIST');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $Username= $_SESSION['username'];
$num = 1;
$sql = "SELECT * FROM LIST where USERNAME= '$Username'";
$result = mysqli_query($con, $sql);

    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        
    echo "<tr>";
    echo "<td> $num. </td>";
    echo "<td> $row[NAME] </td>";
   // echo "<td>  <a href='Edit.php?id=$row[ClubId]'> Edit </a> </td>";   
    echo "<td>  <a href='ToDoDelete.php?id=$row[LISTID]'>  Delete </a> </td>";
    echo "</tr>";
        
    $num++;
        /*echo "$row[ClubId] | $row[Name] | $row[Email]
        <a href='Edit.php?id=$row[ClubId]'>Edit </a> | <a href='Delete.php?id=$row[ClubId]'> Delete </a>" ;
        ?>
        <br/><br/>
    <?php  */
        
    }

echo "</table>";

$con->close();
?>


<form method="post" action="ToDoHome.php">
    <br><br/>
    <table>
           
        <tr>
            <td></td>
            <td> <input type="submit" name= "logoutButton" value="Logout"></td>
        </tr>
        
        
    </table>
            
</form>



<?php
//echo '<br><a href="ToDoLogin.php?action=logout">Logout </a>';
?>

