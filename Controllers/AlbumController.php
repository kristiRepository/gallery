<?php

require("Helper.php");


class AlbumController
{

    protected $conn;
    protected $query;

    public function __construct()
    {

        $config = require('config.php');
        $this->conn = Connection::create($config);
        $this->query = new Album($this->conn);
    }



    public function index()
    {
        $albums = $this->query->fetchAlbums();
        require('views/album/gallery.php');
    }

    public function create()
    {

        require('views/album/add_album.php');
    }


    public function store()
    {
        session_start();
        if (isset($_POST['submit'])) {
            if (isset($_POST['name'])) {
                if (Helper::notEmpty($_POST['name'], "Album", "name", "create")) {
                    return;
                }
            }
            if (isset($_POST['description'])) {
                if (Helper::notEmpty($_POST['description'], "Album", "description", "create")) {
                    return;
                }
            }

            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = "missing.png";
            if (isset($_FILES['thumbnail']['name'])) {
                if ($_FILES['thumbnail']['name'] != "") {
                    $target = $_SERVER['DOCUMENT_ROOT'] . "/views/storage/albums/" . $_FILES['thumbnail']['name'];

                    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target);

                    $image = $_FILES['thumbnail']['name'];
                }
            }


            $data = array("name" => $name, "description" => $description, "image" => $image);

            $this->query->storeAlbum($data);

            $_SESSION['success'] = 'New album added';

            header('Location: /');
        }
    }

    public function delete()
    {
        session_start();
        $id = $_POST['id'];
        $this->query->deleteAlbumWithPhotos($id);
        $_SESSION['success'] = 'Album deleted successfully';
        header('Location: /');
    }
}
