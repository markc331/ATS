<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/careers/nav/nav.css">
        <title>home</title>
    </head>

    <body> 
    <header>
            <div class="nav_container">            
                <div class="menu">
                    <img src="https://img1.wsimg.com/isteam/ip/c0c68920-e75d-4537-ba2e-968973ac6ffb/571f223e-3f59-44f4-b339-1fe51ac030d8.png" alt="logo" class="logo"> 
                    <nav style="float: left;">
                        <ul>
                            <li><a href="/careers/nav/home.php">Home</a></li>
                            <li><a href="/careers/nav/search.php">Application Status</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div class="container">
            <form action="http://localhost:3000/careers/nav/status.php" method="post" style="position: relative; margin-top: 200px;">
                    <input type="text" id="aid" name="aid" placeholder="Application ID" class="search-box">
                    <input type="submit" class="find" value="Search" style="position:relative">
            </form>
        </div>    
    </body>
    <div class="block" style="position:relative;top:300px;">
        <footer>
            <p>Designed and Developed By: Mark Anthony Castillo</p>
            <p>Applicant Tracking System (Version: Beta)</p>
        </footer>
    </div>
</html>