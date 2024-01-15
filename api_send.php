<?php
$url="http://localhost/phplogin/index.php";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);
// echo $result;die();
if(isset($result['status']))
{
    
    if($result['status']==true){
        
        if(isset($result['result'])){
           
            if($result['result']==true){?>
                <!-- // echo "<pre>";
                // print_r($result['data']); -->
           <table class="table table-light">
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                </tr>
                <?php foreach($result['data'] as $item){?>
<tr><td><?php echo $item['id']?></td>
<td><?php echo $item['name']?></td>
<td><?php echo $item['email']?></td></tr>
                    <?php }?>
            </tbody>
           </table>
            <?php }
        }
    }
}
else{
    echo "Not Found";
}
?>