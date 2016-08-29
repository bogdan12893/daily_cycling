<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Contact - Twenty by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
</head>
<body class="contact">
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
        <?php
        function testare($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if (testare($_FILES["smallimg"]["error"]) > 0)
        {
            echo "Error: " . $_FILES["smallimg"]["error"] . "<br />";
            exit;
        }

        if (testare($_FILES["bigimg"]["error"]) > 0)
        {
            echo "Error: " . $_FILES["bigimg"]["error"] . "<br />";
            exit;
        }

        $numeimagine = testare($_FILES["smallimg"]["name"]);
        $poz = strrpos($numeimagine, ".");
        $extensie = substr ($numeimagine, $poz);
        $nmtmp = $_FILES["smallimg"]["tmp_name"];

        $numeimaginemare = testare($_FILES["bigimg"]["name"]);
        $pozm = strrpos($numeimaginemare, ".");
        $extensiem = substr ($numeimaginemare, $pozm);
        $nmtmpm = $_FILES["bigimg"]["tmp_name"];

        $categ = testare($_REQUEST["combo"]);
        $title = testare($_REQUEST["title"]);
        $fullart = testare($_REQUEST["fulltext"]);

        try {
            $cnx = new
            PDO("mysql:host=localhost;charset=utf8;dbname=daily_cycling", "root", "");
            $interogare = $cnx->prepare("INSERT INTO articles (id_art,
	small_img, big_img, id_item_categ, title_art, txt_art) VALUES
	('','$numeimagine', '$numeimaginemare', $categ,
	'$title','$fullart')");

            $interogare->execute();

            // Preiau ID-ul pozei introduse in baza si construiesc un nou nume
            $id = $cnx->lastInsertId();
            $numeimaginenou = "image".$id.$extensie;
            $numeimaginemarenou = "image".$id."BIG".$extensie;
            $interogare2 = $cnx->prepare("UPDATE articles SET
			small_img='$numeimaginenou' WHERE id_art = $id");
            $interogare2->execute();

            // Construiesc calea pe care sa incarc fisierul
            $cale = "images/$numeimaginenou";
            $rezultat2 = move_uploaded_file($nmtmp, $cale);

            if (!$rezultat2)
            {
                echo "Error while uploading file";
                exit;
            }

            $interogare3 = $cnx->prepare("UPDATE articles SET
	big_img='$numeimaginemarenou' WHERE id_art = $id");
            $interogare3->execute();

            $calem = "images/$numeimaginemarenou";
            $rezultat3 = move_uploaded_file($nmtmpm, $calem);

            if (!$rezultat3)
            {
                echo "Error while uploading file";
                exit;
            }
            echo "<header class=\"special container\">\n";
            echo "<span class=\"icon fa-paper-plane-o\"></span>\n";
            echo "<h2>Upload complete...</h2>\n";
            echo "</header>\n";
            echo "<section class=\"wrapper style1 special container 50%\">\n";
            echo "<div class=\"content\">\n";
            echo "<form name=\"form1\" method=\"post\" action=\"login.html\">\n";
            echo "<div class=\"row\">\n";
            echo "<div class=\"12u\">\n";
            echo "<ul class=\"buttons\">\n";
            echo "<li><input type=\"submit\" class=\"special\" value=\"Whrite another one...\" /></li>\n";
            echo "</ul>\n";
            echo "</div>\n";
            echo "</div>\n";
            echo "</form>\n";
            echo "</div>\n";
            echo "</section>\n";
        }
        catch(PDOException $e) {
            die("can't connect: " . $e->getMessage());
        }
        ?>

    </article>

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