<?php    include("../_includes/session_test.inc");    include("../_includes/chabertdesign.inc");        if (isset($_POST['element']) && isset($_POST['checked'])) {        $element = $_POST['element'];        $checked = $_POST['checked'];                $stmt2 = $db->prepare('UPDATE projects SET is_star = ? WHERE id_project = ?');        if ($stmt2->execute([$checked, $element])) {            retour_erreur(20, 16);        } else {            retour_erreur(20, 17);        }    } else {        retour_erreur(20, 17);    }?>