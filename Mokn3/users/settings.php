<?php
include('C:\AppServ\www\Mokn3\connect.php');
session_start();
$name=$_SESSION['user_name'];
$id=$_SESSION['id'];
$arr=['oldPassword'=>'','newPassword'=>''];
if(isset($_POST['update'])){
    $old=mysqli_real_escape_string($con,$_POST['oldPassword']);
    $new=mysqli_real_escape_string($con,$_POST['newPassword']);
    
    if(empty($old)){
        $arr['oldPassword']="Please Enter Your oldPassword";
    }
    if(empty($new)){
        $arr['newPassword']="Please Enter Your e-newPassword";
    }
    if(!array_filter($arr)){
        if($_SESSION['password']===$old){
            $id=$_SESSION['id'];
            $inedit="update users set password='$new' where user_id='$id';";
            $res=mysqli_query($con,$inedit);
            if(!$res){
                echo "baaaaaaaaaaad";
            }
            else{
                $_SESSION['password']=$new;
                header("location:\mokn3/posts/main.php");
            }
        }else{
            $error="please enter correct password";
        }


                
    }
}
echo $name;
?>
<style>
  <?php include("C:\AppServ\www\Mokn3\stylesheets\settings.css"); ?>
</style>
<?php include('C:\AppServ\www\Mokn3\layouts\boilerplate.php');?>
<form class="needs-validation" action="" method="POST" novalidate enctype="multipart/form-data">
        <div class="row mt-auto">

            <div class="col-12 mt-5">
            </div>

            <div class="col-12 mt-2">
                
                <input type="text" class="form-control" name="oldPassword" placeholder="Old password">
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>

            <div class="col-12 mt-2">
            
                <input type="text" class="form-control" name="newPassword" placeholder="New Password">
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>

            <div class="col-12 mt-2">
                <input type="text" class="form-control" name="confirmNewPassword" placeholder="Confirm password">
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="row">
                        <span class="col-xs-1 col-md-4">
                            <p style="color: red;"><?php echo $error; ?></p>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                            <div class="invalid-feedback">
                            Please enter your password.
                            </div>
                        </span>
        </div>
        <button class="btn btn-primary mt-2 submitBtn" type="submit" name="update">
      Update
      <span class="spinner-border spinner-border-sm d-none"> </span>
    </button>
    </form>
<script>
  <?php include("C:\AppServ\www\Mokn3\javascripts\settings.js") ?>
</script>
