<?php
$url="http://localhost/phplogin/index.php";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);
// echo $result;
if(isset($result['status']))
{
    
    if($result['status']==true){
        
        if(isset($result['result'])){
           
            if($result['result']==true){
echo "<pre>";
print_r($result['data']);
            }
        }
    }
}
else{
    echo "Not Found";
}
?>