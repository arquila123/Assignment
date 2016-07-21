<?php
session_start();
define('Title', 'Register');
require('header.php');
include_once 'mysqli_connect.php';

    if(isset($_SESSION['userSession'])!="")
    {
            header("Location: index.php");
    }
    

    if(isset($_POST['submit'])){ 
        
            $username = $MySQLi_CON->real_escape_string(trim($_POST['username']));
            $name = $MySQLi_CON->real_escape_string(trim($_POST['name']));
            $password= $MySQLi_CON->real_escape_string(trim($_POST['password']));
            $email= $MySQLi_CON->real_escape_string(trim($_POST['email']));
            $date= $MySQLi_CON->real_escape_string(trim($_POST['date']));
            
            $check_username = $MySQLi_CON->query("SELECT username FROM member WHERE username='$username'");
            $count=$check_username->num_rows;
        
            if($count==0){
            $query = "INSERT INTO member(username,name,password,email,DOB) VALUES('$username','$name','$password','$email','$date')";
            
            if($MySQLi_CON->query($query)){
			$msg = "<div class='alert alert-success' align='center'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
                        echo $msg;
		}
		else
		{
			$msg = "<div class='alert alert-danger' align='center'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
                        echo $msg;
		}
            }else{
		
		
		$msg = "<div class='alert alert-danger' align='center'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, Username is Taken !
				</div>";
                echo $msg;
			
	}
                $MySQLi_CON->close();
	}
	
            	

?>

<form action="register.php" method="post" onsubmit="return checkForm(this);">

            <table align="center">
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td><input type="password" name="pwd2"></td>
                </tr>    
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Birthday: </td>
                    <td><input type="date" name="date"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" align="center" value="Register"/></td>
                </tr>
                
            </table>
        </form>
</body>
</html>