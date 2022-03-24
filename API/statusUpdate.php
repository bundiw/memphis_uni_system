<?php
require_once 'DbConnect.php';
$response = array();
//SELECT `adm_id`, `a_id`, `remark`, `status` FROM `admission_status` WHERE 1
if(isset($_POST['remark'])){
    $sql ="INSERT INTO `admission_status`(`a_id`, `remark`, `status`) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",$_POST['id'],$_POST['remark'],$_POST['status']);
    $stmt->execute();
      $res=$stmt->store_result();
        
        
        if( $res > 0){
            $response['error'] = false; 
            $response['message'] = 'State Added Success!'; 
           

        
        }else{
            
            $response['error'] = true; 
            $response['message'] = 'State Could not be Added'; 

        }
        $stmt->close();
}
echo json_encode($response);
