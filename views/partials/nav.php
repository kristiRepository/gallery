<div class="topnav top">
    <a href="/"> <img class="rounded mx-auto d-block" id="title" src="/views/storage/banner.png" width="170px"></a>
    <button class="button" onclick="display()" style="vertical-align:middle"><span>All albums </span></button>
</div>


<div class="topnav" id="dropdown" style="display:none;">
    <hr>
    <?php foreach ($albums as $album) { ?>

        <a href=<?php echo "/Gallery/album/?id=" . $album['id']; ?>><?php echo $album['name'] ?></a>

    <?php } ?>
    <a style="background-color: #f4511e; color:white;" href="/Gallery/create/">Add new album</a>
</div>


<style>
    .button {
        float: right;
        display: inline-block;
        border-radius: 4px;
        background-color: #f4511e;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 28px;
        padding: 17px;
        width: 200px;
        height: 75px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button:hover span {
        padding-right: 25px;
    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
    }



    .topnav {
        background-color: black;
        overflow: hidden;
    }

    .top {
        background-color: ffb647;
        overflow: hidden;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
        float: left;
        color: wheat;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 19px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    /* Add a color to the active/current link */
    .topnav a.active {
        background-color: #4CAF50;
        color: white;
    }
</style>

<script>
    function display() {
        var x = document.getElementById("dropdown");
        if (x.style.display == "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>