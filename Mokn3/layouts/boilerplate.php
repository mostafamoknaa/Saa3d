<?php
include('connect.php');
session_start();
$name=$_SESSION['user_name'];


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dokcpejo1/image/upload/v1648513749/Saa3d/logo-sm.png">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
      <?php
       
        include("C:\AppServ\www\Mokn3\stylesheets\\navbar.css");
      ?>
    </style>
    <title>profile</title>
</head>

<body class="text-center">
    <div class="cover-container mx-auto">
            <div class="row mt-5">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                    <div class="container-fluid">
                        <a class="navbar-brand h6" href="\mokn3/posts/main.php">
                            <img class="navlogo" src="https://res.cloudinary.com/dokcpejo1/image/upload/v1648513749/Saa3d/logo.png" />
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-nav ms-auto">
                          <div class="d-flex">
                                <div class="m-auto">
                                  <a class="nav-link h6" href="\Mokn3/users/profile.php?uid=<?php echo rawurlencode($_SESSION['id']); ?>">
                                    <div class="rounded-circle">
                                      <?php
                                      $img=$_SESSION['gender'];
                                      
                                      if($img=='male'){
                                          echo '<img src="\mokn3/photos\maleavatar.png" class="rounded-circle navpic">';
                                      }
                                      else{
                                        echo '<img src="\mokn3/photos\femaleavatar.jpg" class="rounded-circle navpic">';
                                         
                                      }
                                      ?>
                                      
                                    </div>
                                      <p class="h6 navp"><?php echo $name;?> </p>
                                  </a>
                                </div>
                                <div class="m-auto">
                                    <a class="nav-link" href="\mokn3/posts/newpost.php"><i class="fa fa-plus-circle fa-lg nav-hov"></i></a>
                                </div>
                                
                                
                                <div class="dropdown nav-link m-auto navnotfi">
                                    <i class="fa fa-bell fa-lg nav-hov" data-bs-toggle="dropdown"></i>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="\mokn3/notifications/notification.php">
                                          
                                          alert
                                        </a></li>
                                    </ul>
                                </div>

                                <div class="m-auto">
                                    <a class="nav-link" href="\mokn3/users/settings.php"><i class="fa fa-sliders fa-lg nav-hov"></i></a>
                                </div>

                                <div class="m-auto">
                                    <a class="nav-link" href="\mokn3/users/logout.php"><i class="fa fa-sign-out fa-lg nav-hov"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>    
            </nav>
        </div>
    </div>
   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
