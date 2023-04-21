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
    $q1="INSERT INTO `debt`(`amount`, `installment`, `title`, `final_dt`, `user_id`) VALUES 
    ('". $_POST["damt"] 
    . "', '" . $_POST["iamt"]   
    . "', '" . $_POST["dtitle"]  
    . "', '" . $_POST["fdt"]  
    . "', '" . $_SESSION['id'] 
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
 var d=debt.value;
 var da=debtamt.value;
 var i=installment.value;
 var fdt=finaldt.value;
 var run="top";
 res.innerHTML="";
 
 if(d!="" && da!="" && i!="" && fdt!="")
 {
          $.ajax
          ({
          type:'post',
          url:'add_debt.php',
          data:{
           run: run,
           dtitle: d,
           damt: da,
           iamt: i,
           fdt: fdt
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
                    <h2 class="text-white bg-danger py-2">Add Pending Debt</h2>
                </div>
                
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="debt" placeholder="Pending Debt Amount..">
                      <label for="debt">Enter Debt Title</label>
                  </div>
                  <div class="form-floating mb-3">
                      <input type="int" class="form-control" id="debtamt" placeholder="Pending Debt Amount..">
                      <label for="debtamt">Pending Debt Amount</label>
                  </div>
                  <div class="form-floating mb-3">
                      <input type="int" class="form-control" id="installment" placeholder="Monthly installment amount..">
                      <label for="installment">Monthly Installment Amount</label>
                  </div>
                  <div class="form-floating mb-3">
                      <input type="date" class="form-control" id="finaldt" placeholder="Final Date of fulfill..">
                      <label for="finaldt">Final Date of fulfill</label>
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