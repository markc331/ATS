<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';
    $pid = $_POST['pid'];

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];

    $ptype = $_POST['ptype'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $expcount = $_POST['expcount'];
    $educount = $_POST['educount'];

    $in = $_POST['in'];
    $scount = $_POST['scount'];
    $sql = "SELECT * FROM position WHERE pid = '$pid' ";
    $result = $conn->query($sql);
    
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/careers/app/app.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Athios</title>
        <div class="nav_container">
            <img src="https://img1.wsimg.com/isteam/ip/c0c68920-e75d-4537-ba2e-968973ac6ffb/571f223e-3f59-44f4-b339-1fe51ac030d8.png" alt="logo" class="logo"> 
            <div class="container">
                <h1><?php 
                        if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                                echo $row['title'];
                            }
                        }
                        ?></h1>
            </div>
        </div>
    </head>

    <body> 
        <form action="http://localhost:3000/careers/app/insert.php" method="post" class="newpos" enctype="multipart/form-data" style="position: relative; top: 150px;left:20%; width:78%;">
                <div class="section" id="resume" data-label="Resume" style="height: 300px;">
                    <h2 style="padding: 110px 0;">Resume</h2>
                    <div class="right">
                        <p class='resume_file'>File: <a href="<?php echo $_POST['dest']?>"><?php echo $_POST['resume']?></a></p>

                    </div>
                </div><br><br><br><br><hr>
                <input type="hidden" name="dest" id="dest" value="<?php echo $fileDestination?>">
                <input type="hidden" name="resume" id="resume" value="<?php echo $fileName?>">
                <!--- Basic Info --->
                <div class="section" id="info" data-label="Basic Information" style="position:relative;margin-top: 20px;">
                    <h2 style="padding:110px 0;">Basic Information</h2>
                    <div class="right-info">
                        <fieldset>
                            <h3>Name</h3>
                            <label for="fname">First: </label><?php echo $fname ?>
                            <input type="hidden" id="fname" name="fname" value="<?php echo $fname ?>"><br><br>
                    
                            <label for="mname">Middle: </label><?php echo $mname ?>
                            <input type="hidden" id="mname" name="mname" value="<?php echo $mname ?>"><br><br>

                            <label for="lname">Last: </label><?php echo $lname ?>
                            <input type="hidden" id="lname" name="lname" value="<?php echo $lname ?>"><br><br>
                        </fieldset><br>
                        <fieldset>
                            <h3>Contact Info</h3>
                            <label for="ptype">Type: </label><?php echo $ptype ?>
                            <input type="hidden" id="ptype" name="ptype" value="<?php echo $ptype ?>"><br><br>
                        
                            <label for="phone">Number: </label><?php echo $phone ?>
                            <input type="hidden" id="phone" name="phone" value="<?php echo $phone ?>"><br><br>

                            <label for="email">Email: </label><?php echo $email ?>
                            <input type="hidden" id="email" name="email" value="<?php echo $email ?>">
                        </fieldset>
                    </div> 
                </div><br><hr>
                
                
                <!--- Experience --->
                <div class="section" id="experience" data-label="Experience" style="position:relative;margin-top: 50px;">
                    <h2 style="padding:80px 0;">Work Experience<br></h2>
                    <div class="right-exp">
                    <fieldset>
                    <?php 
                        $excount = 1;
                        do{
                            $company = $_POST['company'.$excount.''];
                            $title = $_POST['title'.$excount.''];
                            $sdate = $_POST['sdate'.$excount.''];
                            $edate = $_POST['edate'.$excount.''];
                            $desc = $_POST['desc'.$excount.''];
                            echo "<fieldset>";
                            echo "<h3>Experience ".$excount."</h3>";
                            echo "<label for='company'>Company Name: </label>".$company."<br><br>";
                            echo "<input type='hidden' id='company".$excount."' name='company".$excount."' value='". $company  ."'>";
                            echo "<label for='title'>Position Title: </label>". $title."<br><br>";
                            echo "<input type='hidden' id='title".$excount."' name='title".$excount."' value='". $title  ."'>";
                            echo "<label for='sdate'>Start Date: </label>". $sdate."<br><br>";
                            echo "<input type='hidden' id='sdate".$excount."' name='sdate".$excount."' value='". $sdate  ."'>";
                            echo "<label for='edate'>End Date: </label>". $edate."<br><br>";
                            echo "<input type='hidden' id='edate".$excount."' name='edate".$excount."' value='". $edate  ."'>";
                            echo "<label for='desc'>Description:  </label><br>". $desc."<br><br>";
                            echo "<input type='hidden' id='desc".$excount."' name='desc".$excount."' value='". $desc  ."'>";
                            echo "</fieldset>";
                            $excount++;
                        }while($excount <= $expcount);
                        echo "<input type='hidden' id='expcount' name='expcount' value='".$expcount."'>";
                    ?>
                    </fieldset><br>
                    <input type ="hidden" id="expcount" name="expcount" value ="1">
                    </div>
                </div><br><br><hr>

                <div class="section" id="education" data-label="Education" style="position:relative;margin-top: 20px;">
                    <h2 style="padding:110px 0;">Education</h2>
                    <div class="right-edu">
                    <fieldset>
                        <?php 
                        $edcount = 1;
                        do{
                            $institution = $_POST['institution'.$edcount.''];
                            $degree = $_POST['degree'.$edcount.''];
                            $fos = $_POST['fos'.$edcount.''];
                            $syear = $_POST['syear'.$edcount.''];
                            $eyear = $_POST['eyear'.$edcount.''];
                            echo "<br><fieldset>";
                            echo "<h3>Education ".$edcount."</h3>";
                            echo "<label for='institution'>Institution Name: </label>". $institution."<br><br>";
                            echo "<input type='hidden' id='institution".$edcount."' name='institution".$edcount."' value='". $institution  ."'>";
                            echo "<label for='degree'>Degree: </label>". $degree."<br><br>";
                            echo "<input type='hidden' id='degree".$edcount."' name='degree".$edcount."' value='". $degree  ."'>";
                            echo "<label for='fos'>Field of Study: </label>". $fos."<br><br>";
                            echo "<input type='hidden' id='fos".$edcount."' name='fos".$edcount."' value='".$fos."'>";
                            echo "<label for='syear'>Start Year: </label>". $syear."<br><br>";
                            echo "<input type='hidden' id='syear".$edcount."' name='syear".$edcount."' value='". $syear  ."'>";
                            echo "<label for='eyear'>Graduate Year (expected): </label>". $eyear."<br><br>";
                            echo "<input type='hidden' id='eyear".$edcount."' name='eyear".$edcount."' value='". $eyear  ."'>";
                            echo "</fieldset>";
                            $edcount++;
                        }while($edcount <= $educount);
                        echo "<input type='hidden' id='educount' name='educount' value='".$educount."'>";
                        ?>
                    </fieldset><br>
                    <input type ="hidden" id="educount" name="educount" value ="1">
                    </div>
                </div><hr>                

                <div class="section" id="socials" data-label="Socials" style="position:relative;margin-top: 30px; height: 300px;">
                    <h2 style="padding:90px 0;">Socials</h2>
                    <div class="right-social">
                    <fieldset>
                        <h3>LinkedIn </h3><?php echo $in?>
                        <input type="hidden" id="in" name="in" value="<?php echo $in?>"><br><br>

                        <?php 
                            $wcount = 1;
                            do{
                                $website = $_POST['website'.$wcount.''];
                                echo "<h3>Website".$wcount."</h3>";
                                echo "<label for='website'>Website: </label>". $website."<br><br>";
                                echo "<input type='hidden' id='website".$wcount."' name='website".$wcount."' value='". $website  ."'>";                            
                                $wcount++;
                            }while($wcount <= $scount);
                            echo "<input type='hidden' id='scount' name='scount' value='".$scount."'>";
                        ?>
                    </fieldset>
                    </div>
                </div><br><br><br><br><br><br>

                <input type='hidden' id='pid' name='pid' value='<?php echo $pid ?>'>
                <input type = "submit" value="Submit" class="submit"><br><br><br><br>
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
                            '<h2 style="padding:110px 0;"></h2>' +
                            '<div class="right-edu">' + 
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
                            '</fieldset></div><br>';

                $('#new_work').append(newRowAdd);
            });
            $("body").on("click", "#remove_work", function(){
                $(this).parents("#exp").remove();
            })

            // Dynamically make new Education Entry
            $("#add_edu").click(function() {
                educount++;
                newRowAdd= '<div id ="edu">' +
                            '<h2 style="padding:110px 0;"></h2>' +
                            '<div class="right-edu">' +
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
                            '</fieldset></div><br>';

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

            function activateNav(){
                const sections = document.querySelectorAll(".section");
                const navContainer = document.createElement("nav");
                const navItems = Array.from(sections).map(section => {
                    return `
                        <div class="nav-item" data-for-section="${section.id}">
                            <a href="#${section.id}" class="nav-link"></a>
                            <span class="nav-label">${section.dataset.label}</span>
                        </div>
                    `;
                });
            
                navContainer.classList.add("nav");
                navContainer.innerHTML = navItems.join("");

                const observer = new IntersectionObserver(entries => {
                    document.querySelectorAll(".nav-link").forEach(navLink => {
                        navLink.classList.remove("nav-link-selected");
                    });

                    document.querySelectorAll(".nav-label").forEach(navLabel=> {
                        navLabel.classList.remove("nav-label-selected");
                    });

                    const visibleSection = entries.filter(entry => entry.isIntersecting)[0];

                    document.querySelector(`.nav-item[data-for-section="${visibleSection.target.id}"] .nav-link`).classList.add("nav-link-selected");
                    document.querySelector(`.nav-item[data-for-section="${visibleSection.target.id}"] .nav-label`).classList.add("nav-label-selected");
                    
                }, {threshold: .5});

                sections.forEach(section => observer.observe(section));
            
                document.body.appendChild(navContainer);
            }
            activateNav();

            // When the user scrolls the page, execute myFunction

        </script>
        
        </script>   
    </body><br><br>
    <div class="block" style="top: 200px;">
        <footer>
            <p>Designed and Developed By: Mark Anthony Castillo</p>
            <p>Applicant Tracking System (Version: Beta)</p>
        </footer>
    </div>
</html>