<?php
date_default_timezone_set('Africa/Cairo');
include('connect.php');
session_start();
include('post.php');
$original_date = $_SESSION['created'];
$timestamp = strtotime($original_date);
$new_date = date("d-m-Y", $timestamp);


?>
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
        include("C:\\AppServ\\www\\saa3d\\stylesheets\\main.css");
        ?>
    </style>    
    <title>main</title>
</head>

<body class="text-center">
    <div class="cover-container mx-auto">
        <main>
            <div class="row mt-5">
                <?php
                include('nav.php');
                ?>
            </div>
            <?php
            $post="SELECT * from posts order by post_id Desc;";
            $result= mysqli_query($con,$post);
            if(mysqli_num_rows($result) > 0){?>
            <?php 
            while($row = mysqli_fetch_assoc($result)){?> 
              <div class="mt-3 col-md-8 col-12">
                <div class="card border-light mb-3">
                  <div class="card-header d-flex justify-content-between">
                    <a href="profile.php?uid=<?php echo rawurlencode($row['user_id']); ?>"><span class="text-danger h5">@<?php
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
                        <a class = "ms-auto" href="comment.php?id=<?php echo rawurlencode($row['post_id']); ?>"><i class="viewIcon fa fa-comments-o fa-2x"></i></a>
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
        <div class="fixed-top row d-none d-md-block mt-5">
          <div class="offset-9 col-3 mt-5 me-5 position-absolute top-0 end-0">
            <div class="mt-4 card border-dark mb-3">
              <div class="card-header bg-transparent border-dark d-flex">
                <div class="h6">User</div>
                <div class="ms-auto h6">Points</div>
            </div>
              <?php
                $sel="select user_name,points,user_id from users order by points DESC limit 10;";
                $res= mysqli_query($con,$sel);
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_assoc($res)){?>
                        <div class="card-footer bg-transparent border-dark d-flex h6 my-auto">
                        <a href="profile.php?uid=<?php echo rawurlencode($row['user_id']); ?>"><span class="text-black h6"><?php echo $row['user_name']?></span></a>
                        <div class="ms-auto h6 my-auto"><?php echo $row['points']?></div>
                      </div>
                    <?php } ?> 
                <?php } ?> 


            </div>
          </div>
        </div>
      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>