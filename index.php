<?php
include('db.php');
if(isset($_GET['key'])){
    $key=mysqli_real_escape_string($conn,$_GET['key']);
    $checkres=mysqli_query($conn,"select status from info where token='$key'");

    if(mysqli_num_rows($checkres)>0){
        $checkrow=mysqli_fetch_assoc($checkres);
       if($checkrow['status']=='1'){
        $sql='SELECT * FROM users_info';
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        
        
        if($count>0){
            
            while($row=mysqli_fetch_assoc($res)){
                $arr[]=$row;
            }
           echo json_encode(['status'=>'true','data'=>$arr,'result'=>'found']);
        
        }
        else{
            echo json_encode(['status'=>'true','data'=>$arr,'result'=>'not found']);
        }
    }else{
        echo json_encode(['status'=>'true','data'=>'please provide valid api']);
    }
       }
    
   
}else{
    echo json_encode(['status'=>'true','data'=>'key is not given']);
}


?>