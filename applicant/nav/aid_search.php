<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/applicant/nav/css/home.css">
        <link rel="stylesheet" href="/hr/position/css/position.css">

        <title>home</title>
    </head>

    <body> 
        <header>
            <div class="nav_container">
                <img src="/athios_logo.jpg" alt="logo" class="logo">
                <h4>Find Application</h4> 

            </div>
        </header><br><br>

        <form action="http://localhost:3000/applicant/nav/home.php" method="post" style="float:left;">
            <input type="submit" value="Return to Home" class="prev">
        </form><br><br><br><br>
        <div class="container">
            <form action="http://localhost:3000/applicant/application/status.php" method="post">
                <fieldset class="said"">
                    <legend>Enter Application ID</legend>
                    <input type="text" id="aid" name="aid" style="width: 95%;"><br><br>
                    <input type="submit" value="Find Application" style="position:relative;left:30%;">
                </fieldset>
            </form>
        </div>    
    </body>
</html>