<?php	include("../_includes/session_test.inc");	include("../_includes/chabertdesign.inc");                if (isset($_FILES['images']['name']) && !empty($_FILES['images']['name'][0])) {        $imageFiles = $_FILES['images'];                // Define the valid file extensions        $extensions_valides = array('jpg', 'jpeg', 'png');        $dossier = "/assets/img/_portfolio/";                foreach ($imageFiles['name'] as $key => $imgName) {            $imgTempPath = $imageFiles['tmp_name'][$key];                        // Handle file upload for each image            $destination = handleImgProjectUpload($_FILES['images'], $dossier, $extensions_valides, 2, 1001, $key);                        $stmt = $db->prepare("INSERT INTO images (url) VALUES (?)");            $stmt->execute([$destination]);        }                $stmt->closeCursor();        retour_erreur(2,1001);    } else {        retour_erreur(2,1002);    }                // Function to handle file upload and return the destination path    function handleImgProjectUpload($file, $uploadDir, $validExtensions, $page, $code, $key) {        $taillemaxi = 2097152;        $largeurmaxi = 2401;        $hauteurmaxi = 1601;                $nomoriginel = $file['name'][$key];        $taillefichier = $file['size'][$key];        $adresseserveur = $file['tmp_name'][$key];        $erreurupload = $file['error'][$key];                if ($erreurupload == 4) {            $fichier = "_placeholder.jpg";            $destination = $uploadDir . $fichier;        } else {            if ($erreurupload > 0) retour_erreur($page, 1002);            if ($taillefichier > $taillemaxi) retour_erreur($page, 1010);                        $extension_upload = strtolower(substr(strrchr($nomoriginel, '.'), 1));            if (!in_array($extension_upload, $validExtensions)) retour_erreur($page, $code);                        $image_sizes = getimagesize($adresseserveur);            if ($image_sizes[0] > $largeurmaxi || $image_sizes[1] > $hauteurmaxi) retour_erreur($page, 1011);                        $fichier = basename($nomoriginel);            $fichier = strtr($fichier,                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);            $destination = $uploadDir . $fichier;            $destination2 = "../" . $destination;            if (move_uploaded_file($adresseserveur, $destination2)) {                $ok = "upload réussie";            } else {                retour_erreur($page, 1003);            }        }                return $destination;    }?>