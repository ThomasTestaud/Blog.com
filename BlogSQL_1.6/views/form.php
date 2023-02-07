
<div class="form-new-article">
<form method="post"  action="" name="new_article">
        <legend>Créer un nouvel article</legend>
        <input type="text" name="art-title" placeholder="Titre de l'article" minlength="3"/>
        <input type="" name="art-content" placeholder="Texte de l'article. Exprimez-vous ici..." minlength="5"/>
        <input type="submit" value="Créer"/>
</form>
</div>

</footer>

<?php

require './controllers/write_article.php';

?>