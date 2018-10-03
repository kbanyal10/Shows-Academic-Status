<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Academic Records</title>
    <!--This will link this page to the bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<?php
//This connects with the database
$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395834', 'gc200395834', 'RfOMQChbzO');
//This will select the data from table academic
$sql = "SELECT * FROM academic";

$cmd = $db->prepare($sql);
$cmd->execute();
//This will fetch all the data from the table
$academic = $cmd->fetchAll();

//This will show the table headings
echo '<table  class="table table-striped table-hover "><thead><th>Course Name</th><th>Student Number</th><th>Name</th><th>Work</th><th>Grade</th></thead>';
//This will create a loop and take the values of variables from the table
foreach ($academic as $r) {
    echo '<tr><td>' . $r['courseName'] .
        '</td><td>' . $r['studentNumber'] .
        '</td><td>' . $r['name'] .
        '</td><td>' . $r['work'] .
        '</td><td>' . $r['grade'] .'</td></tr>';

}

//This will close the table
echo '</table>';
//This will disconnect the database
$db = null;

?>
</body>
</html>

