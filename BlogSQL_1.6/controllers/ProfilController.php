<?php

function profil() {
        if(isset($_GET['psedo'])&& !empty($_GET['psedo'])){
        require './data_base/connect.php';
        $query = $db->prepare('SELECT * FROM `users` WHERE psedo = "'.$_GET['psedo'].'"');
        $query->execute();
        $users = $query->fetchAll();
        require './views/profile.php';
        }
}

function profilEdit() {
        if(isset($_GET['psedo'])&& !empty($_GET['psedo'])){
        require './data_base/connect.php';
        $query = $db->prepare('SELECT * FROM `users` WHERE psedo = "'.$_GET['psedo'].'"');
        $query->execute();
        $users = $query->fetchAll();
        require './views/profile.php';
        }
}

function profilModify() {
        $description = addslashes($_POST['description']);
        $psedo = $_SESSION['psedo'];
        require './data_base/connect.php';
        $query = $db->prepare("UPDATE `users` SET `description`='".$description."' WHERE `psedo` = '".$psedo."'");
        $query->execute();
        echo "<div class='not-1'>Description modifié</div>";
        unset($_POST['description']);
}

?>