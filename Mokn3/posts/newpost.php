<?php
include('C:\AppServ\www\Mokn3\connect.php');
include('C:\AppServ\www\Mokn3\layouts\boilerplate.php');
session_start();
$add=$_SESSION['add'];
$id=$_SESSION['id'];
$post=['header'=>'','body'=>'','point'=>''];
if(isset($_POST['post'])){
    $head=mysqli_real_escape_string($con,$_POST['header']);
    $content=mysqli_real_escape_string($con,$_POST['body']);
    $point=mysqli_real_escape_string($con,$_POST['point']);

    if(empty($head)){
        $post['header']="Enter the name of your post";
    }   
    if(empty($content)){
        $post['body']="Enter the content of your post";
    }
    if(empty($point)){
        $post['point']="Enter the points of your post";
    }
    if(!array_filter($post)){
        $ins="INSERT INTO posts (post_name,user_id,content,points) VALUES('$head',$id,'$content',$point)";
        $res=mysqli_query($con,$ins);
        if($res){
            header('REFRESH:1;URL=main.php');
        }
        else{
            echo 'Error: '. mysqli_error($con);
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
        include("C:\AppServ\www\saa3d\stylesheets\main.css");
        include("H:\Saa3d-master\public\stylesheets\\font-awesome\css\\font-awesome.min.css");
        ?>
    </style>
    <title>New Post</title>
</head>

<body class="text-center">
    <div class="cover-container mx-auto">
        <main>
            <div class="row mt-5">
                <?php
                include('nav.php');
                ?>
            </div>
            <form method="post" action="">
                <div class="row mt-5">
                    <div class="mt-3 col-12 col-md-8 offset-md-2">
                        <div class="card border-light mb-3">

                            <div class="card-header text-danger h4">Service Request</div>
                            <div class="card-header">
                                <input type="text" class="form-control signInput" name="header" placeholder="Header..." required>
                            </div>

                            <div class="card-body">
                                <textarea class="form-control" name="body" placeholder="Descripe your order...." cols="3" rows="3" required></textarea>
                                <div class="row mt-3">
                                    <span class="col-md-6">
                                        <p class="h6 d-flex">City:</p>
                                        <select class="form-control" name="city">
                                        
                                            <option value="<?php  echo $add?>"> <?php  echo $add ?></option>
                                        
                                        </select>
                                    </span>
                                    <span class="col-md-6">
                                        <p class="h6 d-flex">Points:</p>
                                        <input class="form-control" type="number" name="point" min="1" value="1" max="" required>
                                    </span>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="mx-1 btn btn-success" type="submit" name="post">Post</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include('C:\AppServ\www\Mokn3\partials\footer.php');?>
</body>

</html>