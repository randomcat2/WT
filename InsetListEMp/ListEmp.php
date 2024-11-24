<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
</head>
<body>
    <center>
        <h1>Employee List</h1>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Dept</th>
            </tr>
            <?php
            // Database connection
            $mycon = mysqli_connect("localhost:3307", "root", "", "mynewdata");
            if (!$mycon) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetching employee records
            $sql = "SELECT * FROM emp";
            $record = $mycon->query($sql);
            $n=mysqli_num_rows($record);
            if($n>0)
            {
                while($row=$record->fetch_assoc())
                {
                    echo "<tr>
                            <td>{$row['empid']}</td>
                            <td>{$row['empname']}</td>
                            <td>{$row['salary']}</td>
                            <td>{$row['department']}</td>
                          </tr>";
                }
            }
            else
            {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }

            // if ($result->num_rows > 0) {
            //     while ($row = $result->fetch_assoc()) {
            //         echo "<tr>
            //                 <td>{$row['id']}</td>
            //                 <td>{$row['name']}</td>
            //                 <td>{$row['salary']}</td>
            //                 <td>{$row['dept']}</td>
            //               </tr>";
            //     }
            // } else {
            //     echo "<tr><td colspan='4'>No records found</td></tr>";
            // }

            // Close the connection
            $mycon->close();
            ?>
        </table>
        <br>
        <a href="InsertEmp.php">Add Employee</a>
    </center>
</body>
</html>