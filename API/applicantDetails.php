<?php
  require_once("DbConnect.php");
  $response =array();


  if (isset($_POST['id'])) {
      # code...
      $sql ="SELECT DISTINCT `applicants`.`app_id`, `personal_info`.a_fname,`personal_info`.a_lname,`personal_info`.a_sname, `personal_info`.a_dob,`personal_info`.a_gender,`personal_info`.a_email,`personal_info`.a_phoneno,`personal_info`.nationality,`personal_info`.city,`personal_info`.zip_addr, `attatchments`.idcard_url,`attatchments`.highschool_file_url,`attatchments`.passport_file_url,`attatchments`.tertiary_file_url,`eduaction_background`.school_level,`eduaction_background`.school_name,`eduaction_background`.city,`eduaction_background`.zip_addr,`eduaction_background`.gpa,`study_programme`.study_level,`study_programme`.study_facualty,`study_programme`.study_programme FROM applicants  LEFT JOIN personal_info ON applicants.app_id= personal_info.a_id  LEFT JOIN eduaction_background ON applicants.app_id= eduaction_background.aid  LEFT JOIN attatchments on applicants.app_id =attatchments.a_id  LEFT JOIN study_programme ON applicants.app_id =study_programme.aid WHERE applicants.app_id=? ";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s",$_POST['id']);
      $stmt->execute();
      $res=$stmt->get_result();
       
        if($res->num_rows > 0){
            $response['error'] = false; 
            $response['message'] = 'Fetch Success!'; 
             $response['info'] = $res->fetch_assoc(); 
            $response['access'] = 'admission'; 

        }else{
            
            $response['error'] = true; 
            $response['message'] = 'Fetch In Failed!';
        }
        $stmt->close();



  }
  echo json_encode($response);