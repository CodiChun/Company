<?php require_once('config.php'); ?>
<!-- TCSS 445 : Winter 2023 --> 
<!-- Codi Chun -->
<!-- Assignment 4 --> 
<!-- The page of department which let users select the name of a department, 
for each employee, it will display the last and first names of the employee in 
addition to the last and first names of the direct supervisor. -->
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Assignment 4 Demo</title> 
        <!-- add a reference to the external stylesheet --> 
        <link rel="stylesheet" href="https://bootswatch.com/4/spacelab/bootstrap.min.css"> 
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
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="employee.php">Employee</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="department.php">Department</a>
                        </li>
                        <li class="nav-item">
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
            <p class="lead">Select a department's name<p> 
            <hr class="my-4"> 
            <form method="GET" action="department.php"> 
                <select name="dep" onchange='this.form.submit()'> 
                    <option selected>Select a name</option> 

                    <?php 
                    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                    if ( mysqli_connect_errno() )  
                    { 
                        die( mysqli_connect_error() );   
                    } 
                    $sql = "select Dname, Dnumber from DEPARTMENT"; 
                    if ($result = mysqli_query($connection, $sql))  
                    { 
                        // loop through the data 
                        while($row = mysqli_fetch_assoc($result)) 
                        { 
                            echo '<option value="' . $row['Dnumber'] . '">'; 
                            echo $row['Dname'];  
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
                    if (isset($_GET['dep']) )  
                    { 
                ?> 
                <p>&nbsp;</p> 
                <table class="table table-hover"> 
                    <thead> 
                        <tr class="table-success"> 
                            <th scope="col">Last Name</th> 
                            <th scope="col">First Name</th> 
                            <th scope="col">Supervisor's Last Name</th> 
                            <th scope="col">Supervisor's First Name</th> 
                        </tr> 
                    </thead> 
                    <?php            
                        if ( mysqli_connect_errno() )  
                        { 
                            die( mysqli_connect_error() );   
                        } 
                        $sql = "
                        SELECT e1.Fname AS Fname, e1.Lname AS Lname, e2.Fname AS super_Fname, e2.Lname AS super_Lname
                        FROM EMPLOYEE e1
                        JOIN EMPLOYEE e2
	                        ON e1.Super_ssn = e2.Ssn
                        WHERE e1.Dno = {$_GET['dep']}"; 

                        if ($result = mysqli_query($connection, $sql))  
                        { 
                            while($row = mysqli_fetch_assoc($result)) 
                            { 
                    ?> 
                    <tr> 
                        <td><?php echo $row['Lname'] ?></td> 
                        <td><?php echo $row['Fname'] ?></td> 
                        <td><?php echo $row['super_Lname'] ?></td> 
                        <td><?php echo $row['super_Fname'] ?></td> 
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