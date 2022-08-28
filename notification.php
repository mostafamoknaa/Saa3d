<style>
    <?php
    include('C:\AppServ\www\saa3d\stylesheets\main.css');
    ?>
</style>    

<?php include('nav.php');?>
    <div class="row mt-5">

    <?php
        $id=$_SESSION['id'];
        $sql="SELECT post_id from posts where user_id=$id;";
        $qry_post = mysqli_query($con, $sql);
        $post_count = mysqli_fetch_array($qry_post);
        $pid = array_shift($post_count);
        $sql="SELECT COUNT(comment_id) AS NumberOfProducts FROM comments where post_id=$pid;";
        $qry_data = mysqli_query($con, $sql);
        $approve_count = mysqli_fetch_array($qry_data);
        $toatalCount = array_shift($approve_count);
        $update="UPDATE comments SET status =1 where post_id=$pid;";
        $qry_data = mysqli_query($con, $update);
        if($toatalCount==0){ ?>
          <h1> You don't have any notifications yet. </h1>  
        <?php } else{?>
          <?php
          $sql="SELECT * FROM comments where post_id=$pid order by comment_id desc;";
          $result = mysqli_query($con, $sql);
          if(mysqli_num_rows($result) > 0){?>
          <?php 
          while($row = mysqli_fetch_assoc($result)){?>
          <div class="mt-3 row">
            <div class="card border-light mb-1 offset-1 col-10">
              <div class="card-body">
                <div class=" d-flex justify-content-between border-bottom">
                  <div class="text-danger h5">@
                  <?php
                    $name1= $row['user_id'];
                    $sql="SELECT user_name from users where user_id=$name1";
                    $qry_data = mysqli_query($con, $sql);
                    $approve_count = mysqli_fetch_array($qry_data);
                    $user = array_shift($approve_count);
                   echo $user; ?> </div>
                  <?php
                      $original_date = $row['created_at'];
                      $timestamp = strtotime($original_date);
                      $new_date = date("d-m-Y", $timestamp);
                  ?> 
                  <div class="h6"><?php echo $new_date; ?></div>
                </div>
                <p class="card-text h6"><?php echo $row['content']; ?></p>
                <a href="comment.php?id=<?php echo rawurlencode($row['post_id']); ?>" class="stretched-link"></a>
            </div>
          </div>
        </div>
          <?php }?>
            
        <?php } ?> 
      
    </div>
        <?php } ?>
      </div>
