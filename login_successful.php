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
        $n = testare($_REQUEST["username"]);
        $p = testare($_REQUEST["password"]);
        try {
            $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=daily_cycling","root", "");
            $interogare = $cnx->prepare("SELECT * from admin");
            $interogare->execute();
            $gasit = false;
            foreach ($interogare->fetchAll() as $linie) {
                if (($n== $linie['username'])&& ($p== $linie['password'])) {
                    echo "<header class=\"special container\">\n";
                    echo "<span class=\"icon fa-unlock-alt\"></span>\n";
                    echo "<h2>Login Successful</h2>\n";
                    echo "<p>Administrator: ";
                    echo $_POST['username'];
                    echo "</p>";
                    echo "</header>\n";
                    $gasit = true;
                    break;
                }
            }
            if(!$gasit) {
                echo "<header class=\"special container\">\n";
                echo "<span class=\"icon fa-lock\"></span>\n";
                echo "<h2>Login Failed </h2>\n";
                echo "</header>\n";
            }

            $cnx = null;
        }
        catch(PDOException $e) {
            die("Conectare imposibila: " . $e->getMessage());
        }
        ?>

        <!-- One -->
        <section class="wrapper style4 special container 75%">

            <!-- Content -->
            <div class="content">
                <form name="form1" enctype="multipart/form-data" method="post" action="add_another_article.php">
                    <table>
                        <tr>
                            <td>Category:</td>
                            <td>
                                <select name="combo"><option selected value="initial">(Choose category)</option>
                                    <?php
                                    try {
                                        $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=daily_cycling","root", "");
                                        $interogare = $cnx->prepare("SELECT * from category");
                                        $interogare->execute();
                                        foreach ($interogare->fetchAll() as $linie) {
                                            echo "<option value=";
                                            echo "$linie[id_categ]";
                                            echo ">";
                                            echo "$linie[categ]";
                                            echo "</option>\n";
                                        }
                                    }
                                    catch(PDOException $e) {
                                        die("Can't connect!" . $e->getMessage());
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h1>
                                    <br />
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td>Select small img.: </td>
                            <td><input type="file" name="smallimg" /></td>
                        </tr>
                        <tr>
                            <td>
                                <h1>
                                    <br />
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td>Select big img.: </td>
                            <td><input type="file" name="bigimg" /></td>
                        </tr>
                        <tr>
                            <td>
                                <h1>
                                    <br />
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td>Article Title: </td>
                            <td><input type="text" name="title" /></td>
                        </tr>
                        <tr>
                            <td>
                                <h1>
                                    <br />
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td>Full Article : </td>
                            <td><textarea name="fulltext"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <h1>
                                    <br />
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="reset" name="Reset" value="Reset"></td>
                            <td><input type="submit" name="Submit" value="Add Article"></td>
                        </tr>
                    </table>
                </form>
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