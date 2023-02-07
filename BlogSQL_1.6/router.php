    <?php
    
    require './Models/Articles.php';
    require './Models/Messages.php';
    require './Models/Bot.php';
    require './controllers/ConnexionController.php';
    require './controllers/RegisterController.php';
    require './controllers/login.php';
    require './controllers/accueil.php';
    require './controllers/ProfilController.php';
    require './controllers/chat_room.php';
    connexion();

    function router(){
            if(isset($_SESSION['connected'])){
                if(isset($_GET['page'])&& !empty($_GET['page'])){
                    call_user_func($_GET['page']);
                }else{
                    accueil();
                }
            }else{
              if(isset($_GET['page'])&& !empty($_GET['page'])){
                    call_user_func($_GET['page']);
                }else{
                  login();
                }
            }
    }
    ?>
