<h> ToDo List Login </h>
<form method="post">
    <br><br/>
    <table>
           <tr>
            <td> Username </td>
            <td><input type = "text" name= "username"></td>
            </tr>
        <tr>
            <td> Password </td>
            <td><input type = "password" name= "password"></td>
            </tr>
        
        <tr>
            <td> </td>
            <td><input type = "submit" name= "submitButton" value= "Login"></td>
            </tr>
        
        
        
    </table>
            
    
</form>


<?php
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,"TODOLIST");
    
if(isset($_POST['username']))
{
   $username= $_POST['username'];
}
 else
{
     $username='Empty';
}

if(isset($_POST['password']))
{
   $password= $_POST['password'];
}
else
{
     $password= 'Empty';
}


            
$query=mysqli_query($con,"SELECT * FROM USERS WHERE USERNAME='$username' AND PASSWORD='$password'");

$check=mysqli_fetch_array($query);
            
if($check['USERNAME']== $username && $check['PASSWORD']==$password)
{
    if($username=='Empty' && $password='Empty')
    {
        echo "Please sign in";
    }
    else if($username==NULL && $password==NULL)
    {
        echo "Please sign in";
        $_SESSION['username']=null;
    }
    else
    {
        echo "Successful login";
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['LoggedIn']=true;
        header('Location: ToDoHome.php');
         
        
    }
}
else if ($check['USERNAME'] != $username || $check['PASSWORD'] != $password)
{
    if($username=='Empty' && $password='Empty')
    {
        echo "Please sign in";
        $_SESSION['username']=null;
    }
    else
    {

        echo "Unsuccessful login";
        $_SESSION['username']=null;

    }
}



mysqli_close($con);
?>

 <form method="post" action="ToDoRegister.php">
    <br><br/>
    <table>
          
        <tr>
            <td></td>
            <td> <input type="submit" name= "registerButton" value="Register"></td>
        </tr>
        
        
    </table>
            
</form>