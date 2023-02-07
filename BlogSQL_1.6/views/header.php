    <header>
        <div class="flex center">
            <a href="?page=accueil" style="text-decoration:none;color:white;"><h1>Blog.com</h1></a>
        </div>
        <div style="display: flex;align-items: center;">
            <?php 
                if(isset($_SESSION['psedo'])){
                    require './views/nav.php';
                }
            ?>
        </div>
    </header>