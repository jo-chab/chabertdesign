<div class="dashboard-main">
    <div class="dashboard-title">Gestion des clients</div>
    
    <div class="dashboard-content">
        
        <div class="btn-primary btn-add small icon i-more mobile-icon-only js-content-add"><span>Ajouter un client</span></div>
        
        <div class="content-add">
            <form method="post" action="action_client_add" enctype="multipart/form-data">
                <div class="d-form-wrapper">
                    
                    <div class="grid-layout-2">
                        <div class="form-row column">
                            <label>Nom du client</label>
                            <input id="zt_name" name="zt_name" type="text" value="" maxlength="" required />
                        </div>
                        
<!--                        <div class="form-row column">-->
<!--                            <label>Lien du site internet</label>-->
<!--                            <input id="zt_site" name="zt_site" type="text" value="">-->
<!--                        </div>-->
                    </div>
                    
                    <div class="grid-layout-2">
                        <div class="form-row column">
                            <label>Télécharger le fichier du logo</label>
                            <ul class="file-list">
                                <li class="file-list-element">
                                    <div class="dashboard-file-box">
                                        <input type="file" name="f_logo" id="f_logo" class="inputfile"/>
                                        <label for="f_logo" class="upload-file-btn"><span>Télécharger le logo</span></label>
                                    </div>
                                    <script src="/assets/js/custom-file-input.js"></script>
                                </li>
                            </ul>
                        </div>
                        <div class="form-row column">
                            <label>Télécharger le fichier du logo blanc</label>
                            <ul class="file-list">
                                <li class="file-list-element">
                                    <div class="dashboard-file-box">
                                        <input type="file" name="f_logo_white" id="f_logo_white" class="inputfile"/>
                                        <label for="f_logo_white" class="upload-file-btn"><span>Télécharger le logo blanc</span></label>
                                    </div>
                                    <script src="/assets/js/custom-file-input.js"></script>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <h6>Attention les dimensions de l'image ne devraient pas dépasser 2400x1600 px pour éviter de ralentir
                        le site !</h6>
                    <h6>Pensez également à réduire a taille de votre fichier pour améliorer les performances de votre site,
                        ou utiliser un fichier .SVG.</h6>
                
                </div>
                
                <div class="d-form-cta">
                    <div class="btn-primary btn-revert icon mobile-icon-only"><span>Effacer</span></div>
                    <div class="btn-primary btn-confirm icon mobile-icon-only"><span>Valider</span></div>
                </div>
            </form>
        </div>
        
        <ul class="dashboard-list">
            <?php
                
                $sql1 = $db->prepare('select * from clients order by id_client DESC');
                $sql1->execute();
                
                $cpt1 = 0;
                $results = $sql1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($results as $result) {
                    $client = $result['id_client'];
                    $name = nl2br(stripslashes($result['client_name']));
                    $logo = $result['client_logo'];
                    $cpt1++;
                    
                    echo "<li class='dashboard-list-elements'>
                                    <div class='element-title content-id'>
                                        <span class='logo-mini'><img src='$logo' /></span> $name
                                    </div>
                                    <div class='list-cta content-btn'>
                                        <form action='index?content=11' method='post'>
                                            <input type='hidden' name='element' value='$client'>
                                            <div class='btn-primary btn-update small icon mobile-icon-only'><span>Modifier</span></div>
                                        </form>
                                    </div>	
                                </li>";
                }
            ?>
        </ul>
    
    </div>
</div>