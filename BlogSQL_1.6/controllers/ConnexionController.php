<?php
    session_start();
    
    
        function check_db(){
            require './data_base/connect.php';
            
            $query = $db->prepare('SELECT * FROM `users`');
            $query->execute();
            $user = $query->fetchAll();
            
            if(isset($_SESSION['psedo']) && isset($_SESSION['password'])){
                foreach ($user as $key => $user) {
                    if($user['psedo'] === $_SESSION['psedo'] && $user['password'] === $_SESSION['password']){
                        $_SESSION['connected'] = true;
                        setcookie("psedo", $_SESSION['psedo'], time() + (86400 * 30), "/");
                        setcookie("password", $_SESSION['password'], time() + (86400 * 30), "/");
                        echo "<p class='not-1'>Connexion réussie !</p>";
                        $bot = new Bot();
                        $bot->writeConnected();
                    }
                }
            };
        }
        
        function connexion(){
            if(isset($_SESSION['connected'])&&isset($_SESSION['psedo'])){
            }else if(isset($_POST['psedo']) && isset($_POST['password'])) {
                $_SESSION['psedo'] = $_POST['psedo'];
                $_SESSION['password'] = $_POST['password'];
                check_db();
            }else if(isset($_POST['guest'])){
                $_SESSION['psedo'] = "Invité";
                $_SESSION['password'] = "0000";
                check_db();
            }else if(isset($_COOKIE['psedo']) && isset($_COOKIE['password'])){
                $_SESSION['psedo'] = $_COOKIE['psedo'];
                $_SESSION['password'] =$_COOKIE['password'];
                check_db();
            }
        }

        function id_check(){
            if(isset($_SESSION['connected'])&&isset($_SESSION['psedo'])){
                return true;
            }
        }
    
        function deconnexion() {
            setcookie("psedo", " ", time() - (86400 * 30), "/");
            setcookie("password", " ", time() - (86400 * 30), "/");
            session_destroy();
            require './views/deco_redirection.php';
            //login();
        }
    
?>
