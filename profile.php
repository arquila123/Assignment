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
        header("Location: editprofile.php");
    }    

?>

<form action="profile.php" method="post">
    <table align="center">
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" disabled="disabled" value="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="text" name="password" disabled="disabled" value="<?php echo $pass; ?>"></td>
                </tr>   
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" disabled="disabled" value="<?php echo $email; ?>"></td>
                </tr>
                <tr>
                    <td>Birthday: </td>
                    <td><input type="date" name="date" disabled="disabled" value="<?php echo $dob; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" align="center" value="Change"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>