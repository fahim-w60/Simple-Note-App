<?php
class connection{

    public PDO $pdo;
    public function __construct()
    {
        $this->pdo=new PDO('mysql:server=localhost;dbname=notes','root','');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getNotes()
    {
        $sql = "SELECT * FROM notes ORDER BY create_date DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getNoteById($id)
    {
        $sql = "SELECT * FROM notes WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    }
    public function addNotes($note)
    {  
        $sql = "INSERT INTO notes(title,description,create_date) VALUES(:title,:dexcription,:date)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('title',$note['title']);
        $stmt->bindValue('dexcription',$note['description']);
        $stmt->bindValue('date',date('Y-m-d H:i:s'));
        $stmt->execute();
    }
    public function updateNote($note, $id)
    {

        $sql = "UPDATE notes SET title= :title, description= :description WHERE id= :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->bindValue('title',$note['title']);
        $stmt->bindValue('description',$note['description']);
        $stmt->execute();
    }
    public function deleteNote($id)
    {
        $sql = "DELETE FROM notes WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
    }
}


return new connection();
?>