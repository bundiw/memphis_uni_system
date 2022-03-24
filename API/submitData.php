<?php
require_once 'DbConnect.php';
$response = array();

//$t=$user['app_email'];
if(isset($_POST['personal'])){

    $user=json_decode($_POST['user']);
    
    //fname=chstian&lname=walker&sname=kelly&dob=1997-06-25&gender=Male&phoneno=2345678&idno=123&email=mathew%40gmail.com
  
    parse_str($_POST['personal'], $personal);
    
    parse_str($_POST['kin'],$kin);
    
    parse_str($_POST['residence'],$residence);
    
    parse_str($_POST['highschool'],$highschool);
    parse_str($_POST['tertiary'],$tertiary);
    //echo json_encode($tertiary);
    parse_str($_POST['programme'],$programme);
    parse_str($_POST['attatchments'],$attatchments);
    // `app_id`, `app_email`
    if($personal != "" && $kin != "" && $residence!=""){
       $sql="INSERT INTO `personal_info` ( `a_id`, `a_fname`, `a_lname`, `a_sname`, `a_dob`, `a_gender`, `a_phoneno`, `a_idno`, `a_email`, `k_relationship`, `k_fname`, `k_lname`, `k_sname`, `k_gender`, `k-phoneno`, `k_idno`, `k_email`, `nationality`, `city`, `zip_addr`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       $stmt =$conn->prepare($sql);
       $stmt->bind_param("ssssssssssssssssssss",$user->app_id,$personal['fname'],$personal['lname'],$personal['sname'],$personal['dob'],$personal['gender'],$personal['phoneno'],$personal['idno'],$personal['email'],$kin['relationship'],$kin['fname'],$kin['lname'],$kin['sname'],$kin['gender'],$kin['phoneno'],$kin['idno'],$kin['email'],$residence['nationality'],$residence['city'],$residence['zip-addr']);
       $stmt->execute();
    //    $r=$stmt->store_result();
       $res=$stmt->store_result();
        
       
        
        if($res > 0){
            $response['error'] = false; 
            $response['message'] = 'New User registered Successfully!'; 
            $response['access'] = 'applicant'; 

        }else{
            
            $response['error'] = true; 
            $response['message'] = 'New user could not be registered!'; 

        }
        $stmt->close();
        
      
    }else{
        $response['error'] = true; 
        $response['message'] = 'All fields section in personal Info must be filled!'; 
    }
    if($highschool!="" ){
        $sql = "INSERT INTO `eduaction_background`( `aid`, `school_level`, `school_name`, `city`, `town`, `zip_addr`, `gpa`) VALUES (?,?,?,?,?,?,?)";
       $stmt=$conn->prepare($sql);
       $level ="Highschool";
        $stmt->bind_param("sssssss",$user->app_id,$level,$highschool['school'],$highschool['city'],$highschool['town'],$highschool['zip-addr'],$highschool['gpa']);
      
       $stmt->execute();
       $res=$stmt->store_result();
        
       
        
        if($res > 0){
            $response['error'] = false; 
            $response['message'] = 'New User registered Successfully!'; 
            $response['access'] = 'applicant'; 

        }else{
            
            $response['error'] = true; 
            $response['message'] = 'New user could not be registered!'; 

        }
        $stmt->close();

    }else{
        $response['error'] = true; 
        $response['message'] = 'Highschool section must be filled!';
    }
    if( $tertiary!="" ){
        $sql = "INSERT INTO `eduaction_background`( `aid`, `school_level`, `school_name`, `city`, `town`, `zip_addr`, `gpa`) VALUES (?,?,?,?,?,?,?)";
       $stmt=$conn->prepare($sql);
       
       $stmt->bind_param("sssssss",$user->app_id,$tertiary['level'],$tertiary['school'],$tertiary['city'],$tertiary['town'],$tertiary['zip-addr'],$tertiary['gpa']);
    
       $stmt->execute();
       $res=$stmt->store_result();
        
       
        
        if($res > 0){
            $response['error'] = false; 
            $response['message'] = 'New User registered Successfully!'; 
            $response['access'] = 'applicant'; 

        }else{
            
            $response['error'] = true; 
            $response['message'] = 'New user could not be registered!'; 

        }
        $stmt->close();

    }else{
        $response['error'] = true; 
        $response['message'] = 'Highschool section must be filled!';
    }
    if ($programme!="") {
        # code...
        //INSERT INTO `study_programme`(`pid`, `aid`, `study_level`, `study_facualty`, `study_programme`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
      $sql = "INSERT INTO `study_programme`( `aid`, `study_level`, `study_facualty`, `study_programme`) VALUES (?,?,?,?)";
       $stmt=$conn->prepare($sql);
       //study-level=diploma&study-faculty=social%20science&social-science=criminalogy&physical-science=&arts=&technology=&business=
      
       $study_course =str_replace(" ","-",$programme["study-faculty"]);
       
       echo $programme[$study_course];
       $stmt->bind_param("ssss",$user->app_id,$programme["study-level"],$programme["study-faculty"],$programme[$study_course]);
       $stmt->execute();
       $res=$stmt->store_result();
        
       
        
        if($res > 0){
            $response['error'] = false; 
            $response['message'] = 'New User registered Successfully!'; 
            $response['access'] = 'applicant'; 

        }else{
            
            $response['error'] = true; 
            $response['message'] = 'New user could not be registered!'; 

        }
        $stmt->close();

    }else{
        $response['error'] = true; 
        $response['message'] = 'Programme section must be filled!';

    }
    // if ($attatchments!="") {
        
    // }else {
        
    // }
    
}
echo json_encode($response);
/*

highschool:highschool,
tertiary:tertiary,
programme:programme,
attatchments:attatchments

*/ 