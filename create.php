<?php
include 'config.php';
include 'nav.php';

?>


<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .card{
            width: 70%;
            margin: 50px auto;
            padding: 50px;
            font-size:30px;
            display:block;
        }
        .form_group{
            display:flex;
            padding:20px;
        }
        .form_control{
            margin-right:30px;
        }
        .btn{
            background:yellow;
            color:black;
            font-size:30px;
            font-weight: bold;
            margin-right:20px;
        }
    </style>
</head>
  <body>

    
    <div class="card">
        <?php
        if (isset($_POST['submit'])) {
            if(empty($_POST['title']) OR empty($_POST['content'])){
                echo '<p class=alert alert-warning>لايمكنك ترك الحقول فارغة </p>';
            }else{
                $date= date('Y-m-d');
                mysqli_query($db_connect, "insert into posts(title, content, created_at) values('$_POST[title]','$_POST[content]','$date')");
                echo '<p class=alert alert-success>تمت الاضافة </p>';
            }
        }
        ?>
       <form action="create.php" method="post">
        <div class="mb-3">
            <input type="text" name="title" class="form-control" placeholder="ادخل العنوان"/>
        </div>
        <div class="mb-3">
            <input  name="content" rows="10" class="form-control" placeholder="ادخل المحتوي"/>
        </div>
        <div class="mb-3">
            <input type="submit" name="submit" class="btn btn-primary" value="اضافة المدونة"/>
        </div>

        </form>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>