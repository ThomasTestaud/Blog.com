<?php

    class Articles {
        
        public function freeSQL($SQL, $not1)
        {
            require './data_base/connect.php';
            $query = $db->prepare($SQL);
            $query->execute();
            echo "<p class='not-1'>$not1</p>";
        }
        
        public function getArticles()
        {
            require './data_base/connect.php';
            $query = $db->prepare('SELECT * FROM `articles`');
            $query->execute();
            $table2 = $query->fetchAll();
            
            if(!empty($table2)){
                if(isset($_GET['editArticle'])){
                    foreach ($table2 as $key => $table2) {
                        echo "<div class='blog-article'>";
                        if($table2['id'] == $_GET['id']){
                            echo
                            '
                            <form method="post"  action="" name="modify-article">
                                <div class="modify-input">
                                    <input type="text" name="modify-title" value="'.$table2['title'].'"/>
                                </div>
                                <div class="modify-input">
                                    <input type="text" name="modify-content" value="'.$table2['content'].'"/>
                                </div>
                                <div class="input-btn-1">
                                    <input type="submit" value="modifier"/>
                                </div>
                            </form>';
                            
                        }
                        else{
                            echo "
                            <h3>".$table2['title']."</h3>
                            <p>".$table2['content']."</p>
                            <a style='color:black;opacity: 0.8;' href='?page=profil&psedo=".$table2['psedo']."'><p style='text-align: right;'><em>-".$table2['psedo']."</p></a>
                            <p style='text-align: right; opacity: 0.5;'>".$table2['time']."</p>
                            <p style='text-align: right; opacity: 0.5;'>".$table2['date']."</em></p>
                            </div>";
                        }
                        
                        
                        
                    }
                }else {
                    foreach ($table2 as $key => $table2) {
                        echo "<div class='blog-article'>";
                        
                        if($_SESSION['psedo'] == $table2['psedo']){
                            echo '<div class="edit-article">
                                    './/<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
                                    '
                                     <a href="?page=accueil&id='.$table2["id"].'&editArticle"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg></a>
                                    <a href="?page=deleteArticle&id='.$table2["id"].'"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg></a>

                                    </div>';
                        }
                        echo
                        "
                        
                        <h3>".$table2['title']."</h3>
                        <p>".$table2['content']."</p>
                        <a style='color:black;opacity: 0.8;' href='?page=profil&psedo=".$table2['psedo']."'><p style='text-align: right;'><em>-".$table2['psedo']."</p></a>
                        <p style='text-align: right; opacity: 0.5;'>".$table2['time']."</p>
                        <p style='text-align: right; opacity: 0.5;'>".$table2['date']."</em></p>
                        </div>";
                    }
                }
            }else{
                echo "Cette liste est vide...";
            };
        }
        
        public function getUserArticles($user)
        {
            require './data_base/connect.php';
    
            $query = $db->prepare('SELECT * FROM `articles` WHERE psedo = "'.$user.'"');
            $query->execute();
            $table2 = $query->fetchAll();
            
            
            if(!empty($table2)){
               
                
                    foreach ($table2 as $key => $table2) {
                        echo "<div class='blog-article'>";
                        
                        if($_SESSION['psedo'] == $table2['psedo']){
                            echo '<div class="edit-article">
                                    './/<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
                                    '
                                     <a href="?page=modifyArticle&id='.$table2["id"].'"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg></a>
                                    <a href="?page=deleteArticle&id='.$table2["id"].'"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg></a>

                                    </div>';
                        }
                        echo
                        "
                        
                        <h3>".$table2['title']."</h3>
                        <p>".$table2['content']."</p>
                        <a style='color:black;opacity: 0.8;' href='?page=profil&psedo=".$table2['psedo']."'><p style='text-align: right;'><em>-".$table2['psedo']."</p></a>
                        <p style='text-align: right; opacity: 0.5;'>".$table2['time']."</p>
                        <p style='text-align: right; opacity: 0.5;'>".$table2['date']."</em></p>
                        </div>";
                    }
                
            }else{
                echo "Cette liste est vide...";
            };
        }

    }
    
    function deleteArticle()
        {
            $blog = new Articles();
            $blog->freeSQL("DELETE FROM `articles` WHERE `articles`.`id` = ".$_GET['id'], "L'article à bien été suprimé");
            accueil();
        }
    
    // function modifyArticle()
    //     {
            if(isset($_POST['modify-article'])){
                require './data_base/connect.php';
                $query = $db->prepare("UPDATE `articles` SET `title` = '?', `content` = '?' WHERE `id` = ".$_GET['id'], "L'article à bien été suprimé");
                $query->execute([
                    $_POST['modify-title'],
                    $_POST['modify-content']
                    ]);
                echo "<p class='not-1'>L'article à bien été modifié</p>";
                
                
            }
        // }
    
