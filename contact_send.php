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

        <!-- One -->
        <section class="wrapper style4 special container 75%">

            <!-- Content -->
            <div class="content">
                <?php
                function testare($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $name=testare($_REQUEST["name"]);
                $email=testare($_REQUEST["email"]);
                $subject=testare($_REQUEST["subject"]);
                $message=testare($_REQUEST["message"]);
                try {
                    $cnx = new
                    PDO("mysql:host=localhost;charset=utf8;dbname=daily_cycling","root", "");
                    $interogare = $cnx->prepare("INSERT INTO contact (nr, name,
											email, subject, message)VALUES ('', '$name','$email',
											'$subject', '$message')");
                    $interogare->execute();

                    echo "<h1>Message has been sent.<br /> <strong>Thank You!</strong></h1><br />";
                }
                catch(PDOException $e) {
                    die("Something went wrong! " . $e->getMessage());
                }
                ?>
            </div>

        </section>

    </article>

    <!-- Footer -->
    <footer id="footer">

        <ul class="icons">
            <li><a href="https://www.twitter.com/" target="_blank" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://www.facebook.com/" target="_blank" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://plus.google.com/" target="_blank" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
        </ul>

        <ul class="copyright">
            <li><a href="#" <span>Admin</span> </a> </li><li>Bogdan Cadar</li><li>Proiect</li>
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