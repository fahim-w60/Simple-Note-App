<?php
$connection = require_once './connection.php';
$currentNote[0]=[
    'id'=>'',
    'title'=>'',
    'description'=>''
];
$id ='';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

$notes = $connection->getNotes();




if($id!='')
{
    $currentNote = $connection->getNoteById($id);
}
echo "<pre>";
//var_dump($currentNote);
echo "<pre>";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note App</title>
    <link rel="stylesheet" href="sttyle.css">
</head>
<body>
        <h1 class="head">Simple Note App</h1>
    
        <form class="main-form" action="create.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $currentNote[0]['id'];?>">
        <input type="text" name="title" placeholder="note title" value="<?php echo $currentNote[0]['title'];?>" autocomplete="off">
        <textarea name="description" placeholder="note description" cols="3" rows="10"><?php echo $currentNote[0]['description'];?></textarea>
        <?php if($id=='') {?>
        <button>submit note</button>
        <?php } else {?>
        <button>update note</button>
        <?php } ?>
        </form>
   

    <?php
    foreach($notes as $note)
    {
    ?>
    <div class="notes">
        <a href="?id=<?php echo $note['id'];?>"><?php echo $note['title']?></a>
        <div class="butn">
            <form action="delete.php" method="post" class="button-form" >
            <input type="hidden" name="id" value="<?php echo $note['id'];?>"> 
            <button>X</button>
            </form>
        </div>
        <div class="description"><p><?php echo $note['description'];?></p></div>
        <div class="date"><p><?php echo $note['create_date']?></p></div>
        
    </div>
    <?php
    } ?>
</body>
</html>