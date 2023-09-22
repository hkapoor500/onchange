<?php
$connect=mysqli_connect("localhost","root","","onchange");

?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	<title></title>
</head>
<body>


	<table class="table">
		<tr>
			<th>S.No</th>
			<th>Firstname</th>
			<th>Status</th>
		</tr>


		<?php
             
             $sql="SELECT * FROM `details`";
             $i=1;
             $run=mysqli_query($connect,$sql);
              while($fetch=mysqli_fetch_assoc($run)){
              	?>


              	  <tr>
              	  <td><?php echo $i;?></td>
              	  <td> <?php echo $fetch['firstname'];?></td>
              	  <td> <div class="form-check form-switch">
                           <input  type="checkbox" <?php if($fetch['status']==1){ echo 'checked'; } ?>  name="user-status"  data-id="<?php echo $fetch['id'];?>">
                           <div id="status-<?php echo $fetch['id']; ?>"> <?php if($fetch['status']==1){ echo 'Present'; } else { echo 'Abesent'; } ?></div>
                            </div>
              	  </td>

              <?php

              	  $i++;

              }
        
		?>
	</table>
   

</body>
</html>

<script type="text/javascript">
	var users = document.querySelectorAll("input[type=checkbox][name=user-status]");
        users.forEach((user)=>{
            user.addEventListener('change', ()=>{
                var userId = user.dataset.id;
                const formDatap = new FormData();
                formDatap.append('id', userId);
        
                fetch('update_status.php', {
                    method: 'POST',
                    body: formDatap
                })
                .then(response => response.json())
                .then(result => {
                    if(result.status == "succuss"){
                        if(result.data.status == 1){
                           var x = "Present";
                        } else {
                           var x = "Abesent";
                        }
                        document.getElementById(`status-${result.data.user_id}`).innerHTML=x;
                    } else {
                        console.log(result.error);
                    }
                })
                .catch(error => {
                    console.log('Error:', error);
                })
            })
        })




	
</script>