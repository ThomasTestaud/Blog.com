<?php

$psedo = $_SESSION['psedo'];
$date = date('y-m-d');
$time = date("H:i");



if(isset($_POST['art-title'])&&!empty($_POST['art-title'])){
        
        require './data_base/connect.php';
        
        $_SESSION['title'] = $_POST['art-title'];
        $title = $_SESSION['title'];
        $_SESSION['content'] = $_POST['art-content'];
        $content = $_SESSION['content'];
        
        $query = $db->prepare("INSERT INTO `articles` (`psedo`, `title`, `content`, `date`, `time`) VALUES (
            '".addslashes($psedo)."', 
            '".addslashes($title)."', 
            '".addslashes($content)."',
            '".addslashes($date)."',
            '".addslashes($time)."')");

        
        $query->execute();
        echo "<p class='not-1'>L'article à bien été ajouté</p>";
        }else if(isset($_POST['art-title'])&&empty($_POST['art-title'])){
        echo "<p class='not-1'>Vueillez saisir un titre pour publier un article</p>";
}

?>