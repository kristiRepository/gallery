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
        $albums = $this->queryAlbum->fetchAlbums();
        $main = array_column($albums, 'name', 'id');


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
            $find = empty($this->queryAlbum->findAlbum($_POST['album']));

            if (isset($_POST['album']) && $_POST['album'] != "" && !$find) {
                $id = $_POST['album'];
                $direct = "photo/create/?album=" . $_POST['album'];
                if (isset($_POST['caption'])) {
                    if (Helper::notEmpty($_POST['caption'], "Photo", "caption", $direct)) {
                        return;
                    }
                }
                $caption = $_POST['caption'];

                if (isset($_FILES['path'])) {
                    if (Helper::notEmpty($_FILES['path']['name'], "Photo", "path", $direct)) {
                        return;
                    }
                    $target = $_SERVER['DOCUMENT_ROOT'] . "/views/storage/photos/" . $_FILES['path']['name'];

                    move_uploaded_file($_FILES['path']['tmp_name'], $target);


                    $path = $_FILES['path']['name'];


                    $data = array("caption" => $caption, "path" => $path, "album_id" => $id);



                    $this->queryPhoto->storePhoto($data);

                    $_SESSION['success'] = 'New photo added';

                    header('Location: /album/?id=' . $id . "");
                    return;
                }
            } else {
                $_SESSION['error'] = "The choosen album  was not found";

                header("Location: /");
                return true;
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
        require('views/photo/slider.php');
    }
}
