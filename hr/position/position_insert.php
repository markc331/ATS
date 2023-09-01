<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';


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
    $desc = $_POST['desc'];

    date_default_timezone_set("America/Los_Angeles");
    $date = date("Y-m-d");
    $time = date("h:i:s");

    $sql = "INSERT INTO position (title, type, level, wlocation, location, sshift, eshift, sday,
                                    eday, min, max, description, time, date)
            VALUES('$title', '$type', '$level', '$wloc', '$loc', '$sshift', '$eshift', '$sday',
                    '$eday', '$min', '$max', '$desc', '$time', '$date')";
    $conn->execute_query($sql);


    $pid_search = "SELECT MAX(pid) 
            FROM position ";
    $result = $conn->query($pid_search);
    
    while($row = $result->fetch_assoc()){
        $pid = $row['MAX(pid)'];
    }
    
    $bcount= $_POST['bcount'];
    $bencount = 1;
    do{
        $benefit = $_POST['benefit'.$bencount.''];
        $ben = "INSERT INTO benefits (benefit, pid)
                VALUES('$benefit', '$pid')";
        $conn->execute_query($ben);
        $bencount++;
    }while($bencount <= $bcount);

    $qcount = $_POST['qcount'];
    $qualcount = 1;
    do{
        $qual = $_POST['qual'.$qualcount.''];
        $quality = "INSERT INTO qualifications (qualification, pid)
                VALUES('$qual', '$pid')";
        $conn->execute_query($quality);
        $qualcount++;
    }while($qualcount <= $qcount);

    $scount = $_POST['scount'];
    $skillcount = 1;
    do{
        $skill = $_POST['skill'.$skillcount.''];
        $sk = "INSERT INTO skills (skill, pid)
                VALUES('$skill', '$pid')";
        $conn->execute_query($sk);
        $skillcount++;
    }while($skillcount <= $scount);

    $rcount = $_POST['rcount'];
    $respcount = 1;
    do{
        $resp = $_POST['resp'.$respcount.''];
        $responsibility = "INSERT INTO responsibilities (responsibility, pid)
                VALUES('$resp', '$pid')";
        $conn->execute_query($responsibility);
        $respcount++;
    }while($respcount <= $rcount);

    $rqcount = $_POST['rqcount'];
    $reqcount = 1;
    do{
        $req = $_POST['req'.$reqcount.''];
        $requirement = "INSERT INTO requirments (requirment, pid)
                VALUES('$req', '$pid')";
        $conn->execute_query($requirement);
        $reqcount++;
    }while($reqcount <= $rqcount);

    $tcount = $_POST['tcount'];
    $travelcount = 1;
    do{
        $travel = $_POST['travel'.$travelcount.''];
        $trav = "INSERT INTO travel (travel, pid)
                VALUES('$travel', '$pid')";
        $conn->execute_query($trav);
        $travelcount++;
    }while($travelcount <= $tcount);

    $ccount = $_POST['ccount'];
    $clearcount = 1;
    do{
        $clearance= $_POST['clearance'.$clearcount.''];
        $clear = "INSERT INTO clearance (clearance, pid)
                VALUES('$clearance', '$pid')";
        $conn->execute_query($clear);
        $clearcount++;
    }while($clearcount <= $ccount);

    $pcount = $_POST['pcount'];
    $physcount = 1;
    do{
        $phys = $_POST['phys'.$physcount.''];
        $physical = "INSERT INTO phys (phys_req, pid)
                VALUES('$phys', '$pid')";
        $conn->execute_query($physical);
        $physcount++;
    }while($physcount <= $pcount);

    $success = urlencode("Position Posted");
    header("Location: http://localhost:3000/hr/nav/home.php?success=".$success);
?>