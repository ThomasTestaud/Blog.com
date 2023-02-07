    
    <div class="friends-list">
        <?php
        
        
        
        
        require './data_base/connect.php';
        
        $query = $db->prepare('SELECT psedo FROM `users`');
        $query->execute();
        $users = $query->fetchAll();
        
    foreach ($users as $key => $users) {
    echo "<a href='?page=profil&psedo=". $users['psedo'] ."' ><div class='firend-card'<p>" . $users['psedo'] . "</p></div></a>";
    }
    ?>
    </div>