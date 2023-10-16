<div class="dashboard-main">
    <div class="dashboard-title">Gestion des projets</div>
    
    <div class="dashboard-content">
        
        <a class="btn-primary btn-add small icon i-more mobile-icon-only js-content-add" href="?content=21"><span>Ajouter un projet</span></a>
        
        <ul class="dashboard-list">
            <?php
                
                $sql1 = $db->prepare('select * from projects, clients where project_client = id_client order by project_date DESC');
                $sql1->execute();
                
                $cpt1 = 0;
                $results = $sql1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($results as $result) {
                    $project = $result['id_project'];
                    $name = nl2br(stripslashes($result['client_name']));
                    $title = $result['project_name'];
                    $cpt1++;
                    
                    echo "<li class='dashboard-list-elements'>
                                    <div class='element-title content-id'><span>$name</span> – $title</div>
                                    <div class='list-cta content-btn'>
                                        <form action='index?content=22' method='post'>
                                            <input type='hidden' name='element' value='$project'>
                                            <div class='btn-primary btn-update small icon mobile-icon-only'><span>Modifier</span></div>
                                        </form>
                                    </div>	
                                </li>";
                }
            ?>
        </ul>
    
    </div>
</div>