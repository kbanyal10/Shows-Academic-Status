<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Academic Records</title>
    <!--This will connect the page with bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>

<?php

//These are variables which will store the user data
$appointment = $_POST['appointment'];
$extension = $_POST['extension'];
$attendance = $_POST['attendance'];

//This is validation from the server side

$ok = true;
if(empty($appointment))
{
    echo "Please fill the appointment status.</br>";
    $yes= false;
}

if(empty($extension))
{
    echo "Please fill the extension status.</br>";
    $yes= false;
}

if(empty($attendance))
{
    echo "Please fill the attendance.</br>";
    $yes= false;
}
//If everything is filled than it will connects to the database
if($ok) {
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395834', 'gc200395834', 'RfOMQChbzO');

    $sql = "INSERT INTO status (appointment, extension, attendance) 
    VALUES (:appointment, :extension, :attendance)";
    $cmd = $db->prepare($sql);

    $cmd->bindParam(':appointment', $appointment, PDO::PARAM_STR, 100);
    $cmd->bindParam(':extension', $extension, PDO::PARAM_STR, 100);
    $cmd->bindParam(':attendance', $attendance, PDO::PARAM_STR, 100);
    $cmd->execute();


// disconnect from the database
    $db = null;


    echo "Saved</br>";


    echo '<h3><a href="AcademicRecords.php">Add New Student Record</a></h3>';

}

?>

</body>
</html>

