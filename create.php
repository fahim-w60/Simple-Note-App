<?php 
$connection = require_once './connection.php';
$id='';
if(isset($_POST['id']))
{
    $id=$_POST['id'];
}

if($id!='')
{
    $connection->updateNote($_POST,$id);
}
else 
{
    $connection->addNotes($_POST);
}

header('Location: index.php');
?>