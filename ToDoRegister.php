<h> Register New User </h>
<form method="post" action="ToDoRegister.php">
    <br><br/>
    <table>
        
           <tr>
            <td> Username </td>
            <td><input type = "text" name= "username"></td>
            </tr>
        
         <tr>
            <td> Password </td>
            <td><input type = "text" name= "password"></td>
            </tr>
        
         
            <tr>
            <td> </td>
            <td><input type = "submit" name= "register" value= "Submit"></td>
            </tr>
        
        
    </table>
            
</form>

<?php
   
 echo '<br><a href="ToDoLogin.php?action=login"> Click Here To Login </a>';

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['register']))
{
    $con=mysqli_connect('localhost', 'root', '', 'TODOLIST');
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if($username==null || $password == null)
         echo "Please input information in all fields.";
    else  
    {
    
    $sql=mysqli_query($con, "INSERT INTO USERS(USERNAME, PASSWORD) VALUES ('$username', '$password')");
         echo "<br> </br>";
        echo "Successful Registration.";
       
    }
}




?>