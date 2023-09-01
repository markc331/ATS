<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';
    $pid = $_POST['pid'];
    $sql = "SELECT * FROM position WHERE pid = '$pid' ";
    $result = $conn->query($sql);


?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="/hr/nav/css/home.css">
    <link rel="stylesheet" href="/hr/position/css/position.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Athios</title>
        
    </head>

    <body> 
        <header>
            <div class="nav_container">
                <img src="/athios_logo.jpg" alt="logo" class="logo">
            </div>
        </header><br><br><br>


        <form action="http://localhost:3000/applicant/nav/position_details.php" method="post" style="float:left;">
            <input type="hidden" id="pid" name="pid" value="<?php  echo $pid ?>">
            <input type="submit" value="Return to Position Details" class="prev">
        </form><br><br>

        <div class="container">
            <h1 style="position:relative; left:45%;"><?php 
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo $row['title'];
                    }
                }

            ?></h1>
        </div>
        <form action="http://localhost:3000/applicant/application/app_review.php" method="post" class="newpos" enctype="multipart/form-data">
                <fieldset> 
                    <legend>Resume</legend>
                    <input type= "file" id="resume" name="resume"><br><br>
                </fieldset>

                <!--- Applicant Name --->
                <fieldset>
                    <legend>Name</legend>
                    <label for="fname">First Name: </label>
                    <input type="text" id="fname" name="fname"><br><br>
                    
                    <label for="mname">Middle Name: </label>
                    <input type="text" id="mname" name="mname"><br><br>

                    <label for="lname">Last Name: </label>
                    <input type="text" id="lname" name="lname"><br><br>
                </fieldset>

                <!--- Contact Info ---->
                <fieldset>
                    <legend>Contact Info</legend>
                    <label for="ptype">Phone type:</label>
                    <select name="ptype" id="ptype">
                        <option value = "select">Select...</option>
                        <option value = "mobile">mobile</option>
                        <option value = "home">home</option>
                    </select>
                    
                    <label for="phone">Phone Number: </label>
                    <input type="text" id="phone" name="phone"><br><br>

                    <label for="email">Email</label>
                    <input type="text" id="email" name="email"><br><br>
                </fieldset>
                
                <!--- Experience --->
                <fieldset>
                    <legend>Experience</legend>
                    <label for="company">Company Name: </label>
                    <input type="text" id="company1" name="company1"><br><br>

                    <label for="title">Position Title: </label>
                    <input type="text" id="title1" name="title1"><br><br>

                    <label for="sdate">Start Date</label><br>
                    <input type="date" id="sdate1" name="sdate1"><br><br>

                    <label for="edate">End Date</label><br>
                    <input type="date" id="edate1" name="edate1"><br><br>

                    <label for="desc">Position Description</label>
                    <input type="text" id="desc1" name="desc1"><br><br>
                </fieldset><br>
                <input type ="hidden" id="expcount" name="expcount" value ="1">

                <div id="new_work"></div>
                <button id="add_work" type="button">Add Work</button><br><br>

                <!--- Education ---->
                <fieldset>
                    <legend>Education</legend>
                    <label for="institution">Institution Name: </label>
                    <input type="text" id="institution1" name="institution1"><br><br>

                    <label for="degree">Degree: </label>
                    <input type="text" id="degree1" name="degree1"><br><br>

                    <label for="fos">Field of Study: </label>
                    <input type="text" id="fos1" name="fos1"><br><br>

                    <label for="syear">Start Year: </label>
                    <input type="text" id="syear1" name="syear1"><br><br>

                    <label for="eyear">Graduate Year (expected): </label>
                    <input type="text" id="eyear1" name="eyear1"><br><br>
                </fieldset><br>
                <input type ="hidden" id="educount" name="educount" value ="1">

                <div id="new_edu"></div>
                <button id="add_edu" type="button">Add Education</button><br><br>

                <!--- Socials --->
                <fieldset>
                    <legend>Socials</legend>
                    <label for="in">LinkedIn: </label>
                    <input type="url" id="in" name="in"><br><br>

                    <label for="website">Website: </label>
                    <input type="url" id="website1" name="website1"><br><br>
                    <input type ="hidden" id="scount" name="scount" value ="1">
                    <div id="new_site"></div>
                    <button id="add_site" type="button">Add Website</button><br><br>

                </fieldset><br><br>
                <input type='hidden' id='pid' name='pid' value='<?php echo $pid ?>'>
                <input type = "submit" value="Review" class="submit">
            </form>
        </div>                     
        <script>
            let expcount =1;
            let educount =1;
            let scount = 1;
            
            // Dynamically make new Work Entry
            $("#add_work").click(function() {
                expcount++;
                newRowAdd= '<div id ="exp">' + 
                            '<fieldset>'+
                            '<legend>Experience</legend>' +
                            '<label for="company">Company Name: </label>'+
                            '<input type="text" id="company'+expcount+'" name="company'+expcount+'"><br><br>'+
                            '<label for="title">Position Title: </label>' +
                            '<input type="text" id="title'+expcount+'" name="title'+expcount+'"><br><br>' +
                            '<label for="sdate">Start Date</label><br>' +
                            '<input type="date" id="sdate'+expcount+'" name="sdate'+expcount+'"><br><br>' +
                            '<label for="edate">End Date</label><br>' +
                            '<input type="date" id="edate'+expcount+'" name="edate'+expcount+'"><br><br>' +
                            '<label for="desc">Position Description</label>' +
                            '<input type="text" id="desc'+expcount+'" name="desc'+expcount+'"><br><br>' +
                            '<input type = "hidden" id="expcount" name="expcount" value="'+ expcount +'">'+
                            '<button id="remove_work" type="button">Remove</button></div>' +
                            '</fieldset><br>';

                $('#new_work').append(newRowAdd);
            });
            $("body").on("click", "#remove_work", function(){
                $(this).parents("#exp").remove();
            })

            // Dynamically make new Education Entry
            $("#add_edu").click(function() {
                educount++;
                newRowAdd= '<div id ="edu">' +
                            '<fieldset>' +
                            '<legend>Education</legend>' +
                            '<label for="institution">Institution Name: </label>' +
                            '<input type="text" id="institution'+educount+'" name="institution'+educount+'"><br><br>' +
                            '<label for="degree">Degree: </label>'+
                            '<input type="text" id="degree'+educount+'" name="degree'+educount+'"><br><br>'+
                            '<label for="fos">Field of Study: </label>'+
                            '<input type="text" id="fos'+educount+'" name="fos'+educount+'"><br><br>'+  
                            '<label for="syear">Start Year: </label>' +
                            '<input type="text" id="syear'+educount+'" name="syear'+educount+'"><br><br>' +
                            '<label for="eyear">Graduate Year (expected): </label>'+
                            '<input type="text" id="eyear'+educount+'" name="eyear'+educount+'"><br><br>'+
                            '<input type = "hidden" id="educount" name="educount" value="'+educount+'">'+
                            '<button id="remove_edu" type="button">Remove</button></div>' +
                            '</fieldset><br>';

                $("#new_edu").append(newRowAdd);
            });
            $("body").on("click", "#remove_edu", function(){
                $(this).parents("#edu").remove();
            })

            $("#add_site").click(function() {
                scount++;
                newRowAdd= '<div id ="site">' +
                            '<label for="website">Website :</label>' +
                            '<input type="url" id="website'+scount+'" name="website'+scount+'">' +
                            '<input type = "hidden" id="scount" name="scount" value="'+ scount +'">'+
                            '<button id="remove_site" type="button">Remove</button><br><br></div>' +
                            '</fieldset>';

                $('#new_site').append(newRowAdd);
            });
            $("body").on("click", "#remove_site", function(){
                $(this).parents("#site").remove();
            })
        </script>   
    </body>
</html>