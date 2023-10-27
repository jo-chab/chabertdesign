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
                    
                    // Assign values based on database data
                    $alert1 = $result['is_actif'];
                    $alert2 = $result['is_star'];
                    
                    // Initialize checked values based on $alert1 and $alert2
                    $checked1 = $alert1 == 1 ? 'checked' : '';
                    $checked2 = $alert2 == 1 ? 'checked' : '';
                    $cpt1++;
                    
                    echo "<li class='dashboard-list-elements'>
                                    <div class='element-title content-id'><span>$name</span> – $title</div>
                                    <div class='list-cta content-btn'>
                                        <div class='star-status'>
                                            <input type='hidden' name='element' value='$project'>
                                            <label class='star-container'>
                                                <input type='checkbox' class='star-checkbox' name='switch_star' $checked2 />
                                                <span class='switch-star icon'></span>
                                            </label>
                                        </div>
                                        <div class='switch-status'>
                                            <input type='hidden' name='element' value='$project'>
                                            <label class='switch-container'>
                                                <input type='checkbox' class='switch-checkbox' name='switch_alert_1' $checked1 />
                                                <span class='switch-knob'></span>
                                            </label>
                                        </div>
                                        <a class='btn-secondary small icon i-image mobile-icon-only' href='?content=23&project=$project'><span>Images</span></a>
                                        <form action='index?content=22&project=$project' method='post'>
                                            <div class='btn-primary btn-update small icon mobile-icon-only'><span>Modifier</span></div>
                                        </form>
                                    </div>	
                                </li>";
                }
            ?>
        </ul>
    
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const switchElements = document.querySelectorAll('.switch-checkbox');

        switchElements.forEach((switchElement) => {
            switchElement.addEventListener('change', function () {
                const element = this.closest('.switch-status').querySelector('[name="element"]').value;
                const checked = this.checked ? 1 : 0;

                // Make an AJAX request to update the project status
                updateProjectStatus(element, checked);
            });
        });

        function updateProjectStatus(element, checked) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'action_project_disable.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response if needed
                }
            };
            xhr.send(`element=${element}&checked=${checked}`);
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const starElements = document.querySelectorAll('.star-checkbox');

        starElements.forEach((starElement) => {
            starElement.addEventListener('change', function () {
                const element = this.closest('.star-status').querySelector('[name="element"]').value;
                const checked = this.checked ? 1 : 0;

                // Make an AJAX request to update the project's star status
                updateProjectStar(element, checked);
            });
        });

        function updateProjectStar(element, checked) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'action_project_star.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response if needed
                }
            };
            xhr.send(`element=${element}&checked=${checked}`);
        }
    });
</script>
