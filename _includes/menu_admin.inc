<div class="top-header">
    <ul>
        <li class="menu-toggle-admin nav-element icon only-mobile"><span>Menu</span></li>
        <li><a class="nav-element icon i-homepage icon-only" href="<?php echo $websiteUrl ?>"><span>Accueil site</span></a></li>
        <li><a class="nav-element icon i-homepage-2 icon-only" href="index?content=1"><span>Accueil admin</span></a></li>
        <?php if (isset($_SESSION['auth']) && $_SESSION['type'] == 3): ?>
            <li class="only-tablet"><a class="nav-element icon i-bdd" href="https://r145.websiteservername.com:2083/cpsess9402750720/3rdparty/phpMyAdmin/index.php" target="_blank"></a></li>
        <?php else : ?>
        <?php endif ?>
        <li><a class="nav-element icon i-logout icon-only" href="action-logout"></a></li>
    </ul>
</div>

<ul class="sidebar-menu">
    
    <li class="admin-nav">
        <div class="menu-element icon i-config"><span class="icon new-feature">Configuration</span></div>
        <ul class="sub-nav">
            <li class="sub-nav-item"><a href="?content=2">Config ADMIN – Jonathan</a></li>
            <li class="sub-nav-item"><a href="?content=3">Config générale</a></li>
            <li class="sub-nav-item"><a href="?content=4">Page d'accueil</a></li>
        </ul>
    </li>
    
    <li class="admin-nav">
        <div class="menu-element icon i-image"><span>Images</span></div>
        <ul class="sub-nav">
            <li class="sub-nav-item"><a href="?content=2">Gestion de la librairie</a></li>
            <li class="sub-nav-item"><a href="?content=3">Ajouter des imagesl</a></li>
        </ul>
    </li>
    
    <li class="admin-nav">
        <div class="menu-element icon i-project"><span>Content</span></div>
        <ul class="sub-nav">
            <li class="sub-nav-item"><a href="?content=10">Clients</a></li>
            <li class="sub-nav-item"><a href="?content=20">Projects</a></li>
            <li class="sub-nav-item"><a href="?content=30">Services</a></li>
        </ul>
    </li>
    
</ul>
