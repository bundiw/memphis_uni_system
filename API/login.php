<?php
require_once 'DbConnect.php';
$response = array();

if(isset($_POST["email"])){
    //select from table applicant or admission
    //email
    //password
    //user type
    $email= $_POST['email'];
    $password= md5($_POST['psw']);
    $user= $_POST['user'];
 
    if ($user == "applicant") {
        $sql ="SELECT `app_id`, `app_email` FROM `applicants` WHERE `app_email`=? AND `app_password`=?";
        $stmt =$conn->prepare($sql);
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $res=$stmt->get_result();

        
        if($res->num_rows > 0){
            $response['error'] = false; 
            $response['message'] = 'Login Success!'; 
            $response['user'] = $res->fetch_assoc(); 

            $response['access'] = 'applicant'; 

        }else{
            
            $response['error'] = true; 
            $response['message'] = 'Logging In Failed, Invalid Credentials!'; 

        }
        $stmt->close();
       
    }else{
        //slect frrom the admission table
        //SELECT `staff_id`, `staff_email`, `staff_password`, `access` FROM `admission` WHERE 1
        $sql ="SELECT `staff_id`, `staff_email`, `access` FROM `admission` WHERE  `staff_email`=? AND  `staff_password`=?";
        $stmt= $conn->prepare($sql);
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $res=$stmt->get_result();

        
        if($res->num_rows > 0){
            $response['error'] = false; 
            $response['message'] = 'Login Success!'; 
             $response['user'] = $res->fetch_assoc(); 
            $response['access'] = 'admission'; 

        }else{
            
            $response['error'] = true; 
            $response['message'] = 'Logging In Failed, Invalid Credentials!';
        }
        $stmt->close();
        
    }
    
    
 

}
echo json_encode($response);
