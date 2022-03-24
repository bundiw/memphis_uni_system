<?php
require_once 'DbConnect.php';
$response = array();
//SELECT `adm_id`, `a_id`, `remark`, `status` FROM `admission_status` WHERE 1
$_POST['aid']=26;
if(isset($_POST['aid'])){
   // SELECT `pid`, `aid`, `study_level`, `study_facualty`, `study_programme` FROM `study_programme` WHERE 1
    $sql ="SELECT  `admission_status`.`a_id`, `admission_status`.`remark`, `admission_status`.`status`,`study_programme`.`study_level`,`study_programme`.`study_programme` FROM `admission_status` LEFT JOIN `study_programme` ON `admission_status`.`a_id`= `study_programme`.`aid` WHERE `study_programme`.`aid`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$_POST['aid']);
    $stmt->execute();
    $res=$stmt->get_result();

        
        if($res->num_rows > 0){
            $response['error'] = false; 
            $response['message'] = 'Fetch success!'; 
            $response['admission'] = $res->fetch_assoc(); 

        
        }else{
            
            $response['error'] = true; 
            $response['message'] = 'Fetch Failed!'; 

        }
        $stmt->close();
}
echo json_encode($response);
//INSERT INTO `admission_status`(`adm_id`, `a_id`, `remark`, `status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')