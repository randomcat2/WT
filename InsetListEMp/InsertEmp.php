<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
    <center>
        <h1>Add Employee</h1>
        <form method="post" action="">
            Id: <input type="text" name="txtid" required><br>
            Name: <input type="text" name="txtname" required><br>
            Salary: <input type="text" name="txtsal" required><br>
            Dept: <input type="text" name="txtdept" required><br>
            <input type="submit" value="Submit" name="btnsubmit">
        </form>

        <?php
        if (isset($_POST['btnsubmit'])) {
            $eid = $_POST['txtid'];
            $ename = $_POST['txtname'];
            $esal = $_POST['txtsal'];
            $edept = $_POST['txtdept'];

            // Database connection
            $mycon = mysqli_connect("localhost:3307", "root", "", "mynewdata");
            if (!$mycon) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Prepare and bind
            $sql = "INSERT INTO emp values(?, ?, ?, ?)";
            $ps = $mycon->prepare($sql);
            $ps->bind_param("isis", $eid, $ename, $esal, $edept);
            if ($ps->execute()) {
                echo "Data Inserted Successfully<br>";
            } else {
                echo "Error: " . $ps->error;
            }

            // Close the connection
            $ps->close();
            $mycon->close();
        }
        ?>
    </center>
</body>
</html>