<?php        include("../_includes/session_test.inc");        if (isset($_SESSION['auth']) && ($_SESSION['type'] <= 2)) {        header('Location: https://staging.chabertdesign.com/?m=10');        exit();    } elseif (!isset($_SESSION['auth'])) {        header('Location: https://staging.chabertdesign.com/admin/login');        exit();    }        $page = $_GET['content'];        include("../_includes/chabertdesign.inc");?><!doctype html><html lang="en"><?    include("../_includes/head_admin.inc");?><!-- START OF THE HEADER --><header></header><!-- END OF THE HEADER -->        <section class="dashboard">                <aside class="sidebar">                        <?php include("../_includes/menu_admin.inc"); ?>                </aside>                <article class="dashboard-container">                        <?php                include("../_includes/alert_messages_admin.inc");                include("../_includes/pages_admin.inc");            ?>                        <div class="footer-dashboard">                <a class="btn-primary btn-back" href="javascript:history.go(-1)">Retour</a>            </div>                        <script>                function confirmDelete() {                    return confirm("Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible !");                }                const inputs = document.querySelectorAll(".prefilled");                function handleClick(event) {                    event.target.classList.remove("prefilled");                }                inputs.forEach((input) => {                    input.addEventListener("click", handleClick);                });                $(document).ready(function () {                    $('.btn-update, .btn-disable, .btn-activate, .btn-validate, .btn-confirm').click(function () {                        $(this).closest('form').submit();                    });                    $('.btn-delete').click(function () {                        if (confirmDelete()) {                            $(this).closest('form').submit();                        }                    });                    $('.btn-revert').click(function () {                        $(this).closest('form')[0].reset();                    });                });                        </script>                </article>        </section><footer style="padding: 2rem;"></footer><script type="text/javascript" src="/assets/js/admin.js"></script></body></html>