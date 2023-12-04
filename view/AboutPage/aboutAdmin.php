<?php


include_once('../../controller/AboutPage/aboutAdminController.php');

?>


<!DOCTYPE html>
<html>

<head>
    <title>About (admin)</title>
    <link rel="stylesheet" href="../../assets/CSS/Common/style.css">
</head>

<body>
    <header style="width: 100%;height: 100px; background: #f0f0f0; display: flex; align-items: center; justify-content: space-between; border-bottom: solid black 3px; margin-bottom: 50px;">

        <a href="../Auth/homePage.php"> <img src="../../assets/images/logo.png" alt="marz" style="width: 100px; height: 100px; object-fit: contain;" /></a>
        <div>links</div>


    </header>
    <main>
        <center>

            <h1>About Us</h1>
            <p id="about"></p>

            <form method="POST" action="" enctype="" id="form">
                <h4>Edit to update about page</h4>
                <textarea id="newAbout" name=" about" rows="20" name="about" value="<?= $about ?>"></textarea><br>
                <p id="error" class="error"></p>
                <input type="submit" name="submit" value="submit" />
            </form>
        </center>
    </main>
    <footer style="width: 100%; height:200px; background: #f0f0f0; margin-top: 50px;">
        <hr>

    </footer>
    <script src="../../assets/JS/AboutPage/about.js"></script>
    <script type="text/javascript" src="../../assets/JS/AboutPage/adminAbout.js"></script>
</body>

</html>