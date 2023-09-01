<?php
    $title = $_POST['title'];
    $type = $_POST['type'];
    $level = $_POST['level'];
    $wloc = $_POST['wloc'];
    $loc = $_POST['loc'];
    $sshift = $_POST['sshift'];
    $eshift = $_POST['eshift'];

    $sday = $_POST['sday'];
    $eday = $_POST['eday'];

    $min = $_POST['min'];
    $max = $_POST['max'];

    $bcount= $_POST['bcount'];
    $qcount = $_POST['qcount'];
    $scount = $_POST['scount'];
    $rcount = $_POST['rcount'];
    $rqcount = $_POST['rqcount'];
    $tcount = $_POST['tcount'];
    $ccount = $_POST['ccount'];
    $pcount = $_POST['pcount'];
    
    $desc = $_POST['desc'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Athios</title>
        <h1>Position Review</h1>
        </div>
    </head>

    <body> 
        <div class="container">
        <form action="http://localhost:3000/hr/position/position_insert.php" method="post">
                <fieldset>
                    <legend>Position</legend>
                    <label for="title">Title: </label><?php echo $title;?>
                    <input type= "hidden" id="title" name="title" value="<?php echo $title;?>"><br><br>

                    <label for="type">Type: </label><?php echo $type;?>
                    <input type= "hidden" id="type" name="type" value="<?php echo $type;?>"><br><br>
                   

                    <label for="level">Level: </label><?php echo $level;?>
                    <input type= "hidden" id="level" name="level" value="<?php echo $level;?>"><br><br>
                    

                    <label for="wloc">Work Location: </label><?php echo $wloc;?>
                    <input type= "hidden" id="wloc" name="wloc" value="<?php echo $wloc;?>"><br><br>

                    <label for="loc">Location: </label><?php echo $loc;?>
                    <input type= "hidden" id="loc" name="loc" value="<?php echo $loc;?>"><br><br>

                    <label for="shift">Shift: </label><?php echo $sshift. " - " . $eshift;?>
                    <input type= "hidden" id="sshift" name="sshift" value="<?php echo $sshift;?>">
                    <input type= "hidden" id="eshift" name="eshift" value="<?php echo $eshift;?>"><br><br>

                    <label for="sched">Schedule: </label><?php echo $sday. " - " . $eday;?>
                    <input type= "hidden" id="sday" name="sday" value="<?php echo $sday;?>">
                    <input type= "hidden" id="eday" name="eday" value="<?php echo $eday;?>"><br><br>


                </fieldset>

                <fieldset>
                    <legend>Pay and Benefits</legend>
                    <label for="mnsalary">Min. Salary: </label><?php echo $min;?>
                    <input type= "hidden" id="min" name="min" value="<?php echo $min;?>"><br><br>
                    <label for="mxsalary">Max Salary: </label><?php echo $max;?>
                    <input type= "hidden" id="max" name="max" value="<?php echo $max;?>"><br><br>
                    
                    <label for="benefit">Benefits: </label>
                    <?php 
                        echo "<ul>";
                        $bencount = 1;
                        do{
                            $benefit = $_POST['benefit'.$bencount.''];
                            echo "<li>".$benefit."</li>";
                            echo "<input type='hidden' id='benefit".$bencount."' name='benefit".$bencount."' value='".$benefit."'>";
                            $bencount++;
                        }while($bencount <= $bcount);
                        echo "</ul>";
                        echo "<input type='hidden' id='bcount' name='bcount' value='".$bcount."'>";
                    ?>
                </fieldset>

                <fieldset>
                    <legend>Requirements and Description</legend>
                    <label for="req">Minimum Requirements: </label>
                    <?php 
                        echo "<ul>";
                        $reqcount = 1;
                        do{
                            $req = $_POST['req'.$reqcount.''];
                            echo "<li>".$req."</li>";
                            echo "<input type='hidden' id='req".$reqcount."' name='req".$reqcount."' value='". $req ."'>";
                            $reqcount++;
                        }while($reqcount <= $rqcount);
                        echo "</ul>";
                        echo "<input type='hidden' id='rqcount' name='rqcount' value='".$rqcount."'>";
                    ?>

                    <label for="qual">Qualifications: </label>
                    <?php 
                        echo "<ul>";
                        $qualcount = 1;
                        do{
                            $qual = $_POST['qual'.$qualcount.''];
                            echo "<li>".$qual."</li>";
                            echo "<input type='hidden' id='qual".$qualcount."' name='qual".$qualcount."' value='". $qual ."'>";
                            $qualcount++;
                        }while($qualcount <= $qcount);
                        echo "</ul>";
                        echo "<input type='hidden' id='qcount' name='qcount' value='".$qcount."'>";

                    ?>

                    <label for="skill">Desired Skills: </label><br>
                    <?php 
                        echo "<ul>";
                        $skillcount = 1;
                        do{
                            $skill = $_POST['skill'.$skillcount.''];
                            echo "<li>".$skill."</li>";
                            echo "<input type='hidden' id='skill".$skillcount."' name='skill".$skillcount."' value='". $skill ."'>";
                            $skillcount++;
                        }while($skillcount <= $scount);
                        echo "</ul>";
                        echo "<input type='hidden' id='scount' name='scount' value='".$scount."'>";
                    ?>

                    <label for="resp">Specific Responsibilities</label><br>
                    <?php 
                        echo "<ul>";
                        $respcount = 1;
                        do{
                            $resp = $_POST['resp'.$respcount.''];
                            echo "<li>".$resp."</li>";
                            echo "<input type='hidden' id='resp".$respcount."' name='resp".$respcount."' value='". $resp ."'>";
                            $respcount++;
                        }while($respcount <= $rcount);
                        echo "</ul>";
                        echo "<input type='hidden' id='rcount' name='rcount' value='".$rcount."'>";
                    ?>

                    <label for="pdesc">Description: </label><br><?php echo $desc;?>
                    <input type= "hidden" id="desc" name="desc" value="<?php echo $desc;?>"><br><br>
                </fieldset>
                
                <fieldset>
                    <legend>Miscellanous</legend>
                    <label for="travel">Travel Requirements: </label><br>
                    <?php 
                        echo "<ul>";
                        $travelcount = 1;
                        do{
                            $travel = $_POST['travel'.$travelcount.''];
                            echo "<li>".$travel."</li>";
                            echo "<input type='hidden' id='travel".$travelcount."' name='travel".$travelcount."' value='". $travel ."'>";
                            $travelcount++;
                        }while($travelcount <= $tcount);
                        echo "</ul>";
                        echo "<input type='hidden' id='tcount' name='tcount' value='".$tcount."'>";
                    ?>

                    <label for="clearance">Security Clearance</label><br>
                    <?php 
                        echo "<ul>";
                        $clearcount = 1;
                        do{
                            $clearance= $_POST['clearance'.$clearcount.''];
                            echo "<li>".$clearance."</li>";
                            echo "<input type='hidden' id='clearance".$clearcount."' name='clearance".$clearcount."' value='". $clearance ."'>";
                            $clearcount++;
                        }while($clearcount <= $ccount);
                        echo "</ul>";
                        echo "<input type='hidden' id='ccount' name='ccount' value='".$ccount."'>";
                    ?>

                    <label for="phys">Physical Requirements and Work Enviroment</label><br>
                    <?php 
                        echo "<ul>";
                        $physcount = 1;
                        do{
                            $phys = $_POST['phys'.$physcount.''];
                            echo "<li>".$phys."</li>";
                            echo "<input type='hidden' id='phys".$physcount."' name='phys".$physcount."' value='".$phys."'>";
                            $physcount++;
                        }while($physcount <= $pcount);
                        echo "</ul>";
                        echo "<input type='hidden' id='pcount' name='pcount' value='".$pcount."'>";
                    ?>
                </fieldset><br>
                <input type = "submit" value="Post" class="submit">
            </form>
        </div>    
    </body>
</html>