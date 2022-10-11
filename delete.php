<?php 
$connection = require_once('./connection.php');

$id="";
if(isset($_POST['id']))
{
    $id=$_POST['id'];
}

if($id)
{
    $connection->deleteNote($id);
}
header('Location: index.php');

?>