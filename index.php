<?php
include('db.php');
$sql='SELECT * FROM users_info';
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
// $result=mysqli_fetch_assoc($res);

if($count>0){
    // $result=mysqli_fetch_assoc($res);
    while($row=mysqli_fetch_assoc($res)){
     
        $arr[]=$row;
    }
   echo json_encode(['status'=>'true','data'=>$arr,'result'=>'found']);
// echo '<pre>';
// print_r($arr);
// echo '</pre>';
}
else{
    echo json_encode(['status'=>'true','data'=>$arr,'result'=>'not found']);
}
// if($conn){
//     echo "Connection successfully!";
// }
// else{
//     echo "connection failed";
// }
?>