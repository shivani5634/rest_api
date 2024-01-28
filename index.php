<?php
include('db.php');
if(isset($_GET['key'])){
    $key=mysqli_real_escape_string($conn,$_GET['key']);
    $checkres=mysqli_query($conn,"select * from info where token='$key'");

    if(mysqli_num_rows($checkres)>0){
        $checkrow=mysqli_fetch_assoc($checkres);
       if($checkrow['status']=='1'){
        if($checkrow['hit_limit']>$checkrow['hit_count']){
            mysqli_query($conn,"update info set hit_count=hit_count+1 where token='$key'");
           
        }else{
            echo json_encode(['status'=>'true','data'=>'hit count & hit limit exceeded']); die();
        }
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