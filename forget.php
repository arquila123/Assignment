<?php
session_start();
define('Title', 'Forget Password');
require('header.php');
include_once 'mysqli_connect.php';
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('testdb');   
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        
        $query = "SELECT password,email FROM member WHERE username = '$username'";
        $result = mysql_query($query);
        $rows = mysql_fetch_array($result);
        $email1 = $rows['email'];
        $pass = $rows['password'];
            if((!empty($_POST['username']))&&(!empty($_POST['email']))){
                if(($_POST['email']== $email1)){
                    echo '<p align="center"><b>Your password is '.$pass.'</b></p>';
                
                }else{
               echo 'Invalid Email';
            }
        }else{
            echo 'Please Enter Your Username and Email';
        }
    }else{
        print '<form action="forget.php" method="post">'
        .'<table align="center">'
                .'<tr>'
                    .'<td>'
                        . '<p>Username:'
                    .'</td>'
                    .'<td>'
                        .'<input type="text" name="username" size="20"/></p>'
                    .'</td>'
                .'</tr>'
                .'<tr>'
                    .'<td>'
                        . '<p>Email:'
                    .'</td>'
                    .'<td>'
                        .'<input type="text" name="email" size="50"/></p>'
                    .'</td>'
                .'</tr>'
                .'<tr>'
                    .'<td>'
                    .'</td>'
                    .'<td>'
                        . '<p><input type="submit" name="submit" name="submit" value"login"/></p>'      
                    .'</td>'
                .'</tr>'
            .'</table>'
        . '</form>';
    }
?>

</body>
</html>