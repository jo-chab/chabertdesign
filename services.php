<?    include("_includes/session_test.inc");    include("_includes/chabertdesign.inc");        $page_FR = 'https://www.chabertdesign.com/FR/expertise.php';?>    <!doctype html>    <html lang="en"><head>        <title>Our Services - Chabert Design</title>        <?        include("_includes/head.inc");        include("_includes/header.inc");    ?>            <section class="w-hero w-hero-services">                <article class="wrapper text-content-only">            <div class="hero-container">                <h1>Building brand experience that consumers can connect with and drives growth.</h1>                <h3>We offer the planning and strategic capabilities found in large agencies, while embracing the highly creative, dynamic and responsive approach of a small agency.</h3>            </div>        </article>        </section>            <!-- SERVICES SECTION -->    <section>                <article class="wrapper wrapper-text">                        <p class="text-center">In today's landscape, sports brands are no longer solely in the ownership of their creators; they are now shaped by their audiences. Our mission is to craft sports brands that your audience will proudly engage with. We offer straightforward solutions to intricate challenges by formulating global and socially-conscious brand strategies. We unite devoted individuals around iconic symbols. Our expertise lies in connecting the past and the future, as we understand                the ever-evolving sports arena. We excel in crafting the most impactful sports design experiences.</p>                </article>                <article class=" services-main">                        <?php                                $stmt = $db->prepare('SELECT * from services order by id ASC');                $stmt->execute();                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);                                foreach ($results as $result) {                    $title = $result['name'];                    $text = nl2br(stripslashes($result['description']));                    $text = str_replace("<br />", "", $text);                    $image = $result['image'];                                        echo "            <div class='services-container'>								<div class='services-img' style='background-image: url($image);'>				</div>							<div class='services-infos'>					<h2>$title</h2>					$text				</div>							</div>                    ";                }                        ?>                </article>        </section>    <!-- SERVICES SECTION -->            <section class="strate">                <article class="wrapper">                        <h6>Next</h6>            <h2>Case Studies</h2>            <a class="tertiary-button icon i-long-arrow" href="projects.php">                Explore            </a>                </article>        </section><?    include("_includes/footer.inc");?>