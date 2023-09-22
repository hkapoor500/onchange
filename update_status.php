<?php
$connect=mysqli_connect("localhost","root","","onchange");



$query=$_POST['id'];

$sql="SELECT `status` FROM `details` WHERE id='".$query."'";

$run=mysqli_query($connect,$sql);
$fetch=mysqli_fetch_object($run);


        $check=$fetch->status;
   
          if($check==0){
          $sql="UPDATE `details` SET status=1 WHERE id='".$query."'";
          $run=mysqli_query($connect,$sql);
          if($run){
          	$result = array(
          		'status'=>'succuss', 
          		'data'=>array('status'=>'1', 'user_id'=>$query)
          	);
          } else {
          	$result = array('status'=>'error', 'error'=>'server error');
          }
         
         }else{
                     
         $sql="UPDATE `details` SET status=0  WHERE  id='".$query."'";
          $run=mysqli_query($connect,$sql);
          if($run){
          	$result = array(
          		'status'=>'succuss', 
          		'data'=>array('status'=>'0', 'user_id'=>$query)
          	);
          } else {
          	$result = array('status'=>'error', 'error'=>'server error');
          }

         }


         echo json_encode($result);
         



        // echo $check;die;  








?>