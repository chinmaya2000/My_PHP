<?php
include "navbar.html";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
</head>

<body>
    <div class="container">
        <div class="form">
            <h3>ADD PRODUCT</h3>

            <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="form-type">
                    <label for="">Id</label>
                    <input type="text" name="id" id="id" class="input" required>


                    <div class="form-type">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="input" required>

                    </div>
                    <div class="form-type">
                        <label for="">Price</label>
                        <input type="text" name="price" id="price" class="input" required>

                    </div>
                    <div class="form-type">
                        <label for="" class="text">Description</label>
                        <textarea name="desc" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="form-type">
                        <label for="">Image</label>
                        <input type="file" name="image[]" accept="image/*" multiple required>
                    </div>
                    <div class="form-type">
               
                            <input class="sub" type="submit" name="submit" value="ADD">
               
                    </div>
            </form>
        </div>
    </div>

</body>

</html>