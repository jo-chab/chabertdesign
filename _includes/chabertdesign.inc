<?php
    
    
    $host = "64.34.75.151";
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
        header('Location: https://www.chabertdesign.com/admin/index.php?content=' . $page . '&m=' . $code_erreur);
        exit;
    }
    function retour_erreur_content($page, $code_erreur, $parameter, $value)
    {
        header('Location: https://www.chabertdesign.com/admin/index.php?content=' . $page . '&m=' . $code_erreur. '&' . $parameter. '=' . $value);
        exit;
    }
    
    
    $websiteUrl = 'https://www.chabertdesign.com/';
    $root = '/';
    

?>