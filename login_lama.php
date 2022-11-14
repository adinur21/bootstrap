<?php
if (!empty($_POST)) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="select * from siswa
            where email='$email' and password='$password'";
    include "database.php";
    $result=pg_query($connect, $query);
    if (pg_num_rows($result)>0) {
        $data_login=pg_fetch_array($result);
        session_start();
        $_SESSION['status_login']=true;
        $_SESSION['id_siswa']=$data_login['id_siswa'];
        $_SESSION['nama_siswa']=$data_login['nama_siswa'];
        
       
        echo "<script type='text/javascript'> alert('berhasil'); </script>";
        header("location:index.php");
    }   
    else 
    echo "<script type='text/javascript'>  alert('gagal');</script>";
}
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="post">
            <h2>signin siswa</h2>
            <div>email
                <input type="text" name="email" id="">
            </div>
            <div>password
                <input type="password" name="password" id="">
            </div>
            <button type="submit">login</button>
        </form>
       
    </body>
   
    </html>