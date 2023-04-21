<?php 

require_once "header.php"; 
require_once "connect.php"; 


/*
**********************************
*  CALLING POST SUBMIT BY AJAX FUNCTIONS
*
**********************************
*/

if(isset($_POST['run'])) 
{
 
    
    $q1="INSERT INTO `transaction` (`date`, `amount`, `biller`, `user_id`, `autopay`) VALUES 
    ('". $_POST["dt"] 
    . "', '" . $_POST["payamount"]   
    . "', '" . $_POST["billername"]  
    . "', '" . $_SESSION['id'] 
    . "', '" . $_POST["autopayoption"] 
    . "')";
    if ($conn->query($q1) === TRUE) {
        echo "Your Transanction is added Successfully.";
    } else {
        echo "Error in enter your transaction. Contact Admin.";
        echo "Error: ". $conn->error;
    }
    return;
}

?>

<script type="text/javascript">

function do_save()
{
    spinner.style.display="block"; 
 var b=biller.value;
 var d=paydate.value;
 var amt=amount.value;
 var auto=autopay.value;
 var run="top";
 res.innerHTML="";
 
 
 if(b!="" && d!="" && amt!="")
 {
          $.ajax
          ({
          type:'post',
          url:'paybill.php',
          data:{
           run: run,
           billername: b,
           dt: d,
           payamount: amt,
           autopayoption: auto,
            },
              success:function(response) 
              {
                  res.innerHTML=response;
              },
                error: function(response) {
                    alert('Error occured'+response);
                }
          });
         
 }
 else
 {
  alert("Please Fill All The Details");
  spinner.style.display="none"; 

 }
 
 spinner.style.display="none";
 return false;
}
</script>


<style>
    #spinner
    {
        display: none;
        margin: auto;
    }
    
</style>

</head>    
<body class="bg-info">
<?php require_once("nav.php") ?>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="pt-4 col-md-6 p-3 border border-1 border-warning bg-white shadow rounded bg-body">
                <div class="text-center">
                    <h2 class="text-white bg-danger py-2">Pay BIll</h2>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example" id="biller">
                    <option value="Electricity Bill">Electricity Bill</option>
                    <option value="Telephone Bill">Water Bill</option>
                    <option value="Telephone Bill">Internet Bill</option>
                    <option value="Telephone Bill">Other Utlity Bill</option>
                    </select>
                    <label for="id="utype"">Select Biller:</label>
                    </div>
                
                    <div class="form-floating mb-3">
                      <input type="date" class="form-control" id="paydate">
                      <label for="fullname" class="ps-4">Date of Payment:</label>
                  </div>
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="amount" placeholder="User Name">
                      <label for="amount">Enter Amount to Pay</label>
                  </div>

                  <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example" id="autopay">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                     </select>
                    <label for="id="utype"">Set Automatic Monthly Pay Bills:</label>
                 </div>
                  <div class="spinner-border text-primary" role="status" id="spinner">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  
                <div id="res">
                    </div>    
                  <input type="submit" name="login" value="Submit" id="login_button" onclick="do_save()" class="btn btn-primary w-100 mb-3">
    
            </div>
        </div>
    </div>
    
  
       
        
   
     

</body>      
</html>      