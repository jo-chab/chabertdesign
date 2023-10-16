<?php
    
    
    $host = "69.90.66.20";
    $login = "chabe642";
    $pass = "udh!exr6HED3yht8dbg";
    $base = "chabe642_chabertdesign_new";
    global $db;
    
    try {
        $db = new PDO("mysql:host={$host};dbname=$base;charset=utf8", $login, $pass);
    } catch (PDOException $e) {
        echo 'Error connecting to the Database';
    }
    
    function retour_erreur($page, $code_erreur)
    {
        header('Location: https://staging.chabertdesign.com/admin/index.php?content=' . $page . '&m=' . $code_erreur);
        exit;
    }
    
    
    $websiteUrl = 'https://staging.chabertdesign.com/';
    $root = '/';
    

?>