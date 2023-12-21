<style>
    <?php
    include('C:\AppServ\www\Mokn3\stylesheets\main.css')

    ?>
</style>    
<head>
  <title>post</title>
</head>
<?php 
    include('C:\AppServ\www\Mokn3\connect.php');
    session_start();
    include('C:\AppServ\www\Mokn3\layouts\boilerplate.php');
    $post_id=$_GET['id'];
    $userid="SELECT user_id FROM posts WHERE post_id=$post_id;";
    $qry_data = mysqli_query($con, $userid);
    $approve_count = mysqli_fetch_array($qry_data);
    $user_id = array_shift($approve_count);
?>
      <div class="row mt-5">
        <div class="mt-3 col-12 col-md-8 offset-md-2">
          <div class="card border-light mb-3">
            <div class="mainPost">
              <div class="card-header d-flex justify-content-between border-bottom">
                <a href="\mokn3/users/profile.php?uid=<?php echo rawurlencode($user_id); ?>"><span class="text-danger h5">@
                <?php
                $post_id=$_GET['id'];
                $userid="SELECT user_id FROM posts WHERE post_id=$post_id;";
                $qry_data = mysqli_query($con, $userid);
                $approve_count = mysqli_fetch_array($qry_data);
                $user_id = array_shift($approve_count);
                $user_name="SELECT user_name FROM users WHERE user_id=$user_id;";
                $qry_data = mysqli_query($con, $user_name);
                $approve_count = mysqli_fetch_array($qry_data);
                $user = array_shift($approve_count);
                echo $user;
                ?>
                </span></a>
                <?php
                        if(isset($_POST['delpost'])){
                          $delpost="DELETE FROM posts WHERE post_id = $post_id;";
                          $delposts=mysqli_query($con,$delpost);
                          if($delposts){
                            
                            header("Location:main.php");
                          }
                        }
                        
                        ?>
                <?php
                $post_id=$_GET['id'];
                $sql="SELECT * FROM posts WHERE post_id=$post_id;";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0){?>
                <?php 
                while($post = mysqli_fetch_assoc($result)){?>
                <?php if($user_id == $_SESSION['id']){ ?> 
                  <?php if($post['status']==0){ ?> 
                  <div class="dropdown">
                    <i class="fa fa-ellipsis-h fa-2x" data-bs-toggle="dropdown"></i>
                  <ul class="dropdown-menu">
                      <li class="dropdown-item">
                        <a class="btn editBtn">Edit</a>
                      </li>
                      <li class="dropdown-item">
                        <form action="#" method="post">
                          <button class="btn" type="submit" name="delpost">Delete</button>
                        </form>
                      </li>
                    </ul>
                  </div>
                <?php } ?> 
              <?php } ?> 
              </div>
              
              <div class="card-body">
                <h5 class="card-title d-flex border-bottom display-6"><?php echo $post['post_name'];?></h5>
                <p class="card-text h6"><?php echo $post['content']?></p>
              </div>
  
  
              <div class="card-footer d-flex">
                <div class="mx-auto">
                    <i class="pointIcon fa fa-star fa-lg"></i>
                    <p class="h5"><?php echo $post['points']?></p>
                </div>
                <div class="mx-auto">
                    <i class="locationIcon fa fa-map-marker fa-lg ms-auto"></i>
                    <p class="h5">
                    <?php
                            $user_id=$post['user_id'];
                            $user_name="SELECT address FROM users WHERE user_id=$user_id;";
                            $qry_data = mysqli_query($con, $user_name);
                            $approve_count = mysqli_fetch_array($qry_data);
                            $add = array_shift($approve_count);
                            echo $add;
                        ?>
                    </p>
                </div>              
            </div>
            <?php
            include('C:\AppServ\www\Mokn3\connect.php');
            session_start();
            $comments=['comment'=>''];
            if(isset($_POST['add'])){
              
              $com=mysqli_real_escape_string($con,$_POST['comment']);
              if(empty($com)){
                $comments['comment']="please enter your comment";
              }
              if(!array_filter($comments)){
                $uid=$_SESSION['id'];
                $cdate=date("Y-m-d H:i:s");
                $sqlcom="INSERT INTO comments(user_id,post_id,content,created_at,updated_at,status) VALUES($uid,$post_id,'$com','$cdate','$cdate',0);";
                $res=mysqli_query($con,$sqlcom);
                header("Refresh:1");
                if(!$res){
                  echo 'Error: '. mysqli_error($con);
                }

                }else{
                  echo 'Error: '. mysqli_error($con);
              }
            }
            ?>
            <?php if($user_id != $_SESSION['id'] && $post['status']==0){ ?> 
              <form class="card-footer" method="POST" action="">
                  <textarea class="form-control" name="comment" placeholder="Write your offer...." cols="1" rows="1" required></textarea>
                <div class="d-flex flex-row-reverse">
                  <button class="my-1 btn btn-success btn-sm notify" value="" name="add" type="submit">Comment</button>
                </div>
              </form>
            <?php }if($post['status']==1){ ?>
              <div class="card-footer">
                <p class="text-danger h4">This job is closed</p>
              </div>  
            <?php }else if($user_id == $_SESSION['id'] && $post['status']==0 && $_SESSION['point'] < $post['points']){ ?>
               <div class="card-footer">
                <p class="text-danger h4">You don't have enough points.</p>
              </div>
            <?php } ?>
            </div>
           <?php
           $edit=['header'=>'','body'=>'','point'=>''];
           if(isset($_POST['edit'])){
            $head=mysqli_real_escape_string($con,$_POST['header']);
            $body=mysqli_real_escape_string($con,$_POST['body']);
            $point=mysqli_real_escape_string($con,$_POST['point']);
            if(empty($head)){
              $edit['head']="please enter head";
            }
            if(empty($body)){
              $edit['body']="please enter body";
            }
            if(empty($point)){
              $edit['point']="please enter point";
            }
            if(!array_filter($edit)){
              $inedit="UPDATE posts SET post_name='$head',content='$body',points=$point WHERE post_id=$post_id;";
              $res=mysqli_query($con,$inedit);
              header("Refresh:1");
            }
           }

           ?>
            <div class="editPost d-none">
              <form action="" method="post">
                <div class="card-header d-flex justify-content-between border-bottom">
                <p class="text-danger h5">@<?php echo $user;?></p> 
                <a class="btn cancelEdit"><i class="fa fa-times-circle-o fa-lg text-danger"></i></a>
              </div>
              
              <div class="card-body">
                <input type="text" class="card-title display-6 form-control" name="header" placeholder="Header..." value="<?php echo $post['post_name'];?>">
                <textarea rows="6" cols="6" class="card-text h6 form-control" name="body"><?php echo $post['content'];?></textarea>
              </div>
              <div class="card-footer">
                <div class="row">
                  <span class="col-md-6">
                      <p class="h6">Points:</p>
                      <input class="form-control" type="number" name="point" min="1" value="<?php echo $post['points'];?>">
                    </span>
                </div>
              </div>
              <div class= "card-footer">
                 <button class="mx-1 btn btn-success btn btn-lg" type="submit" name="edit">Edit</button>
              </div>
            </form>
                
            </div>
            <?php
            $post_id=$_GET['id'];
            $sql="SELECT * FROM comments WHERE post_id=$post_id;";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) > 0){?>
            <?php 
            while($coments = mysqli_fetch_assoc($result)){?>
              <div class="card-footer">
               <div class="d-flex justify-content-between">
                <a href="\mokn3/users/profile.php?uid=<?php echo rawurlencode($coments['user_id']); ?>"><span class="text-danger h6">@
                <?php
                    $com_id=$coments['user_id'];
                    $user_name="SELECT user_name FROM users WHERE user_id=$com_id;";
                    $qry_data = mysqli_query($con, $user_name);
                    $approve_count = mysqli_fetch_array($qry_data);
                    $name = array_shift($approve_count);
                    echo $name;
                    ?>
                </span></a>
                <?php
                if(isset($_POST['colsed'])){
                  $up="UPDATE posts SET status =1 where post_id =$post_id";
                  $rup=mysqli_query($con,$up);
                  if($rup){
                    header("Refresh:1");
                  }
                }
                ?>
                <?php if($user_id == $_SESSION['id'] && $post['status']==0 && $post['points'] <= $_SESSION['point']){ ?> 
                    <form action="" method="post">
                    <button class="btn notify" value="<?php echo $coments['comment_id']?>" name="colsed"> <i class="approveBtn fa fa-check-square-o fa-lg" ></i></button>
                    </form>
                <?php }
                
                if($coments['user_id'] == $_SESSION['id']){
                  include('connect.php');
                  if(isset($_POST['delcomments'])){
                    $c=$coments['comment_id'];
                    $del="DELETE FROM comments WHERE comment_id =$c;";
                    $r=mysqli_query($con,$del);
                    header("location:posts.php");
                  }
                  ?> 
                  <div class="dropdown">
                    <i class="fa fa-ellipsis-h fa-lg" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                    <li class="dropdown-item">
                        <form action="" method="post">
                        <button class="btn" type="submit" name="delcomments">Delete</button>
                        </form>
                    </li>
                    </ul>
                </div>
              <?php } ?> 
              </div>
               <p class="h6"><?php echo $coments['content'];?></p>
              </div>
            <?php } ?> 
 
          </div>
        </div>
        </div>
      </main>
    </div>
    <?php } ?> 
         <?php } ?> 
    <script>
    <?php
    include('C:\AppServ\www\Mokn3\javascripts\post.js');
    ?>
    </script>
    <?php } ?> 
    <?php include('C:\AppServ\www\Mokn3\partials\footer.php');?>

 