<?php
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Nie połączono : ' . mysql_error());
}

$db_selected = mysql_select_db('koleje', $link);
if (!$db_selected) {
    die ('Nie można ustawić bazy : ' . mysql_error());
}

session_start();

$LOGGED = false;
if($_SESSION) {
$email = $_SESSION['email'];
$password = $_SESSION['password'];

$usr = mysql_query("SELECT * FROM users WHERE email='".$email."' AND password='".$password."'");
if(mysql_num_rows($usr) != 0){
	$u = mysql_fetch_array($usr);
	$LOGGED = true;
}	
}
?>