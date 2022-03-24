<?php

require_once 'DbConnect.php';
$response = array();
  
if (isset($_POST['staffid'])) {
    # code...
    //SELECT `app_id`, `app_email`, `app_password`, `access` FROM `applicants` 
    $sql ="SELECT  DISTINCT `applicants`.`app_id`,`applicants`.`app_email`, `personal_info`.`nationality`,`eduaction_background`.`gpa` FROM applicants INNER JOIN personal_info ON applicants.app_id=personal_info.a_id INNER JOIN eduaction_background ON applicants.app_id=eduaction_background.aid WHERE eduaction_background.school_level='highschool'";
    $stmt=$conn->prepare($sql);

    $stmt->execute();
    $res=$stmt->get_result();

        while($assocData = $res->fetch_assoc()) {
                $fetchedData[]=$assocData;
         }
        
        if($res->num_rows > 0){
            $response['error'] = false; 
            $response['message'] = "Fetch Success!"; 
            $response['applicants'] =  $fetchedData; 

        }else{
            
            $response['error'] = true; 
            $response['message'] ='No Application Available!'; 

        }
        $stmt->close();
       

}

echo json_encode($response);