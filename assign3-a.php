<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>
    <body>
        <?php $last_name = $_GET['last_name']; ?>
        <h1>Searching the COMPANY database for <?php echo $last_name ?></h1>
        <table>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Social Security #</th>
                <th>Salary</th>
                <th>Birth Date</th>
                <th>Department</th>
            </tr>
            <?php
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
            if ( mysqli_connect_errno() )
            {
                die( mysqli_connect_error() );
            }

            $sql = "select * from EMPLOYEE LEFT JOIN DEPARTMENT ON Dno = Dnumber WHERE Lname = '{$last_name}' ";
            if ($result = mysqli_query($connection, $sql))
            {
                // loop through the data
                while($row = mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <td><?php echo $row['Lname'] ?></td>
                <td><?php echo $row['Fname'] ?></td>
                <td><?php echo $row['Ssn'] ?></td>
                <td><?php echo $row['Salary'] ?></td>
                <td><?php echo $row['Bdate'] ?></td>
                <td><?php echo $row['Dname'] ?></td>
            </tr>

            <?php
                }
                // release the memory used by the result set
                mysqli_free_result($result);
            }
            // close the database connection
            mysqli_close($connection);

            ?>
        </table>
    </body>
</html>