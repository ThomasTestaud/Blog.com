<?php

    class Messages {
        
        public function getMessagesFromRoom($room)
        {
            require './data_base/connect.php';
            $query = $db->prepare('SELECT * FROM `messages` WHERE room = '.$room.'');
            $query->execute();
            $item = $query->fetchAll();
              
            if(!empty($item)){ 
            foreach ($item as $key => $items) {
                
                if($items['psedo']===$_SESSION['psedo']){
                    echo 
                    '<div class="message-me">'
                    .$items['message']
                    .'<div class="time">'
                        .$items['time']
                        .'</div>'
                    .'</div>'
                    ;
                }elseif($items['psedo']==='Bot'){
                    echo 
                    '<div class="message-you bot">
                    <div class="psedo">'
                        .$items['psedo']
                        .'</div><div class="content">'
                    .$items['message']
                    .'</div><div class="time">'
                        .$items['time']
                        .'</div>'
                    .'</div>'
                    ;
                }else{
                    echo 
                    '<div class="message-you">
                        <div class="psedo"><a href="?page=profil&psedo='.$items['psedo'].'">'
                        .$items['psedo']
                        .'</a></div><div class="content">'
                        .$items['message']
                        .'</div><div class="time">'
                        .$items['time']
                        .'</div>'
                    .'</div>'
                    ;
                }
            }}else{
                echo "Écrivez votre premier message !";
            };
        }
        
        public function writeMessageToRoom($room)
        {
            
            $message = addslashes($_POST['chatMessage']);
            $psedo = $_SESSION['psedo'];
            $date = date('y-m-d');
            $time = date("H:i");
            require './data_base/connect.php';
            $query = $db->prepare("INSERT INTO `messages`(`psedo`, `message`, `date`, `time`, `id`, `room`) 
            VALUES (
            '".$psedo."',
            '".$message."',
            '".$date."',
            '".$time."',
            NULL,
            '".$room."'
            )");
            
            $query->execute();
            echo "<p class='not-1'>Le message à bien été envoyé</p>";
        }
        
        public function createNewRoom($room)
        {
            
            $message = addslashes($_POST['chatMessage']);
            $psedo = $_SESSION['psedo'];
            $date = date('y-m-d');
            $time = date("H:i");
            require './data_base/connect.php';
            $query = $db->prepare("INSERT INTO `messages`(`psedo`, `message`, `date`, `time`, `id`, `room`) 
            VALUES (
            '".$psedo."',
            '".$message."',
            '".$date."',
            '".$time."',
            NULL,
            '".$room."'
            )");
            
            $query->execute();
            echo "<p class='not-1'>Le message à bien été envoyé</p>";
        }
    }
    
