<?php

    class Bot {
        
        public function writeConnected()
        {
            $psedo = $_SESSION['psedo'];
            $botName = "Bot";
            $room = "1";
            $message = $psedo . addslashes(" c'est connecté !");
            $date = date('y-m-d');
            $time = date("H:i");
            require './data_base/connect.php';
            $query = $db->prepare("INSERT INTO `messages`(`psedo`, `message`, `date`, `time`, `id`, `room`) 
            VALUES (
            '".$botName."',
            '".$message."',
            '".$date."',
            '".$time."',
            NULL,
            '".$room."'
            )");
            
            $query->execute();
            // echo "<p class='not-1'>Le bot vous dit bonjour !</p>";
        }
        
    }