<?php    include("../_includes/session_test.inc");    include("../_includes/chabertdesign.inc");        unset($_GET);        $image = $_POST['image'];    $project = $_POST['project'];        // Delete the record from the database    $stmt2 = $db->prepare("DELETE FROM project_images WHERE image_id = ? and project_id = ? ");    $execute2 = $stmt2->execute([$image, $project]);        if ($execute2) {        $stmt2->closeCursor();        retour_erreur_content(23, 1, 'project', $project);    } else {        retour_erreur_content(23, 2, 'project', $project);    }?>