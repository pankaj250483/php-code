<?php 
require_once "connect.php"; 

/*
**********************************
*  CALLING POST SUBMIT BY AJAX FUNCTIONS
*
**********************************
*/

if(isset($_POST['run'])) 
{
 
    $q1="INSERT INTO `user`(`username`, `password`, `fullname`, `dob`, `mobile`,`usertype`,`family_username`) VALUES 
    ('". $_POST["username"] 
    . "', '" . $_POST["password"]  
    . "', '" . $_POST["fullname"]  
    . "', '" . $_POST["dob"]  
    . "', '" . $_POST["mobile"] 
    . "', '" . "master"
    . "', '" . $_POST["username"] 
    . "')";
    if ($conn->query($q1) === TRUE) {
        echo "Your Registration Data added Successfully. <a href='index.php'>Click here</a> to login";
    } else {
        echo "Error in User Registeration. Contact Admin.";
        echo "Error: ". $conn->error;
    }
    return;
}

?>
<html>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!------ Include the above in your HEAD tag ---------->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">

function do_register()
{
 var u=username.value;
 var f=fullname.value;
 var d=dob.value;
 var p=password.value;
 var r=repeatpassword.value;
 var m=mobile.value;
 var run="top";
 res.innerHTML="";
 

 if(p!=r)
 {
    alert("Password & Repeat Password Not Match!!!");
    return;
 }
 
 if(u!="" && p!="" && f!="" && r!="")
 {
          spinner.style.display="block"; 
          $.ajax
          ({
          type:'post',
          url:'adduser.php',
          data:{
           run: run,
           username: u,
           fullname: f,
           password: p,
           dob: d,
           mobile: m
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

    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="pt-4 col-md-6 p-3 border border-1 border-warning bg-white shadow rounded bg-body">
                <div class="text-center">
                    <h1>FAMILY BANKING SYSTEM</h1><br>
                    <h2 class="text-white bg-danger py-2">NEW USER REGISTRATION</h2>
                    <p class="text-danger">For Login existing Users <a href="index.php">Click Here</a></p>
                </div>
                                   
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="username" placeholder="User Name">
                      <label for="PollingStationID">User Name</label>
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="fullname" placeholder="Full Name..">
                      <label for="fullname">Full Name:</label>
                  </div>
                  <div class="row">
                  <div class="form-floating mb-3">
                      <input type="date" class="form-control" id="dob">
                      <label for="fullname" class="ps-4">Date of Birth:</label>
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="mobile" placeholder="Mobile Number..">
                      <label for="mobile">Mobile Number:</label>
                  </div>
                  
                  <div class="col-md-6">
                  <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="password" placeholder="Password">
                      <label for="password">Enter Password:</label>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="repeatpassword" placeholder="Repeat Password">
                      <label for="repeatpassword">Repeat Password:</label>
                  </div>
                  </div>
                  </div>
                  <div class="spinner-border text-primary" role="status" id="spinner">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  
                <div id="res">
                    </div>    
                  <input type="submit" name="login" value="Submit" id="login_button" onclick="do_register()" class="btn btn-primary w-100 mb-3">
    
            </div>
        </div>
    </div>
    
</body>      
</html>      