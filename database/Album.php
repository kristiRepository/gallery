<?php


class Album
{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function storeAlbum($album)
    {

        $query = "INSERT into album (name,description,thumbnail) VALUES (:name,:description,:image) ";
        $statment = $this->pdo->prepare($query);
        $statment->bindParam(":name", $album['name'], PDO::PARAM_STR);
        $statment->bindParam(":description", $album['description'], PDO::PARAM_STR);
        $statment->bindParam(":image", $album['image'], PDO::PARAM_STR);
        $statment->execute();
    }

    public function fetchAlbums()
    {
        $query = "SELECT * from album";
        $statment = $this->pdo->prepare($query);
        $statment->execute();
        return $result = $statment->fetchAll();
    }

    public function deleteAlbumWithPhotos($id)
    {

        $query = "DELETE album,photo FROM album LEFT JOIN photo ON album.id=photo.album_id WHERE album.id=:id";
        $statment = $this->pdo->prepare($query);
        $statment->bindParam(":id", $id, PDO::PARAM_INT);
        $statment->execute();
    }

    public function findAlbum($id)
    {

        $query = "SELECT * FROM album WHERE id=:id";
        $statment = $this->pdo->prepare($query);
        $statment->bindParam(":id", $id, PDO::PARAM_INT);
        $statment->execute();
        return $result = $statment->fetchAll();
    }
}
