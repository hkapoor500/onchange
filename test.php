
<!-- <script>
var users = document.querySelectorAll("input[type=checkbox][name=user-status]");
        users.forEach((user)=>{
            user.addEventListener('change', ()=>{
                var userId = user.dataset.id;
                const formDatap = new FormData();
                formDatap.append('user_id', userId);
        
                fetch('fetch/change-user-status.php', {
                    method: 'POST',
                    body: formDatap
                })
                .then(response => response.json())
                .then(result => {
                    if(result.status == "succuss"){
                        if(result.data.status == 1){
                           var x = "Active";
                        } else {
                           var x = "Blocked";
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


        </script> -->

<script type="text/javascript">
        $(document).ready(function() {

$('#continent').on('change', function() {
  var continent_id = $(this).val();
  $.ajax({
    url: "files/ajax.php",
    method: "POST",
    data: {
      continent_id: continent_id
    },
    dataType: "html",
    cache: false,
    success: function(data){
    $("#country").html(data);
    }
  });
});    
});

</script>