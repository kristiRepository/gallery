<?php


class Photo
{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchPhotos($id)
    {

        $query = "SELECT * from photo WHERE album_id=" . $id . "";
        $statment = $this->pdo->prepare($query);
        $statment->execute();
        $photos = $statment->fetchAll();

        return $photos;
    }

    public function storePhoto($photo)
    {

        $query = "INSERT into photo (caption,path,album_id) VALUES (:caption,:path,:album_id) ";
        $statment = $this->pdo->prepare($query);
        $statment->bindParam(":caption", $photo['caption'], PDO::PARAM_STR);
        $statment->bindParam(":path", $photo['path'], PDO::PARAM_STR);
        $statment->bindParam(":album_id", $photo['album_id'], PDO::PARAM_STR);
        $statment->execute();
    }

    public function deleteP($id)
    {
        $query = "DELETE FROM photo WHERE id=:id";
        $statment = $this->pdo->prepare($query);
        $statment->bindParam(":id", $id, PDO::PARAM_STR);
        $statment->execute();
    }


    public function findPhoto($id)
    {
        $query = "SELECT path FROM photo WHERE id=:id";
        $statment = $this->pdo->prepare($query);
        $statment->bindParam(":id", $id, PDO::PARAM_STR);
        $statment->execute();
        return $statment->fetchAll();
    }


  
}
