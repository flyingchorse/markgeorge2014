<?php
session_start();

// if isset 
if (isset($_POST['bgcolor'])){
	$_SESSION['color'] = $_POST['bgcolor'];
}
else
{
	$_SESSION['color'] = 'black';
}


print json_encode($_SESSION['color'] );