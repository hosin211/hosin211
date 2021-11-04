<?php


require_once "db.php";
$id = $_GET['id']; // get id through query string


$fdoc = $_REQUEST['fdoc'];
$del = mysqli_query($link, "delete from subjects_db where id = '$id'"); // delete query
unlink($_SERVER['DOCUMENT_ROOT'] . "/doc/" . $fdoc);
mysqli_close($link);

header('Location: ' . $_SERVER['HTTP_REFERER']);

exit;