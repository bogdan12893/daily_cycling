<!DOCTYPE HTML>
<html>
<head>
    <title>Bicycle Types</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
</head>
<body class="left-sidebar">
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <h1 id="logo"><a href="index.html">Daily <span>Cycling</span></a></h1>
        <nav id="nav">
            <ul>
                <li class="current"><a href="index.html">Welcome</a></li>
                <li class="submenu">
                    <a href="#">Menu</a>
                    <ul>
                        <li><a href="bicycle_types.html">Bicycle Types</a></li>
                        <li><a href="tricks_tips.php">Tricks & Tips</a></li>
                        <li><a href="no-sidebar.html">Where to Ride</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <article id="main">
        <header class="special container">
            <span class="icon fa-book"></span>
            <h2><strong>Tricks & Tips</strong></h2>
            <p>Ride better, get stronger, be happier, go faster, look nicer,<br /> stay safer, get fitter, smile wider, and lots more.</p>
        </header>
        <section class="wrapper style4 container special">
            <div class="row">
                <div class="4u 12u(narrower)">
        <?php
        try {
            $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=daily_cycling","root", "");
            $interogare = $cnx->prepare("SELECT * from articles WHERE id_item_categ=1");
            $interogare->execute();
            foreach ($interogare->fetchAll() as $linie) {
                $img = $linie["small_img"];
                $id = $linie["id_art"];
                $tit = $linie["title_art"];
                $fulltxt = $linie["txt_art"];
                echo '              <a href="element.php?idart='.$id.' "class=\"image featured\"><img src="images/'.$img.'" alt=""/></a>';
                echo "                    <section>\n";
                echo "                        <header>\n";
                echo "                            <h3>$tit</h3>\n";
                echo "                        </header>\n";
                echo "                        <p>$fulltxt</p>\n";
                /*echo "                        <footer>\n";
                echo "                            <ul class=\"buttons\">\n";
                echo "                                <li><a href=\"element.php\" class=\"button small\">Full Article</a></li>\n";
                echo "                            </ul>\n";
                echo "                        </footer>\n";*/
                echo "                    </section>\n";
            }
        }
        catch(PDOException $e) {
            die("Conectare imposibila: " . $e->getMessage());
        }
        ?>
               </div>
            </div>
        </section>

        <!-- Footer -->
        <footer id="footer">

            <ul class="icons">
                <li><a href="https://www.twitter.com/" target="_blank" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="https://www.facebook.com/" target="_blank" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="https://plus.google.com/" target="_blank" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
            </ul>

            <ul class="copyright">
                <li><a href="login.html" <span>Admin</span> </a> </li><li>Bogdan Cadar</li><li>Proiect</li>
            </ul>

        </footer>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollgress.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>