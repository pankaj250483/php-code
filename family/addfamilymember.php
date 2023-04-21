<?php 

require_once "connect.php"; 
require_once "header.php"; 

if ($_SESSION['usertype']<>"master")
{
    echo "Only Master User can add family members.";
    return;
}


/*
**********************************
*  CALLING POST SUBMIT BY AJAX FUNCTIONS
*
**********************************
*/

if(isset($_POST['run'])) 
{
 
    $q1="INSERT INTO `user`(`username`, `password`, `fullname`, `dob`, `mobile`,`usertype`,`family_username`,`limit_amt`) VALUES 
    ('". $_POST["username"] 
    . "', '" . $_POST["password"]  
    . "', '" . $_POST["fullname"]  
    . "', '" . $_POST["dob"]  
    . "', '" . $_POST["mobile"] 
    . "', '" . $_POST["utype"] 
    . "', '" . $_SESSION['username'] 
    . "', '" . $_POST["limit_amt"] 
    . "')";
    if ($conn->query($q1) === TRUE) {
        echo "Your Family Member is added Successfully.";
    } else {
        echo "Error in User Registeration. Contact Admin.";
        echo "Error: ". $conn->error;
    }
    return;
}

?>

<script type="text/javascript">

function do_register()
{
    spinner.style.display="block"; 
 var u=username.value;
 var f=fullname.value;
 var d=dob.value;
 var p=password.value;
 var r=repeatpassword.value;
 var m=mobile.value;
 var ut=utype.value;
 var la=limitamt.value;
 var run="top";
 res.innerHTML="";
 

 if(p!=r)
 {
    alert("Password & Repeat Password Not Match!!!");
    spinner.style.display="none"; 
    return;
 }
 
 if(u!="" && p!="" && f!="" && r!="")
 {
          $.ajax
          ({
          type:'post',
          url:'addfamilymember.php',
          data:{
           run: run,
           username: u,
           fullname: f,
           password: p,
           dob: d,
           mobile: m,
           utype: ut,
           limit_amt: la
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
                    <h2 class="text-white bg-danger py-2">Add FAMILY MEMBER</h2>
                </div>
                                   
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="username" placeholder="User Name">
                      <label for="username">User Name</label>
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="fullname" placeholder="Full Name..">
                      <label for="fullname">Full Name:</label>
                  </div>
                  <div class="row">
                  <div class="form-floating mb-3">
                      <input type="date" class="form-control" id="dob">
                      <label for="dob" class="ps-4">Date of Birth:</label>
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="mobile" placeholder="Mobile Number..">
                      <label for="mobile">Mobile Number:</label>
                  </div>

                  <div class="form-floating mb-3">

                  <select class="form-select" aria-label="Default select example" id="utype">
                    <option value="main">Main User - Parent</option>
                    <option value="sub">Sub User - Childrens</option>
                  </select>
                    <label for="id="utype"">Add Family Member Type:</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="limitamt" placeholder="Limit of spend Amount..">
                      <label for="limitamt">Limit of Spend Amount:</label>
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