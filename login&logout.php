<?php
include('connect.php');
session_start();
$arr=['rusername'=>'','remail'=>'','rpassword'=>'','rcity'=>'','gender'=>''];
if(isset($_POST['register'])){
    $user=mysqli_real_escape_string($con,$_POST['rusername']);
    $email=mysqli_real_escape_string($con,$_POST['remail']);
    $pass=mysqli_real_escape_string($con,$_POST['rpassword']);
    $city=mysqli_real_escape_string($con,$_POST['rcity']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);

    if(empty($user)){
        $arr['rusername']="Please Enter Your Name";
    }
    if(empty($email)){
        $arr['remail']="Please Enter Your e-mamil";
    }
    if(empty($pass)){
        $arr['rpassword']="Please Enter Your PassWord";
    }
    if(empty($city)){
        $arr['rcity']="Please Enter Your City";
    }
    if(empty($gender)){
        $arr['gender']="Please Enter Your Gender";
    }
    if(!array_filter($arr)){
        $ins="INSERT INTO users (user_name,e_mail,password,gender,address) VALUES ('$user','$email','$pass','$gender','$city')";
        $res=mysqli_query($con,$ins);
        if($res){
            $sql="select * from users;";
            $rslt= mysqli_query($con,$sql);
            if($rslt){
                $users = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
                foreach($users as $std){
                    if($std['user_name'] === $user && $std['password'] === $pass){
                            $_SESSION['user_name']=$std['user_name'];
                            $_SESSION['password']=$std['password'];
                            $_SESSION['id']= $std['user_id'];
                            $_SESSION['add']= $std['address'];
                            $_SESSION['point']= $std['points'];
                            $_SESSION['services']= $std['no_services'];
                            $_SESSION['register']= $std['register_at'];
                            $_SESSION['gender']= $std['gender'];
                            header("Location:main.php");
                            $go = 1;
                    }
                }
            }
        }else{
            echo 'Error: '. mysqli_error($con);
        }
    }

}
?>
<?php
include('connect.php');
session_start();
$log=['username'=>'','password'=>''];
if(isset($_POST['Login'])){
    $user1=mysqli_real_escape_string($con,$_POST['username']);
    $pass1=mysqli_real_escape_string($con,$_POST['password']);
    if(empty($user)){
        $log['username']="Please Enter Your Name";
    }
    if(empty($pass)){
        $log['gender']="Please Enter Your PassWord";
    }
    if(!array_filter($log)){
        $sql="select * from users;";
        $res= mysqli_query($con,$sql);
        if($res){
            $users = mysqli_fetch_all($res,MYSQLI_ASSOC);
            foreach($users as $std){
                if($std['user_name'] === $user1 && $std['password'] === $pass1){
                        $_SESSION['user_name']=$std['user_name'];
                        $_SESSION['password']=$std['password'];
                        $_SESSION['id']= $std['user_id'];
                        $_SESSION['add']= $std['address'];
                        $_SESSION['point']= $std['points'];
                        $_SESSION['services']= $std['no_services'];
                        $_SESSION['register']= $std['register_at'];
                        $_SESSION['gender']= $std['gender'];
                        header("Location:main.php");
                        $go = 1;
                }
            }
        }
	    }else{
            echo 'Error: '. mysqli_error($con);
        }
        if($c==0){
            $error = "Your Login Name or Password is invalid";
            
        }
                
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>log in or sign up</title>
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dokcpejo1/image/upload/v1648513749/Saa3d/logo-sm.png">
    <style>
        <?php
           include("C:\AppServ\www\Mokn3\stylesheets\login&signup.css");
           include("C:\AppServ\www\Mokn3\stylesheets\\font-awesome\css\\font-awesome.min.css");
        ?>

    </style>
    
</head>

<body class="d-flex text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 mx-auto flex-column position-relative">

        <div class="mt-5 me-5 d-none d-md-block position-absolute top-0 end-0">
            <img class="logo" src="https://res.cloudinary.com/dokcpejo1/image/upload/v1648513749/Saa3d/logo.png" />
            <div class="d-none d-md-block position-absolute top-10 end-0 text-center">
                <p class="h6 text-uppercase">The best way to find yourself is to lose yourself in the service of others.</p>
                <p class="text-uppercase fw-lighter">- Dr.Mostafa Kamel</p>
            </div>
        </div>
        <main class="mt-5">
            <div class="row">
                <span class="col-xs-1 col-md-2">
                    <a class="logInBtn btn btn-lg btn-block selected">Log In</a>
                        </span>
                <span class="col-xs-1 col-md-2">
                        <a class= "signUpBtn btn btn-lg btn-block selected">Sign Up</a>
                </span>
            </div>

            <form class="row needs-validation" action="#" method="post">
                <section class="signUp" style="display:block">
                    <div class="row">
                        <span class="col-xs-1 col-md-4">
                            <input type="text" class="form-control signInput" name="rusername" placeholder="User name"required >
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                            <div class="invalid-feedback">
                            Please choose a username.
                            </div>
                        </span>
                        </div>

                            <div class="row">
                                <span class="col-xs-1 col-md-4">
                                    <input type="email" class="form-control signInput" name="remail" placeholder="Email"required>
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                                </span>
                             </div>

                        <div class="row">
                            <span class="col-xs-1 col-md-4">
                                <input type="password" class="form-control signInput" name="rpassword" placeholder="Password" required>
                                <div class="valid-feedback">
                                Looks good!
                                </div>
                                <div class="invalid-feedback">
                                Please enter a strong password.
                                </div>
                            </span>
                        </div>

                        <div class="row">
                            <span class="col-xs-1 col-md-4">
                                <input type="password" class="form-control signInput" name="confirmPassword" placeholder="Confirm password"required >
                                <div class="valid-feedback">
                                Looks good!
                                </div>
                                <div class="invalid-feedback">
                                Please confirm the password.
                                </div>
                            </span>
                        </div>

                        <div class="row">
                            <span class="col-xs-1 col-md-4">
                                <input type="text" class="form-control signInput" name="rcity" placeholder="City"required >
                                <div class="valid-feedback">
                                Looks good!
                                </div>
                                <div class="invalid-feedback">
                                Please confirm the password.
                                </div>
                            </span>
                        </div>

                        <div class="row">
                            <span class="col-xs-1 col-md-4">
                                <select class="form-control" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                </select>
                            </span>
                        </div>


                        <div class="row">
                            <span class="col-xs-1 col-md-4">
                                <input class="btn btn-lg btn-success"  type="submit" value="Sign Up" name="register" >
                            </span>
                        </div>
                </section>


                <section class="logIn" style="display:none">
                    <div class="row">
                        <span class="col-xs-1 col-md-4">
                            <input type="text" name = "username" class="form-control logInput" placeholder="User name">
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                            <div class="invalid-feedback">
                            Please enter your username.
                            </div>
                        </span>
                    </div>

                    <div class="row">
                        <span class="col-xs-1 col-md-4">
                            <input type="password" name = "password" class="form-control logInput" placeholder="Password">
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                            <div class="invalid-feedback">
                            Please enter your password.
                            </div>
                        </span>
                    </div>
                    <div class="row">
                        <span class="col-xs-1 col-md-4">
                            <p style="color: red;"><?php echo $error ?></p>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                            <div class="invalid-feedback">
                            Please enter your password.
                            </div>
                        </span>
                    </div>

                    <div class="row">
                        <span class="col-xs-1 col-md-4">
                            <input class="btn btn-lg btn-success" type="submit" value="Login" name="Login">
                        </span>
                    </div>
                </section>
            </form>
        </main>

        <footer class="mt-auto text-white-50">
            <p class="h6">&copy; Saa3d-2022</p>
        </footer>
        </div>
        <script>
            <?php include("C:\AppServ\www\Mokn3\javascripts\login&signup.js") ?>
        </script>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>