    <?php
    function accueil(){
    if(id_check()){
    ?>
    <div class="accueil">
        <div class="left-column">
            <?php require 'views/profile_card.php'; ?>
            <?php require 'views/chat_room.php'; ?>
        </div>
        <div class="border">
        </div>
            <div class="middle-column">
            <?php require 'views/form.php'; ?>
            <?php require 'views/article.php';?>
            </div>
        <div class="right-column">
            <?php require 'views/friends_list.php'; ?>
        </div>
    </div>
    <?php
    
    }else{
        login();
    }}

    ?>


