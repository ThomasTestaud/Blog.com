<?php
    function register(){
        require './views/registerform.php';
    }
    
    $date = date("y-m-d");
    

    
    if(isset($_POST['psedo-register']) && $_POST['password-register-1']===$_POST['password-register-2']) {
        $_SESSION['psedo'] = $_POST['psedo-register'];
        $_SESSION['password'] = $_POST['password-register-1'];
        
        require './data_base/connect.php';
        
        $query = $db->prepare("INSERT INTO `users` (`psedo`, `password`, `creation_date`, `description`) VALUES (
            '".addslashes($_POST['psedo-register'])."', 
            '".addslashes($_POST['password-register-1'])."', 
            '".$date."', 
            'Cette description est vide.');");
            
        $query->execute();
        // echo '<div class="pop-up-1">Création réussite</div>';
        id_check();
    }
?>