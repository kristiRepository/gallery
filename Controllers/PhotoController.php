<?php


class PhotoController
{


    protected $conn;
    protected $queryAlbum;
    protected $queryPhoto;

    public function __construct()
    {

        $config = require('config.php');
        $this->conn = Connection::create($config);
        $this->queryAlbum = new Album($this->conn);
        $this->queryPhoto = new Photo($this->conn);
    }

    public function index()
    {
        $id = $_GET['id'];
        $photos = $this->queryPhoto->fetchPhotos($id);
        $main = $this->queryAlbum->findAlbum($id);
        $albums = $this->queryAlbum->fetchAlbums($id);

        require('views/photo/index.php');
    }

    public function create()
    {
        require('views/photo/create.php');
    }

    public function store()
    {

        session_start();
        if (isset($_POST['submit'])) {
            $caption = $_POST['caption'];

            if (isset($_FILES['path'])) {
                $target = $_SERVER['DOCUMENT_ROOT'] . "/views/storage/photos/" . $_FILES['path']['name'];

                move_uploaded_file($_FILES['path']['tmp_name'], $target);


                $path = $_FILES['path']['name'];
                $id = $_POST['album'];
                $album = $this->queryAlbum->findAlbum($id);

                $data = array("caption" => $caption, "path" => $path, "album_id" => $album[0]['id']);



                $this->queryPhoto->storePhoto($data);

                $_SESSION['success'] = 'New photo added';

                header('Location: /Gallery/album/?id=' . $id . "");
            }
        }
    }

    public function delete()
    {
        session_start();
        $photo = intval($_POST['photoId']);
        $this->queryPhoto->deleteP($photo);
        $_SESSION['success'] = 'Photo Deleted';
        $id = intval($_POST['albumId']);


        $photos = $this->queryPhoto->fetchPhotos($id);
        $main = $this->queryAlbum->findAlbum($id);
        $albums = $this->queryAlbum->fetchAlbums($id);

        require('views/photo/index.php');
    }

    public function slider()
    {

        $id = intVal($_GET['album']);
        $photoId = intVal($_GET['photo']);
        $photos = $this->queryPhoto->fetchPhotos($id);
        $photoPath = $this->queryPhoto->findPhoto($photoId);
        $photoNumber = $this->queryPhoto->counted($id);
        require('views/photo/slider.php');
    }
}
