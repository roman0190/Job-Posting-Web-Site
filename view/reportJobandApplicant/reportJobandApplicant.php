<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARZ JOB SITE - Your Job Search Partner</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/reportJobandApplicant/reportJobandApplicant.css">
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
                <h2>Reported Jobs and Applicants</h2>

                <?php
                // include('../../model/db.php');
                include('../../controller/reportJobandApplicantcheck/reportJobandApplicantcheck.php');

                $reportedJobs = getReportedJobs();

                echo "<h3>Reported Jobs</h3>";
                foreach ($reportedJobs as $job) {
                    echo "Job ID: " . $job['job_id'] . " | Reported By: " . $job['reported_by']. "<br>";
                }
                ?>
                 <div id="job"></div>
                <a href="../manageJobandApplicant/manageReportedjob.php" onclick="Jobs()">Manage Reported Jobs</a><br>

                <?php
                $reportedApplicants = getReportedApplicants();

                echo "<br><h3>Reported Applicants</h3>";
                foreach ($reportedApplicants as $applicant) {
                    echo "Applicant ID: " . $applicant['applicant_id'] . " | Reported By: " . $applicant['reported_by'] . "<br>";
                }
                ?>
                <div id="applicant"></div>

                <a href="../manageJobandApplicant/manageReportedapplicant.php" onclick="Applicants()">Manage Reported Applicants</a>
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
    <script src="../../assets/JS/report&manage/reeport&manage.js">  </script>
</body>
</html>
