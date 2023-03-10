<?php require_once('config.php'); ?>
<!-- TCSS 445 : Winter 2023 --> 
<!-- Codi Chun -->
<!-- Assignment 4 --> 
<!-- The project page, which will allow user to select a project location via a dropdown menu.
for  every  project  located  in  the  selected  project  location  via  the  dropdown  menu, 
retrieve the project name, the controlling department name and the department manager’s last name, 
address and birth date.  -->
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Assignment 4 Demo</title> 
        <!-- add a reference to the external stylesheet --> 
        <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.min.css"> 
    </head> 

    <body> 
        <!-- START -- Add HTML code for the top menu section (navigation bar) --> 
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">assign4</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="employee.php">Employee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="department.php">Department</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="project.php">Project</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-sm-2" type="search" placeholder="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- END -- Add HTML code for the top menu section (navigation bar) --> 
        
        <div class="jumbotron"> 
            <p class="lead">Select a project's location<p> 
            <hr class="my-4"> 
            <form method="GET" action="project.php"> 
                <select name="pro" onchange='this.form.submit()'> 
                    <option selected>Select a location</option> 

                    <?php 
                    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                    if ( mysqli_connect_errno() )  
                    { 
                        die( mysqli_connect_error() );   
                    } 
                    $sql = "select DISTINCT Plocation from PROJECT ORDER BY Plocation"; 
                    if ($result = mysqli_query($connection, $sql))  
                    { 
                        // loop through the data 
                        while($row = mysqli_fetch_assoc($result)) 
                        { 
                            echo '<option value="' . $row['Plocation'] . '">'; 
                            echo $row['Plocation'];  
                            echo "</option>"; 
                        } 
                        // release the memory used by the result set 
                        mysqli_free_result($result);  
                    }  
                    ?>  
                </select> 
                <?php 
                if ($_SERVER["REQUEST_METHOD"] == "GET")  
                { 
                    if (isset($_GET['pro']) )  
                    { 
                ?> 
                <p>&nbsp;</p> 
                <table class="table table-hover"> 
                    <thead> 
                        <tr class="table-success"> 
                            <th scope="col">Project Name</th> 
                            <th scope="col">Controlling Department</th> 
                            <th scope="col">Manager's Last Name</th> 
                            <th scope="col">Manager's Address</th>
                            <th scope="col">Manager's Birth Date</th>
                        </tr> 
                    </thead> 
                    <?php            
                        if ( mysqli_connect_errno() )
                        {
                            die( mysqli_connect_error() );
                        }
                        $sql = "
                        SELECT *
                        FROM PROJECT
                        LEFT JOIN DEPARTMENT ON Dnum = Dnumber
                        LEFT JOIN EMPLOYEE ON Mgr_ssn = Ssn
                        WHERE Plocation = '{$_GET['pro']}'";

                        if ($result = mysqli_query($connection, $sql))  
                        { 
                            while($row = mysqli_fetch_assoc($result)) 
                            { 
                    ?> 
                    <tr> 
                        <td><?php echo $row['Pname'] ?></td> 
                        <td><?php echo $row['Dname'] ?></td> 
                        <td><?php echo $row['Lname'] ?></td> 
                        <td><?php echo $row['Address'] ?></td>
                        <td><?php echo $row['Bdate'] ?></td>
                    </tr> 
                    <?php 
                            } 
                            // release the memory used by the result set 
                            mysqli_free_result($result);  
                        }  
                    } // end if (isset) 
                } // end if ($_SERVER) 
                    ?> 
                </table> 
            </form> 
        </div> 

    </body> 
</html> 