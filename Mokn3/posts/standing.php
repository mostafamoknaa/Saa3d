<?php
    $uarr = array();
    $parr = array();
    $c=$c1=0;
    $sel="select user_name,points from users order by points DESC limit 7;";
    $res= mysqli_query($con,$sel);
    if($res){
        $users = mysqli_fetch_all($res,MYSQLI_ASSOC);
        foreach($users as $std){
            $parr[$c1]=$std['points'];
            $uarr[$c]=$std['user_name'];
            $c=$c+1;
            $c1=$c1+1;         
        }
        }else{
             echo 'Error: '. mysqli_error($con);
        }
?>