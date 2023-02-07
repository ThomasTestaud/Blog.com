<?php

    try {
        $db = new PDO('mysql:host=db.3wa.io;dbname=thomastestaud_blog', 'thomastestaud', 'c23e2220a763a675189ecf8ba3b047fa');
        // echo "connect";
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

?>