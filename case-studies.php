<?	include("_includes/session_test.inc");	include("_includes/chabertdesign.inc");		$page_FR = 'https://www.chabertdesin.com/FR/etude-de-cas.php?project=';            $element = $_GET['project'];    unset($_POST);        $stmt = $db->prepare("select * from projects where id_project = ? ");    $stmt->execute([$element]);        while ($curseur1 = $stmt->fetch()) {        extract($curseur1);                $update = date('Y-m-d',strtotime($updated_at));                $client = $project_client;        $date = $project_date;        $color = $project_color;        $img = $img_thumb;                $title = nl2br(stripslashes($project_name));        $slug = $project_slug;        $headline = nl2br(stripslashes($project_slogan));                $excerpt = nl2br(stripslashes($project_excerpt));        $excerpt = str_replace("<br />", "", $excerpt);        $desc = nl2br(stripslashes($project_description));        $desc = str_replace("<br />", "", $desc);        $goal = nl2br(stripslashes($project_goal));        $goal = str_replace("<br />", "", $goal);            }        // Fetch all images associated with the project    $stmt2 = $db->prepare('SELECT url, id_image, image_place FROM images, project_images WHERE id_image = image_id AND project_id = ? ORDER BY image_place ASC');    $stmt2->execute([$element]);        $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);        // Initialize arrays to store images for the main and secondary galleries    $mainGalleryImages = array();    $secondaryGalleryImages = array();        foreach ($results2 as $result2) {        $id_image = $result2['id_image'];        $img = urldecode($result2['url']);        $image_place = $result2['image_place'];                if ($image_place <= 2) {            // Images with image_place values 0, 1, and 2 go to the main gallery            $mainGalleryImages[] = "<img src='$img' width='' height='' alt='' />";        } else {            // Images with other image_place values go to the secondary gallery            $secondaryGalleryImages[] = "<img src='$img' width='' height='' alt='' />";        }    }?><!doctype html><html lang="en"><head><title>Project – Chabert Design</title><?	include("_includes/head.inc");	include("_includes/header.inc");?>			<section class='w-hero w-hero-case-study' style="background-color: <?php echo $project_color ?>;">			<article class="wrapper text-content-only">			<div class="hero-container">				<h1 class="case-study-title"><?php echo $headline ?></h1>				<h3 class="case-study-client">CS St-Laurent</h3>                <h4 class="case-study-services">Brand</h4>                <i class="fak fa-long-arrow"></i>			</div>		</article>		</section>		<!-- Brief du projet -->	<section>			<article class="wrapper wrapper-text case-study-brief">            <h2 class="case-study-excerpt"><?php echo $excerpt ?></h2>            <?php echo $desc ?>		</article>			</section>		<section class="case-study-gallery gallery-main">				<article class="wrapper-full">            <?php                foreach ($mainGalleryImages as $image) {                    echo $image;                }            ?>		</article>			</section>    <!-- Brief du projet -->    <section class="content-optional">        <article class="wrapper wrapper-text case-study-brief">            <?php echo $goal ?>        </article>    </section>    <section class="case-study-gallery gallery-secondary">		 		 <article class="wrapper">             <?php                 foreach ($secondaryGalleryImages as $image) {                     echo $image;                 }             ?>         </article>        </section>		<?	include("_includes/footer.inc");?>