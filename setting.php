<?php
include('connect.php');
session_start();
$id=$_SESSION['id'];
$arr=['oldPassword'=>'','newPassword'=>'','confirmNewPassword'=>''];
if(isset($_POST['update'])){
    $oldpass=mysqli_real_escape_string($con,$_POST['oldPassword']);
    $newpass=mysqli_real_escape_string($con,$_POST['newPassword']);
    $conpass=mysqli_real_escape_string($con,$_POST['confirmNewPassword']);
    
    if(empty($oldpass)){
        $arr['oldPassword']="Enter Your PassWord";
    }
    if(empty($newpass)){
        $arr['newPassword']="Enter Your PassWord";
    }
    if(empty($conpass)){
        $arr['confirmNewPassword']="Enter Your PassWord";
    }
    if(!array_filter($arr)){
        $confirm;
        if($newpass===$conpass){
            $ins="UPDATE users SET password ='$newpass' WHERE  user_id=$id";
            $res=mysqli_query($con,$ins);
            if($res){
                $confirm="Your Password Update Successfully";
            }
            else{
                echo 'Error: '. mysqli_error($con);
            }
        }
        else{
            $confirm="The Confirm Password does not mattch the newpassword";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dokcpejo1/image/upload/v1648513749/Saa3d/logo-sm.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        <?php
        include("C:\AppServ\www\saa3d\stylesheets\\font-awesome\css\\font-awesome.min.css");
        include("C:\AppServ\www\saa3d\stylesheets\settings.css");
        ?>
    </style>
    <title>Setting</title>
</head>

<body class="text-center">
    <div class="cover-container mx-auto">
        <main>
            <div class="row mt-5">
                <?php
                include('nav.php');
                ?>
            </div>
            <form class="needs-validation" action="#" method="post">
                <div class="row mt-auto">
      
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
                        <input type="text" class="form-control" name="newPassword" placeholder="New password">
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
                    <div class="row">
                        <span class="col-xs-1 col-md-4">
                            <p style="color: red;"><?php echo $confirm ?></p>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                            <div class="invalid-feedback">
                            Please enter your password.
                            </div>
                        </span>
                    </div>
                </div>
                <button class="btn btn-primary mt-2 submitBtn" type="submit" name="update">
                  Update
                </button>
            </form>
            <script>
                <?php
                include("H:\Saa3d-master\public\javascripts\settings.js");
                ?>
            </script>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>