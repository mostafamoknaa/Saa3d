<?php

session_start();





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
        include("C:\AppServ\www\saa3d\stylesheets\profile.css");
        ?>
    </style>    
    <title>profile</title>
</head>

<body class="text-center">
    <div class="cover-container mx-auto">
        <main>
            <div class="row mt-5">
                <?php
                include('nav.php');
                ?>
            </div>    

    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-center">
                    <div class="row">
                        <?php
                        $user_id=$_GET['uid'];
                        $sel="SELECT * from users WHERE user_id = $user_id;";
                        $res= mysqli_query($con,$sel);
                        if(mysqli_num_rows($res)>0){
                            while($user = mysqli_fetch_assoc($res)){
                            if($user['gender']=="male"){
                                echo '<img src="maleavatar.png" class="profileImg rounded-circle mx-auto" alt="image">';
                            }else{
                                echo '<img src="femaleavatar.jpg" class="profileImg rounded-circle mx-auto" alt="image">';
                            }                                 
                        ?>
                        
                        <div class="d-flex justify-content-center">
                            <i class="onlineIcon fa fa-circle"></i>
                            <p class="mx-1 h4"><?php  echo $user['user_name'];?></p>
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

                <i class="starIcon fa fa-star fa-lg"></i>

                <p class="h5">Points: <?php  echo $user['points'];?></p>
            </div>
            <div class="col-6 col-md-3">
                <i class="fa fa-cogs fa-lg "></i>
                <p class="h5">Services: <?php
                $ser="SELECT count(do_service) FROM services WHERE do_service =$user_id and status=1;";
                $ser_data = mysqli_query($con, $ser);
                $_count = mysqli_fetch_array($ser_data);
                $service = array_shift($_count);
                echo $service;
                ?></p>
            </div>
            <div class="col-6 col-md-3">
                <i class="fa fa-calendar fa-lg "></i>
                <?php
                $original_date = $user['register_at'];
                $timestamp = strtotime($original_date);
                $new_date = date("d-m-Y", $timestamp);
                ?>
                <p class="h5">Joined: <?php  echo $new_date;?></p>
            </div>
        </div>
    </div>
    <?php }?>
    <?php }?>
    <?php
     $ser_sql="SELECT * FROM services WHERE do_service =$user_id;";
     $result = mysqli_query($con, $ser_sql);
     if(mysqli_num_rows($result) > 0){?>
     <?php 
     while($services = mysqli_fetch_assoc($result)){?> 
             <?php if($services['status']==1){ ?> 
                <div class="card text-white bg-success mb-3 offset-1 col-10">
                    <div class="card-header d-flex justify-content-between">
                    <?php
                    $pservice=$services['post_user'];
                    $sql="SELECT * FROM posts WHERE post_id=$pservice;";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){?>
                    <?php 
                    while($post = mysqli_fetch_assoc($result)){?>
                        <span class="card-title h5 text-warning ">@
                            <?php
                                $pid=$services['post_user'];
                                $ser="SELECT user_id FROM posts WHERE post_id =$pid;";
                                $ser_data = mysqli_query($con, $ser);
                                $_count = mysqli_fetch_array($ser_data);
                                $service = array_shift($_count);
                                $ser="SELECT user_name FROM users WHERE user_id =$service;";
                                $ser_data = mysqli_query($con, $ser);
                                $_count = mysqli_fetch_array($ser_data);
                                $service = array_shift($_count);
                                echo $service;
                                
                            ?>
                        </span>
                        <span class="card-title display-6"><?php echo $post['post_name']; ?></span>
                        <div class="col-6 col-md-3">

                            <i class="starIcon fa fa-star fa-lg"></i>

                            <p class="h5">Points: <?php  echo $post['points'];?></p>
                        </div>
                    </div>

                </div>
                <?php }?>
        <?php }?>
                <?php }else{ ?> 
                    <? if($services['post_user'] == $_SESSION['id'] && $services['status']==1){ ?>
                        <form action="#" method="post" >
                    <?php }else{ ?>
                        <form action="#" method="get">
                    <?php } ?>  
                    <div class="card text-dark bg-light mb-3 offset-1 col-10">
                        <div class="card-header d-flex justify-content-between">
                            <span class="card-title h5 text-danger">@<%= service.customer.username%></span>
                            <span class="card-title display-6"><%= service.job.header %></span>
                           <% if(currentUser.username == user.username){ %>
                                <button class="btn notify" value="<%= service.customer._id %>"> <i class="doneIcon fa fa-check-square-o fa-2x" ></i></button>
                            <% }else if(!service.isFinished){ %>
                                <div>
                                <% for(let i = 0; i < 5; i++){ %> 
                                    <i class="starIcon fa fa-star-o text-dark fa-sm"></i>
                                <% } %> 
                                </div>
                            <% }else{ %>  
                                <div class="stars d-flex flex-row-reverse">
                                    <% for(let i = 5; i > 0; i--){ %> 
                                        <input class="star star-<%-i%>" id="star-<%-i%>" type="radio" name="rate" value="<%-i%>"/>
                                        <label class="star star-<%-i%> <%= (i % 2 == 0 ? 'mx-1':'') %>" for="star-<%-i%>"></label> 
                                    <% } %> 
                                </div>
                            <% } %> 
                        </div>
                            <div class="card-body">
                                <% if(service.customer.username == currentUser.username && service.isFinished){ %> 
                                        <textarea class="form-control" name="review" placeholder="Leave a review...." cols="1" rows="1" required></textarea>
                                      <div class="d-flex flex-row-reverse">
                                        <button class="my-1 btn btn-success btn-sm notify" value="<%= service.freelancer._id %>" type="submit">Comment</button>
                                      </div>
                                    <% }else{ %>
                                        <span class="card-text h5"><%= service.review %></span>
                                        <span class="spinner-grow spinner-grow-sm"></span>
                                    <% } %>  
                            </div>
                    </div>
                </form>
                <?php } ?>
        <?php } ?> 
        <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>