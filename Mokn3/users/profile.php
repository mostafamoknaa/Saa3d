
<?php
include('C:\AppServ\www\Mokn3\connect.php');
session_start();
$name=$_SESSION['user_name'];
$original_date = $user['register_at'];
$timestamp = strtotime($original_date);
$new_date = date("d-m-Y", $timestamp);
$uid=$_GET['uid'];
$id=$_SESSION['id'];
?>
<style>
    <?php
    include('C:\AppServ\www\Mokn3\stylesheets\profile.css');
    ?>
</style>
<?php include('C:\AppServ\www\Mokn3\layouts\boilerplate.php');?>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-center">
                        <div class="row">
                        <?php
                            
                            $sel="SELECT * from users WHERE user_id = $uid;";
                            $res= mysqli_query($con,$sel);
                            if(mysqli_num_rows($res)>0){
                                while($user = mysqli_fetch_assoc($res)){
                                    $img=$user['gender'];
                                    if($img=='male'){
                                       echo' <img class="profileImg rounded-circle mx-auto" src="\mokn3/photos\maleavatar.png" />';
                                    }
                                    else{
                                        echo '<img src="\mokn3/photos\femaleavatar.jpg" class="profileImg rounded-circle mx-auto">';
                                                 
                                    }
                        ?>
                        <div class="d-flex justify-content-center">
                            <i class="<%= user.isOnline? 'online':'offline'  %>  fa fa-circle"></i>
                            <p class="mx-1 h4"> <?php  echo $user['user_name'];?></p>
                        </div>
                            
                        
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="row card-body">
                <div class="col-6 col-md-3">
                    <i class="fa fa-home fa-lg"></i>
                    <p class="h5"><?php  echo $user['address'];?></p>
                </div>
                <div class="col-6 col-md-3">
                     
                <p class="h5">Points: <?php  echo $user['points'];?></p>
                </div>
                <div class="col-6 col-md-3">
                    <i class="fa fa-cogs fa-lg "></i>
                    <p class="h5">Services: <?php echo $user['no_services']?></p>
                </div>
                <div class="col-6 col-md-3">
                    <i class="fa fa-calendar fa-lg "></i>
                    
                    <p class="h5">Joined:
                         <?php 
                         $original_date = $user['register_at'];
                         $timestamp = strtotime($original_date);
                         $new_date = date("d-m-Y", $timestamp);
                         echo $new_date; 
                         ?>
                    </p>
                </div>              
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dokcpejo1/image/upload/v1648513749/Saa3d/logo-sm.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        <?php
        include("C:\AppServ\www\Mokn3\stylesheets\main.css");
        ?>
    </style>    
    <title>main</title>
</head>

<body class="text-center">
    <div class="cover-container mx-auto">
        <main>
            <div class="row mt-5">
                <?php
                   include('C:\AppServ\www\Mokn3\layouts\boilerplate.php');
                ?>
            </div>
            <?php
            $post="SELECT * from posts WHERE user_id=$uid order by post_id Desc;";
            $result= mysqli_query($con,$post);
            if(mysqli_num_rows($result) > 0){?>
            <?php 
            while($row = mysqli_fetch_assoc($result)){?> 
              <div class="mt-3 col-md-8 col-12">
                <div class="card border-light mb-3">
                  <div class="card-header d-flex justify-content-between">
                    <a href="\Mokn3/users/profile.php?uid=<?php echo rawurlencode($row['user_id']); ?>"><span class="text-danger h5">@<?php
                    $user_id=$row['user_id'];
                    $user_name="SELECT user_name FROM users WHERE user_id=$user_id;";
                    $qry_data = mysqli_query($con, $user_name);
                    $approve_count = mysqli_fetch_array($qry_data);
                    $user = array_shift($approve_count);
                    echo $user;
                    ?></span></a>
                    <?php 
                    
                    $original_date = $row['created_at'];
                    $timestamp = strtotime($original_date);
                    $new_date = date("d-m-Y", $timestamp);
                    echo $new_date;
                    ?> 
                  </div>
                  <div class="card-body">
                    <h5 class="card-title d-flex border-bottom display-6"><?php echo $row['post_name'];?></h5>
                    <p class="card-text h6"><?php echo $row['content'];?></p>
                  </div>
                  <div class="card-footer d-flex">
                      <div class="mx-auto">
                          <i class="pointIcon fa fa-star fa-lg"></i>
                          <p class="h5"><?php echo $row['points'];?></p>
                      </div>
                      <div class="mx-auto">
                        <a class = "ms-auto" href="\mokn3/posts/posts.php?id=<?php echo rawurlencode($row['post_id']); ?>"><i class="viewIcon fa fa-comments-o fa-2x"></i></a>
                      </div>
                      <div class="mx-auto">
                          <i class="locationIcon fa fa-map-marker fa-lg ms-auto"></i>
                          <p class="h5">
                            <?php
                                $user_id=$row['user_id'];
                                $user_name="SELECT address FROM users WHERE user_id=$user_id;";
                                $qry_data = mysqli_query($con, $user_name);
                                $approve_count = mysqli_fetch_array($qry_data);
                                $add = array_shift($approve_count);
                                echo $add;
                          
                          ?></p>
                      </div>              
                  </div>
                </div>
              </div>
          <?php }?>
          
        <?php } ?> 
        </div>
        
          </div>
        </div>
      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
