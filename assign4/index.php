<!-- TCSS 445 : Autumn 2020 --> 
<!-- Assignment 4 Template --> 
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Assignment 4 Demo</title> 
        <!-- add a reference to the external stylesheet --> 
        <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css"> 
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
                            <a class="nav-link" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="employee.php">Employee</a>
                        </li>
                        <li class="nav-item">
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
            <h1 class="display-3">Welcome to assign4</h1> 
            <p class="lead">You can use this assignment to execute SQL queries on COMPANY databse. <p> 
            <hr class="my-4"> 
            <p>It uses MySQL DBMS and PHP to retrieve data from the database.</p> 
            <p class="lead"> 
                <a class="btn btn-primary btn-lg" href="#" role="button">thank you for visiting!</a> 
            </p> 
        </div> 

    </body> 
</html> 