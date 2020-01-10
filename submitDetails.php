<?php


/* var_dump($_POST); */
$servername = "111.118.215.168";
$username = "aaditikc_rastm_n";
$password = "#2^7rQgr~&mi";
$dbname = "aaditikc_rastm_paper";
// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    extract($_POST);

    $target_dir    = $_SERVER['DOCUMENT_ROOT'] . '/papper/Uploads/';
    $target_file   = $target_dir . basename($_FILES["r_file"]["name"]);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["r_file"]["tmp_name"], $target_file);


    $r_id = substr(uniqid(), 0, 10);
    $subm_id = substr(uniqid(), 0, 10);
    /* if($r_alt_email == ''){
        if($r_alt_mob == '')
        {
            $query1 = "INSERT into `researcher_info` (researcher_id, r_name, designation, qualification, organisation, email, mobile, r_address, country, r_state, city, postalCode) VALUES ('$r_id','$r_username','$r_designation','$r_qual','$r_org','$r_email','$r_mobile', '$r_address', '$r_country', '$r_state', '$r_city', '$r_pincode')";
        }
        else
        {
            $query1 = "INSERT into `researcher_info` (researcher_id, r_name, designation, qualification, organisation, email, mobile, alt_mobile, r_address, country, r_state, city, postalCode) VALUES ('$r_id','$r_username','$r_designation','$r_qual','$r_org','$r_email','$r_mobile','$r_alt_mobile', '$r_address', '$r_country', '$r_state', '$r_city', '$r_pincode')";
        }
    }
    else if($r_alt_mob == '')
    {
        if($r_alt_email == '')
        {
            $query1 = "INSERT into `researcher_info` (researcher_id, r_name, designation, qualification, organisation, email, mobile, r_address, country, r_state, city, postalCode) VALUES ('$r_id','$r_username','$r_designation','$r_qual','$r_org','$r_email','$r_mobile', '$r_address', '$r_country', '$r_state', '$r_city', '$r_pincode')";
        }
        else
        {
            $query1 = "INSERT into `researcher_info` (researcher_id, r_name, designation, qualification, organisation, email, mobile, alt_email, r_address, country, r_state, city, postalCode) VALUES ('$r_id','$r_username','$r_designation','$r_qual','$r_org','$r_email','$r_mobile','$r_alt_email', '$r_address', '$r_country', '$r_state', '$r_city', '$r_pincode')";
        }
    }
    else
    {
        $query1 = "INSERT into `researcher_info` (researcher_id, r_name, designation, qualification, organisation, email, mobile, alt_email, alt_mobile, r_address, country, r_state, city, postalCode) VALUES ('$r_id','$r_username','$r_designation','$r_qual','$r_org','$r_email','$r_mobile', '$r_alt_email', '$r_alt_mob', '$r_address', '$r_country', '$r_state', '$r_city', '$r_pincode')";
    } */
    $query1 = "INSERT into `researcher_info` (researcher_id, r_name, designation, qualification, organisation, email, mobile, alt_email, alt_mobile, r_address, country, r_state, city, postalCode) VALUES ('$r_id','$r_username','$r_designation','$r_qual','$r_org','$r_email','$r_mobile', '$r_alt_email', '$r_alt_mob', '$r_address', '$r_country', '$r_state', '$r_city', '$r_pincode')";
    $query2 = "INSERT into `submissions` (submission_id, researcher_id, title,abstract, no_of_pages, No_of_authors, submission_track, submission_assets) VALUES ('$subm_id', '$r_id', '$r_title', '$r_abstract', '$r_pages','$r_author_count','$r_track', '$target_file')";


    $result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
    if ($result1) {
        $result2 = mysqli_query($con,$query2);
        if ($result2) {
            if($r_author_count)
            {
                $flag = 0;
                for ($i = 0; $i < $r_author_count; $i++) {
                    $auth_id = substr(uniqid(), 0, 10);
                    $name = $authName[$i];
                    $institute = $authInstitute[$i];
                    $desig = $authDesi[$i];
                    $email = $authEmail[$i];
                    $mob = $authMobile[$i];
                    $query3 = "INSERT into `authors` (author_id, author_name, author_designation, author_organisation, author_email, author_mobile, submission_id) VALUES ('$auth_id','$name','$desig','$institute','$email','$mob','$subm_id')";
                    $result3 = mysqli_query($con, $query3);
                    
                    if ($result3) {
                        $flag = 1;
                    } else {
                        $flag = 0;
                        header("Location: ./paper_submission.php");
                        echo "<script type='text/javascript'>alert('{
                            status:404,
                            msg:Error adding some author}');</script>
                        ";
                        
    /*                    echo '<script language="javascript">';
                        echo 'alert("message successfully sent")';
                        echo '</script>';
    */               }
                }
                if ($flag == 1) {
                    header("Location: ./success.html");
                } else {
                    header("Location: ./paper_submission.php");
                    echo '<script type="text/javascript">alert("{
                        "status":"404",
                        "msg":"Error adding Authors"}")</script>
                    ';
                }
            }
            else{
                header("Location: ./success.html");
            }
        } else {
            echo '<script type="text/javascript">alert("{
                "status":"404",
                "msg":"Error in submission"}")</script>
            ';
        }
    } else {
        header("Location: ./paper_submission.php");
        echo '<script type="text/javascript">alert("{
            "status":"404",
            "msg":"Error adding Researcher"}")</script>
        ';
    }
}
