<?php

require_once("../../controller/Auth/session.php");
include_once("../../model/adminHomemodel.php");

$userInfo = [];
 
if (isset($_COOKIE['userInfo'])) {
    $userInfo = (array) json_decode($_COOKIE['userInfo']);
} else {
    if (isset($_SESSION['userInfo'])) {
        $userInfo = (array)  json_decode($_SESSION['userInfo']);
    } else {
       
    }
}
$Name =  $userInfo['name'];      



?>
  
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARZ JOB SITE - Your Job Search Partner</title>
    <link rel="stylesheet" href="../../assets/CSS/LandingPage/adminHome.css">

   
</head>
<body>
    <table width="100%" border="1" cellspacing="0" cellpadding="20">
        <tr>
                <th colspan="2">
                    <h2 align="center">
                    <img align="left" src="../../assets/images/logo.png" alt="Company Logo" width="80" height="80">
                        MARZ JOB SITE
                    </h2>
                    <h5 align="right">
                   
                        <a href="../dashboard/commonDashboard.php">Dashboard</a> 
                       
                    
                    </h5>
                </th>
        </tr>

        <tr>
            <td>
           
                
                <header align="center">
                <h1>Welcome, <?php echo $Name; ?>!</h1>
                </header>
    
               
                <section>
                    <h2>Description</h2>
                    <p id="details"></p>
                    <?php
                    
                    ?>
        
                    <form action="" method="post">
                        <label for="newDescription">Update Description:</label>
                        <textarea id="newDescription" name="newDescription" rows="10" cols="150"></textarea>
                        <br>
                        <input type="button" value="Save" onclick="updatedescription()" />
                        
                    </form>
                </section>
            </td>
        </tr>
       
        <tr>
            <td>
                <footer align="center">
                    <p>&copy; 2023 MARZ JOB SITE. All rights reserved.</p>
                </footer>
            </td>
        </tr>
    </table>
    <script src="../../assets/JS/LandingPage/home.js">  </script>
    
</body>
</html>
