<html>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!------ Include the above in your HEAD tag ---------->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
function do_login()
{
    spinner.style.display="block";
 var u=username.value;
 var ps=password.value;
 res.innerHTML="";
 
 
 if(u!="" && ps!="")
 {
 
  $.ajax
  ({
  type:'post',
  url:'do_login.php',
  data:{
   user: u,
   password: ps,
  },
  success:function(response) {
             
      if(response=="success")
      {
        window.location.href="home.php";
      }
      else
      {
        //$("#loading_spinner").css({"display":"none"});
        res.innerHTML="Username or Password is not correct."+response;
       
      }
    }
  });
 }
 else
 {
  alert("Please Fill All The Details");
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
<body class="bg-primary">

    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="pt-4 col-md-6 p-2 border border-1 border-warning bg-white shadow rounded bg-body">
                <div class="text-center">
                    <h1>FAMILY BANKING SYSTEM</h1><br>
                    <h2 class="text-white bg-warning py-2">Sign In</h2>
                    <p class="text-muted">Only for Admin Login here to access.</p>
                    <p class="text-danger">For Register New Account<a href="adduser.php">Click Here</a></p>
                </div>
                                   
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="username" placeholder="User Name">
                      <label for="PollingStationID">Enter User Name :</label>
                  </div>

                   <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="password" placeholder="Password">
                      <label for="password">Enter Password:</label>
                  </div>
                  <div class="spinner-border text-primary" role="status" id="spinner">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                <div id="res">
                    </div>    
                  <input type="submit" name="login" value="Submit" id="login_button" onclick="do_login()" class="btn btn-primary w-100 mb-3">
                      
            </div>
        </div>
    </div>
    
  
       
        
   
     

</body>      
</html>      