<?php
session_start();
    define('Title', 'Login');
    require('header.php');
    include_once 'mysqli_connect.php';
    $connection = mysql_connect('localhost', 'root', '');
    mysql_select_db('testdb');
    
    if(isset($_POST['submitted'])){
        $username = $_POST['username'];
        $query = "SELECT password FROM member WHERE username = '$username'";
        $result = mysql_query($query);
        $rows = mysql_fetch_array($result);
        $pass = $rows['password'];
                if((!empty($_POST['username']))&&(!empty($_POST['password']))){
                if(($_POST['password']== $pass)){
                    $_SESSION['userSession'] = $_POST['username'];
                    header("Location: index.php");
                }
                else{
                        echo '<p align="center"><b>Invalid Password</b></p>';
                }
            }
            else{
                echo '<p align="center"><b>Please Enter Your Username and Password</b></p>';
            }
            $MySQLi_CON->close();
    }
    else{
            print '<form action="login.php" method="post" onsubmit="return checkForm(this);">'
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
                . '<p>Password:'
                .'</td>'
                .'<td>'
                .'<input type="password" name="password" size="20"/></p>'
                .'</td>'
                .'</tr>'
                .'<tr>'
                .'<td>'
                .'<a href="forget.php">Forget Password</a>'
                .'</td>'
                .'<td>'
                . '<p><input type="submit" name="submit" value"login"/></p>'
                . '<input type="hidden" name="submitted" value="true"/></form>'
                .'</td>'
                .'</tr>'
                .'</table>';
    }
    
?>

</body>
</html>