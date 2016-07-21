<?php
session_start();
define('Title', 'Profile');
require('header.php');
include_once 'mysqli_connect.php';
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('testdb');
        $username = $_SESSION['userSession'];
        $query = "SELECT name,password,email,DOB FROM member WHERE username = '$username'";
        $result = mysql_query($query);
        $rows = mysql_fetch_array($result);
        $name=$rows['name'];
        $pass=$rows['password'];
        $email=$rows['email'];
        $dob=$rows['DOB'];
    if(isset($_POST['submit'])){ 
        $username = $_SESSION['userSession'];
        $name = $MySQLi_CON->real_escape_string(trim($_POST['name']));
        $password= $MySQLi_CON->real_escape_string(trim($_POST['password']));
        $email= $MySQLi_CON->real_escape_string(trim($_POST['email']));
        $date= $MySQLi_CON->real_escape_string(trim($_POST['date']));
        $query = "UPDATE member SET name='$name',password='$password',email='$email',DOB='$date' WHERE username='$username'";
        header("Location: profile.php");
        if($MySQLi_CON->query($query)){
			$msg = "<div class='alert alert-success' align='center'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Update !
					</div>";
                        echo $msg;
		}
		else
		{
			$msg = "<div class='alert alert-danger' align='center'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error While Updating !
					</div>";
                        echo $msg;
		}
    }    

?>

<form action="editprofile.php" method="post">
    <table align="center">
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="text" name="password" value="<?php echo $pass; ?>"></td>
                </tr>   
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                </tr>
                <tr>
                    <td>Birthday: </td>
                    <td><input type="date" name="date" value="<?php echo $dob; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" align="center" value="Submit"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>