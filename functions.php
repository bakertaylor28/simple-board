<?php
/*This code is copyright (c) 2019, All Rights Reserved. and is 
governed by the GNU greater license. */ 
//This function displays the messages in the database to an html table.
function display() {
session_start();
/*connect to the database. User should set the necessary values 
to reflect their correct database, SQL host, SQL user, and SQL 
password. */
$connection = mysql_connect('database_host', 'database_user', 'password'); 
if ($connection->connect_error) {
    die("Connection failed: " . $connnection->connect_error);
} 
mysql_select_db('database_name');
$query = "SELECT * FROM messages"; 
$result = mysql_query($query);
//Open HTML tags 
echo "<html><table>"; 
//Create a loop to loop through SQL results
while($row = mysql_fetch_array($result)){   
echo "<tr><td>" . $row['id'] . "</td><td>" . $row['date'] . "</td></tr>""<tr><td>" . $row['name'] . "</td><td>" . "<tr><td>" . $row['comment'] . "</td><td>" . ; 
}
//Close the table in HTML
echo "</table>"; 
mysql_close();	
}
//This function sends new messages to the server from the HTTP client.
function sendmsg() {
session_start();
//get the date in UTC time zone
date_default_timezone_set('UTC');
$d = date(DATE_RFC2822);

/*HTML tag was opened in a previously called function. We
do not need to open it again.  Set the form for the user submission.*/
echo '<form action="/index.php" method="post">';
echo '<input type="text" name="name"><br><br>';
echo '<textarea rows = "5" cols= "50" name="msg">';
echo 'Enter Message Here...</textarea><br><br>';
echo '<input type="submit" value="Submit">';
echo '</form>';
/* Set regular expression as varriable and transfer the HTML post to 
PHP. */
$validate = '/^[a-z]+[a-z0-9]*[.-_]*$/i';
$name = stripslashes($_POST['name']);
$msg =  stripslashes($_POST['msg']);
// Perform regular expression matching to prevent SQL injection. 
 if(isset($_POST['submit'])) &&  ((preg_match($validate , $name)==true) && (preg_match($validate , $msg)==true))      {
 //connect to database.
 $connection = mysql_connect('database_host', 'database_user', 'password'); 
if ($connection->connect_error) {
    die("Connection failed: " . $connnection->connect_error);
} 
mysql_select_db('database_name');
$query = "INSERT INTO messages (date, name, comment) VALUES ('$d' , '$name' , '$msg')";
mysql_query($query) or trigger_error(mysql_error() . in $query); 
session_destroy(); 
header("Location: /index.php", true, 301);
exit();
}else {
/*Error message if regular expression fails to match to prevent 
SQL injection. */ 
echo 'Error: Failed to meet required regular expresion.';}else { 
/*This code executes if neither code above executes and it is 
necessary to terminate the script. */
session_destroy(); 
die();}
}
?>