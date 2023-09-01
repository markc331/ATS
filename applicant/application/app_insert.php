<?php 
    include '/Users/mac/Documents/ATS/general/db_connect.php';
    $pid = $_POST['pid'];


    $resume = $_POST['resume'];

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];

    $ptype = $_POST['ptype'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $in = $_POST['in'];
    
    date_default_timezone_set("America/Los_Angeles");
    $date = date("Y-m-d");
    $time = date("h:i:s");

    $sql = "INSERT INTO applicant ( pid, resume, fname, mname, lname, email, ptype, pnumber, linkedin, date, time)
            VALUES('$pid', '$resume', '$fname', '$mname', '$lname', '$email', '$ptype', '$phone', '$in', '$date', '$time')";

    $conn->execute_query($sql);

    $aid_search = "SELECT MAX(aid) 
            FROM applicant ";
    $result = $conn->query($aid_search);
    
    while($row = $result->fetch_assoc()){
        $aid = $row['MAX(aid)'];
    }

    $expcount= $_POST['expcount'];
    $excount = 1;
    do{
        $company = $_POST['company'.$excount.''];
        $title = $_POST['title'.$excount.''];                            
        $sdate = $_POST['sdate'.$excount.''];
        $edate = $_POST['edate'.$excount.''];
        $desc = $_POST['desc'.$excount.''];
        $exp = "INSERT INTO experience (aid, cname ,title, sdate, edate, description)
                VALUES('$aid', '$company', '$title', '$sdate', '$edate', '$desc')";
        $conn->execute_query($exp);
        $excount++;
    }while($excount <= $expcount);

    $educount= $_POST['educount'];
    $edcount = 1;
    do{
        $institution = $_POST['institution'.$edcount.''];
        $degree = $_POST['degree'.$edcount.''];
        $fos = $_POST['fos'.$edcount.''];
        $syear = $_POST['syear'.$edcount.''];
        $eyear = $_POST['eyear'.$edcount.''];
        $edu = "INSERT INTO education (aid, ename, degree, fos, syear, gyear)
                VALUES('$aid', '$institution', '$degree', '$fos', '$syear', '$eyear')";
        $conn->execute_query($edu);
        $edcount++;
    }while($edcount <= $educount);

    $scount = $_POST['scount'];
    $wcount = 1;
    do{
        $site = $_POST['website'.$wcount.''];
        $web = "INSERT INTO website (aid, site)
                VALUES('$aid', '$site')";
        $conn->execute_query($web);
        $wcount++;
    }while($wcount <= $scount);
    $success = urlencode("Application Submitted!<br>Application ID:");
    $aid = urlencode($aid);
    header("Location: http://localhost:3000/applicant/nav/home.php?success=".$success.$aid);
?>