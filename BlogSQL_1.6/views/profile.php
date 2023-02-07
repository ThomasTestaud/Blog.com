<div class="middle-column">
<div class="profile-page">
    <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
    
    <?php
    if(isset($_POST['description'])){
        profilModify();
        require './data_base/connect.php';
        
        $query = $db->prepare('SELECT * FROM `users` WHERE psedo = "'.$_GET['psedo'].'"');
        $query->execute();
        $users = $query->fetchAll();
        foreach ($users as $key => $users) {
        echo "<p><strong>Psedo : </strong>" . 
        $users['psedo'] . 
        "</p><p><strong>Date de création : </strong>" . 
        $users['creation_date'] . 
        '</p>
        <div class="edit-article profile-article">
        <a href="?page=profil&psedo='.$_SESSION["psedo"].'&edit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg></div>
        </a>
        <p><strong>Description du profil : </strong><br>
        ' . 
        $users['description'] . 
        "</p>";
    }} else
    if(isset($_GET['edit'])){
        foreach ($users as $key => $users) {
        echo "<p><strong>Psedo : </strong>" . 
        $users['psedo'] . 
        "</p><p><strong>Date de création : </strong>" . 
        $users['creation_date'] . 
        '</p>
        <p><strong>Description du profil : </strong><br>
        </p>
        <form method="post"  action="" name="">
            <div class="modify-input">
                <input type="text" name="description" value="'.$users['description'].'"/>
            </div>
            <div class="input-btn-1">
                <input type="submit" value="modifier"/>
            </div>
        </form>
        ';
        }
    }else{
        foreach ($users as $key => $users) {
        echo "<p><strong>Psedo : </strong>" . 
        $users['psedo'] . 
        "</p><p><strong>Date de création : </strong>" . 
        $users['creation_date'] . 
        '</p>
        ';if($_SESSION["psedo"] === $users['psedo']){
            echo'
            <div class="edit-article  profile-article">
            <a href="?page=profil&psedo='.$_SESSION["psedo"].'&edit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg></a></div>
            ';
        }
        echo '
        <p><strong>Description du profil : </strong><br>
        ' . 
        $users['description'] . 
        "</p>";
        }
    }
    ?>
    
    <div class="container">
    
    <?php
        $blog = new Articles();
        $blog->getUserArticles($_GET['psedo']);
    ?>
    
    
    </div>

</div></div>