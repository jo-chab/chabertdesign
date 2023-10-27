<?php	include("../_includes/session_test.inc");	include("../_includes/chabertdesign.inc");    include("../_includes/_fileUpload.inc"); // Include the file with the handleFileUpload function    require_once '../vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php'; // Include HTML Purifier        unset($_GET);        $element = $_POST['element'];        $client = isset($_POST['ld_client']) ? $_POST['ld_client'] : retour_erreur(20, 7);    $zt_color = isset($_POST['zt_color']) ? $_POST['zt_color'] : retour_erreur(20, 7);    $zt_date = isset($_POST['zt_date']) ? $_POST['zt_date'] : retour_erreur(20, 7);        $zt_title = isset($_POST['zt_title']) ? nl2br(stripslashes($_POST['zt_title'])) : retour_erreur(20, 7);    $zt_slug = isset($_POST['zt_slug']) ? $_POST['zt_slug'] : retour_erreur(20, 7);    $zt_headline = isset($_POST['zt_headline']) ? nl2br(stripslashes($_POST['zt_headline'])) : retour_erreur(20, 7);        $ta_excerpt = nl2br(stripslashes($_POST['ta_excerpt']));        // Get the user-generated HTML content    $textHtml = $_POST['ta_text'];    $goalHtml = $_POST['ta_goal'];        // Create an HTML Purifier configuration    $config = HTMLPurifier_Config::createDefault();    $purifier = new HTMLPurifier($config);        // Clean and sanitize the HTML content    $cleanText = $purifier->purify($textHtml);    $cleanGoal = $purifier->purify($goalHtml);                // Query the database to get the current file paths    $stmt = $db->prepare("SELECT img_thumb FROM projects WHERE id_project = ?");    $stmt->execute([$element]);    $currentFiles = $stmt->fetch();        // Define the valid file extensions    $extensions_valides = array('jpg', 'jpeg', 'png');    $page = '20';    $error_code = '1024';            $destination = $currentFiles['img_thumb']; // Initialize with the current thumb image    if ($_FILES['f_thumb']['size'] > 0) {        // Delete existing thumb image file        if (!empty($currentFiles['img_thumb'])) {            $fileToDelete = $_SERVER['DOCUMENT_ROOT'] . $currentFiles['img_thumb'];            if (file_exists($fileToDelete)) {                unlink($fileToDelete);            }        }                // Handle file upload for new thimb image        $dossier = "/assets/img/_portfolio/";        $destination = handleFileUpload($_FILES['f_thumb'], $dossier, $extensions_valides, $page, $error_code);    }            $stmt2 = $db->prepare('UPDATE projects      SET project_name = ?,          project_date = ?,          project_slug = ?,          project_client = ?,          project_color = ?,          project_slogan = ?,          project_excerpt = ?,          project_description = ?,          project_goal = ?,          img_thumb = ?,          updated_at = ?      WHERE id_project = ?');        $execute = $stmt2->execute([        $zt_title,        $zt_date,        $zt_slug,        $client,        $zt_color,        $zt_headline,        $ta_excerpt,        $cleanText,        $cleanGoal,        $destination,        date('Y-m-d H:i:s'),        $element    ]);    if ($execute) {        $stmt2->closeCursor();        retour_erreur(20,3);    } else {        retour_erreur(20,4);    }?>