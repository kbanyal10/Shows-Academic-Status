<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Academic Records</title>
    <!--This will link this page to the bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
<?php
//This connects with the database
$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395834', 'gc200395834', 'RfOMQChbzO');

//This will select the data from table status
$sql = "SELECT * FROM status";
$cmd = $db->prepare($sql);
$cmd->execute();
//This will fetch all the data from the table
$status = $cmd->fetchAll();
//This will show the table headings
echo '<table class="table table-striped table-hover"><thead><th>Appointment</th><th>Extension</th><th>Attendance</th></thead>';


//This will create a loop and take the values of variables from the table
foreach ($status as $y) {
    echo  '<tr><td>' . $y['appointment'] .
        '</td><td>' . $y['extension'] .
        '</td><td>' . $y['attendance'] .'</td></tr>';

}
//This will close the table
echo '</table>';

//This will disconnect the database
$db = null;

?>
</body>
</html>
