<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';

    session_start();
    $hrid = $_SESSION['hrid'];

    $userSQL = "SELECT fname FROM rep WHERE hrid = '$hrid'";
    $userResult = $conn->query($userSQL);

    while($row = $userResult->fetch_assoc()){
        $name = $row['fname'];
    }
?>

<!DOCTYPE html>
<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/hr/nav/css/home.css">
    <head>
        <title>Athios</title>
        </div>
    </head>


    <body> 
        <header>
            <div class="nav_container">
                <img src="/athios_logo.jpg" alt="logo" class="logo">
                <nav style="float: left;">
                    <ul>
                        <li><a href="/hr/nav/home.php">Home</a></li>
                        <li><a href="/hr/position/position.html">Create Position</a></li>
                    </ul>
                </nav>
                <!--- nav for home, new position, user creation--->
                <div class="dropdown" style="float:right;margin-right:1%;">
                    <button class="dropbtn"><?php echo $name ?></button>
                    <div class="content" style="margin-right: 1.52%;">
                        <a href="/hr/user/new_user.php">New User</a>
                        <a href="/hr/user/user.php">Account</a>
                        <a href="/hr/login/signout.php">Sign Out</a>

                    </div>
                </div>
            </div>
        </header><br><br><br>
        <h1 style="position:relative; left:42%;">New Position</h1>
        <div class="container">
            <form action="http://localhost:3000/hr/position/position_review.php" method="post" class="newpos">
                <fieldset>
                    <legend>Position</legend>
                    <label for="title">Title</label><br>
                    <input type= "text" id="title" name="title"><br><br>

                    <label for="type">Type</label><br>
                    <select name="type" id="'type">
                            <option value = "select">Select...</option>
                            <option value = "Fulltime">Full Time</option>
                            <option value = "Part Time">Part Time</option>
                            <option value = "Internship">Internship</option>
                        </select><br><br>

                    <label for="level">Level</label><br>
                    <select name="level" id="'level">
                            <option value = "select">Select...</option>
                            <option value = "Internship">Internship</option>
                            <option value = "Entry Level">Entry Level</option>
                            <option value = "Associate">Associate</option>
                            <option value = "Mid-Senior Level">Mid-Senior Level</option>
                            <option value = "Director">Director</option>
                            <option value = "Executive">Executive</option>
                    </select><br><br>

                    <label for="wloc">Work Location</label><br>
                    <select name="wloc" id="'wloc">
                            <option value = "select">Select...</option>
                            <option value = "In Person">In Person</option>
                            <option value = "Hybrid">Hybrid</option>
                            <option value = "Remote">Remote</option>
                        </select><br><br>
                    <label for="loc">Location</label><br>
                    <input type= "text" id="loc" name="loc"><br><br>

                    <label for="shift">Shift</label><br>
                    <input type= "time" id="sshift" name="sshift">
                    <input type= "time" id="eshift" name="eshift"><br><br>

                    <label for="sched">Schedule</label><br>
                    <select name="sday" id="'sday">
                            <option value = "select">Select...</option>
                            <option value = "Monday">Monday</option>
                            <option value = "Tuesda">Tuesday</option>
                            <option value = "Wednesday">Wedesday</option>
                            <option value = "Thursday">Thursday</option>
                            <option value = "Friday">Friday</option>
                            <option value = "Saturday">Saturday</option>
                            <option value = "Sunday">Sunday</option>
                    </select>
                    <select name="eday" id="'eday">
                        <option value = "select">Select...</option>
                        <option value = "Monday">Monday</option>
                        <option value = "Tuesday">Tuesday</option>
                        <option value = "Wednesday">Wedesday</option>
                        <option value = "Thursday">Thursday</option>
                        <option value = "Friday">Friday</option>
                        <option value = "Saturday">Saturday</option>
                        <option value = "Sunday">Sunday</option>
                    </select><br><br>

                </fieldset>

                <fieldset>
                    <legend>Pay and Benefits</legend>
                    <label for="mnsalary">Min. Salary</label><br>
                    <input type= "text" id="min" name="min"><br><br>
                    <label for="mxsalary">Max Salary</label><br>
                    <input type= "text" id="max" name="max"><br><br>
                    
                    <label for="benefit1">Benefits</label><br>
                    <input type= "text" id="benefit1" name="benefit1"><br><br>
                    <input type="hidden" id="bcount" name="bcount" value="1">
                    <div id="newbenefit"></div>
                    <button id="addbenefit" type="button">Add</button><br><br>
                </fieldset>

                <fieldset>
                    <legend>Requirements and Description</legend>
                    <label for="req">Minimum Requirements</label><br>
                    <input type= "text" id="req1" name="req1"><br><br>
                    <input type="hidden" id="rqcount" name="rqcount" value="1">
                    <div id="newreq"></div>
                    <button id="addreq" type="button">Add</button><br><br>

                    <label for="qual">Qualifications</label><br>
                    <input type= "text" id="qual1" name="qual1"><br><br>
                    <input type="hidden" id="qcount" name="qcount" value="1">
                    <div id="newqual"></div>
                    <button id="addqual" type="button">Add</button><br><br>

                    <label for="skill">Desired Skills</label><br>
                    <input type= "text" id="skill1" name="skill1"><br><br>
                    <input type="hidden" id="scount" name="scount" value="1">
                    <div id="newskill"></div>
                    <button id="addskill" type="button">Add</button><br><br>

                    
                    
                    <label for="resp">Specific Responsibilities</label><br>
                    <input type= "text" id="resp1" name="resp1"><br><br>
                    <input type="hidden" id="rcount" name="rcount" value="1">
                    <div id="newresp"></div>
                    <button id="addresp" type="button">Add</button><br><br>

                    <label for="desc">Description</label><br>
                    <input type= "text" id="desc" name="desc"><br><br>
                </fieldset>
                
                <fieldset>
                    <legend>Miscellanous</legend>
                    <label for="travel">Travel Requirements</label><br>
                    <input type= "text" id="travel1" name="travel1"><br><br>
                    <input type="hidden" id="tcount" name="tcount" value="1">
                    <div id="newtravel"></div>
                    <button id="addtravel" type="button">Add</button><br><br>

                    <label for="clearance">Security Clearance</label><br>
                    <input type= "text" id="clearance1" name="clearance1"><br><br>
                    <input type="hidden" id="ccount" name="ccount" value="1">
                    <div id="newclearance"></div>
                    <button id="addclearance" type="button">Add</button><br><br>

                    <label for="phys">Physical Requirements and Work Enviroment</label><br>
                    <input type= "text" id="phys1" name="phys1"><br><br>
                    <input type="hidden" id="pcount" name="pcount" value="1">
                    <div id="newphys"></div>
                    <button id="addphys" type="button">Add</button><br>
                </fieldset><br>
                <input type = "submit" value="Review" class="submit">
            </form>
        </div>
        <script>
            let bcount= 1;
            let qcount = 1;
            let scount = 1;
            let rcount = 1;
            let rqcount = 1;
            let tcount = 1;
            let ccount = 1;
            let pcount = 1;

            $("#addbenefit").click(function() {
                bcount++;
                newRowAdd= '<div id ="benefit">' + 
                            '<input type= "text" id="benefit'+ bcount +'" name="benefit'+ bcount +'">' +
                            '<input type = "hidden" id="bcount" name="bcount" value="'+ bcount +'">'+
                            '<button id="removebenefit" type="button">Remove</button><br><br></div>';

                $('#newbenefit').append(newRowAdd);
            });
            $("body").on("click", "#removebenefit", function(){
                $(this).parents("#benefit").remove();
            })

            $("#addqual").click(function() {
                qcount++;
                newRowAdd= '<div id ="qual">' + 
                            '<input type= "text" id="qual'+ qcount +'" name="qual'+ qcount +'">' +
                            '<input type = "hidden" id="qcount" name="qcount" value="'+ qcount +'">'+
                            '<button id="removequal" type="button">Remove</button><br><br></div>';

                $('#newqual').append(newRowAdd);
            });
            $("body").on("click", "#removequal", function(){
                $(this).parents("#qual").remove();
            })

            $("#addskill").click(function() {
                scount++;
                newRowAdd= '<div id ="skill">' + 
                            '<input type= "text" id="skill'+ scount +'" name="skill'+ scount +'">' +
                            '<input type = "hidden" id="scount" name="scount" value="'+ scount +'">'+
                            '<button id="removeskill" type="button">Remove</button><br><br></div>';

                $('#newskill').append(newRowAdd);
            });
            $("body").on("click", "#removeskill", function(){
                $(this).parents("#skill").remove();
            })

            $("#addresp").click(function() {
                rcount++;
                newRowAdd= '<div id ="resp">' + 
                            '<input type= "text" id="resp'+ rcount +'" name="resp'+ rcount +'">' +
                            '<input type = "hidden" id="rcount" name="rcount" value="'+ rcount +'">'+
                            '<button id="removeresp" type="button">Remove</button><br><br></div>';

                $('#newresp').append(newRowAdd);
            });
            $("body").on("click", "#removeresp", function(){
                $(this).parents("#resp").remove();
            })

            $("#addreq").click(function() {
                rqcount++;
                newRowAdd= '<div id ="req">' + 
                            '<input type= "text" id="req'+ rqcount +'" name="req'+ rqcount +'">' +
                            '<input type = "hidden" id="rqcount" name="rqcount" value="'+ rqcount +'">'+
                            '<button id="removereq" type="button">Remove</button><br><br></div>';

                $('#newreq').append(newRowAdd);
            });
            $("body").on("click", "#removereq", function(){
                $(this).parents("#req").remove();
            })

            $("#addtravel").click(function() {
                tcount++;
                newRowAdd= '<div id ="travel">' + 
                            '<input type= "text" id="travel'+ tcount +'" name="travel'+ tcount +'">' +
                            '<input type = "hidden" id="tcount" name="tcount" value="'+ tcount +'">'+
                            '<button id="removetravel" type="button">Remove</button><br><br></div>';

                $('#newtravel').append(newRowAdd);
            });
            $("body").on("click", "#removetravel", function(){
                $(this).parents("#travel").remove();
            })

            $("#addclearance").click(function() {
                ccount++;
                newRowAdd= '<div id ="clearance">' + 
                            '<input type= "text" id="clearance'+ ccount +'" name="clearance'+ ccount +'">' +
                            '<input type = "hidden" id="ccount" name="ccount" value="'+ ccount +'">'+
                            '<button id="removeclearance" type="button">Remove</button><br><br></div>';

                $('#newclearance').append(newRowAdd);
            });
            $("body").on("click", "#removeclearance", function(){
                $(this).parents("#clearance").remove();
            })

            $("#addphys").click(function() {
                pcount++;
                newRowAdd= '<div id ="phys">' + 
                            '<input type= "text" id="phys'+ pcount +'" name="phys'+ pcount +'">' +
                            '<input type = "hidden" id="pcount" name="pcount" value="'+ pcount +'">'+
                            '<button id="removephys" type="button">Remove</button><br><br></div>';

                $('#newphys').append(newRowAdd);
            });
            $("body").on("click", "#removephys", function(){
                $(this).parents("#phys").remove();
            })
        </script>
    </body>
</html>