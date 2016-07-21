<?php
session_start();
define('Title', 'Comments');
require('header.php');
include_once 'mysqli_connect.php';

if(isset($_SESSION['userSession'])=="")
    {
            header("Location: commentfail.php");
    }
    
    if(isset($_POST['submit'])){ 
        if((!empty($_POST['comment']))&&(!empty($_POST['BookName']))&&(!empty($_POST['review']))){
            $BookName= $MySQLi_CON->real_escape_string(trim($_POST['BookName']));
            $review= $MySQLi_CON->real_escape_string(trim($_POST['review']));
            $comment= $MySQLi_CON->real_escape_string(trim($_POST['comment']));
            $username1 = $_SESSION['userSession'];
            
            $query = "INSERT INTO comments(BookName,Review,Comment,username) VALUES ('$BookName','$review','$comment','$username1')";
          
            if($MySQLi_CON->query($query)){
			$msg = "<div class='alert alert-success' align='center'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Commend Send !
					</div>";
                        echo $msg;
		}
		else
		{
			$msg = "<div class='alert alert-danger' align='center'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while commenting !
					</div>";
                        echo $msg;
		}
                
        }else{
            echo '<p align="center"><b>Please enter all the details</b></p>';
        }
        $MySQLi_CON->close();    
    }
    
?>

<form action="comment.php" method="post">
            <table align="center" name="t">
                <tr>
                    <td>Book Name: </td>
                    <td><select name="BookName">
                        <option value="">---Book---</option>
                        <option value="Diary of Wimpy Kid">Diary of Wimpy Kid</option>
                        <option value="Catching Fire">Catching Fire</option>
                        <option value="City of Bone">City of Bone</option>
                        <option value="The Davinci Code">The Davinci Code</option>
                </select></td>
                </tr>
                <tr>
                    <td>Review: </td>
                    <td><select name="review">
                        <option value="">---Review---</option>
                        <option value="VB">Very Bad</option>
                        <option value="Bad">Bad</option>
                        <option value="Aver">Average</option>
                        <option value="Good">Good</option>
                        <option value="VG">Very Good</option>
                </select></td>
                </tr>
                <tr>
                    <td>Comment: </td>
                    <td><textarea name="comment" style="width: 120%;height: 150%"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" align="center" name='submit' value="Send"/></td>
                </tr>
            </table>
                
</form>
