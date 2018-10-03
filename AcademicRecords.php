<!DOCTYPE html>
<html lang="en">
<head>

<title>
    Student Records
</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" /> <!--This is to bind it with bootstrap-->

</head>
<meta charset="UTF-8">

<body>

<h1> Academic Records </h1>
<!--This will show the student records by going on the ShowingRecord.php page -->

<a href="ShowingRecord.php">Show Student Academics </a>
<!--This is to give table some classes so that bootstrap can be applied on this and after submitting this will direct it to page AcademicInput.php-->
<form class="table table-striped table-hover table-responsive" action="AcademicInput.php" method="post">
    <!--Creating a Form -->
    <fieldset>
        <label for="courseName">Course Name: </label>
        <input name="courseName" id="courseName" required/>

    </fieldset>
    <fieldset>
        <label for="studentNumber">Student Number: </label>
        <input name="studentNumber" id="studentNumber" required/>
    </fieldset>
    <fieldset>
        <label for="name">Name: </label>
        <input name="name" id="name" required/>
    </fieldset>
    <fieldset>
        <label for="work">Work: </label>
        <input name="work" id="work" required/>
    </fieldset>
    <fieldset>
        <label for="grade" class="col-md-1">Grade: </label>
        <select  name="grade" id="grade" required>
            <!--This will take data from workbench and make this a dropdown box -->
            <?php
            //Connecting to the database
            $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395834', 'gc200395834', 'RfOMQChbzO');
            //selecting from table grade
            $sql = "SELECT * FROM grade ORDER BY grade";
            $cmd = $db->prepare($sql);
            $cmd->execute();

            //This will fetch the data from the table
            $academic = $cmd->fetchAll();
            //This will store the grade inputs and will show as a drop down
            foreach($academic as $x )
            {
                echo "<option>{$x['grade']}</option>";
            }
            //End Connection
           $db = null;

            ?>
        </select>
    </fieldset>

   <button>Submit</button>
</form>
<!--This is for the second set of information of student -->
    <h1> Student Status</h1>
<a href="ShowingRecord2.php">Show Student Status </a>


    <form action="AcademicInput2.php" method="post" class="table-striped table-hover">
        <fieldset>
            <label for="appointment">Appointment: </label>
            <input name="appointment" id="appointment" required/>
        </fieldset>
        <fieldset>
            <label for="extension"> Extension: </label>
            <input name="extension" id="extension" required/>
        </fieldset>
        <fieldset>
            <label for="attendance">Attendance: </label>
            <input name="attendance" id="attendance" required/>
        </fieldset>


       <button>Submit</button>
    </form>


</body>
</html>
