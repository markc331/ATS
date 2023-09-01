<?php
    $pid = $_POST['pid'];

    $file = $_FILES['resume'];
    $fileName= $_FILES['resume']['name'];
    $fileTmpName= $_FILES['resume']['tmp_name'];
    $fileSize = $_FILES['resume']['size'];
    $fileError = $_FILES['resume']['error'];
    $fileType = $_FILES['resume']['type'];

    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));

    $allowed = array('pdf');

    if(in_array($fileActExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 500000){
                $fileNameNew = uniqid('', true).".".$fileActExt;
                $fileDestination = 'upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                echo "File too big";
            }
        }else{
            echo "Error";
        }
    }else{
        echo "File Must Be PDF";
    }

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
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="/hr/nav/css/home.css">
    <link rel="stylesheet" href="/hr/position/css/position.css">
        <title>Athios</title>
    </head>

    <body> 
        <div class="container">
        <header>
            <div class="nav_container">
                <img src="/athios_logo.jpg" alt="logo" class="logo">
            </div>
        </header><br><br><br>

        <h1 style="position:relative; left:40%;">Application Review</h1>
        <form action="http://localhost:3000/applicant/application/app_insert.php" method="post" class="papp" style="left:10%;">
            <fieldset > 
                <legend>Resume</legend>
                <?php echo "<a href='".$fileDestination."'>".$fileName."</a>"?>
                <input type= "hidden" id="resume" name="resume" value="<?php echo $fileDestination ?>"><br><br>
            </fieldset>

            <fieldset>
                <legend>Name</legend>
                <label for="fname">First Name: </label><?php echo $fname ?>
                <input type="hidden" id="fname" name="fname" value="<?php echo $fname ?>"><br><br>
                    
                <label for="mname">Middle Name: </label><?php echo $mname ?>
                <input type="hidden" id="mname" name="mname" value="<?php echo $mname ?>"><br><br>

                <label for="lname">Last Name: </label><?php echo $lname ?>
                <input type="hidden" id="lname" name="lname" value="<?php echo $lname ?>"><br><br>
            </fieldset>

            <fieldset>
                <legend>Contact Info</legend>
                <label for="ptype">Phone type:</label><?php echo $ptype ?>
                <input type="hidden" id="ptype" name="ptype" value="<?php echo $ptype ?>"><br><br>
                    
                <label for="phone">Phone Number: </label><?php echo $phone ?>
                <input type="hidden" id="phone" name="phone" value="<?php echo $phone ?>"><br><br>

                <label for="email">Email: </label><?php echo $email ?>
                <input type="hidden" id="email" name="email" value="<?php echo $email ?>"><br><br>
            </fieldset>

            <fieldset>
                    <legend>Experience</legend>
                    <?php 
                        $excount = 1;
                        do{
                            $company = $_POST['company'.$excount.''];
                            $title = $_POST['title'.$excount.''];
                            $sdate = $_POST['sdate'.$excount.''];
                            $edate = $_POST['edate'.$excount.''];
                            $desc = $_POST['desc'.$excount.''];
                            echo "<fieldset>";
                            echo "<legend>".$excount."</legend>";
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
            </fieldset>
            
            <fieldset>
                    <legend>Education</legend>
                    <?php 
                        $edcount = 1;
                        do{
                            $institution = $_POST['institution'.$edcount.''];
                            $degree = $_POST['degree'.$edcount.''];
                            $fos = $_POST['fos'.$edcount.''];
                            $syear = $_POST['syear'.$edcount.''];
                            $eyear = $_POST['eyear'.$edcount.''];
                            echo "<fieldset>";
                            echo "<legend>".$edcount."</legend>";
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

                <fieldset>
                    <legend>Socials</legend>
                    <label for="in">LinkedIn: </label><?php echo $in?>
                    <input type="hidden" id="in" name="in" value="<?php echo $in?>"><br><br>

                    <?php 
                        $wcount = 1;
                        do{
                            $website = $_POST['website'.$wcount.''];
                            echo "<label for='website'>Website: </label>". $website."<br><br>";
                            echo "<input type='hidden' id='website".$wcount."' name='website".$wcount."' value='". $website  ."'>";                            
                            $wcount++;
                        }while($wcount <= $scount);
                        echo "<input type='hidden' id='scount' name='scount' value='".$scount."'>";
                    ?>
                </fieldset><br><br>
            <input type ='hidden' id='pid' name ='pid' value='<?php echo $pid ?>'>
            <input type = "submit" value="Submit" class="submit">
        </form>
        </div>    
    </body>
</html>