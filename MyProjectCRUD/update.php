<?php
include "connection.php";
include "navbar.html";


if(isset($_GET['id'])){
    $id = $_GET['id'];
} else if(isset($_POST['id'])){
    $id = $_POST['id'];
}

$sql = "SELECT * FROM products WHERE id= $id";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="update.css">
</head>

<body>
    <div class="container">
        <div class="form">
        <h3>UPDATE PRODUCT</h3>


            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-type">
                    <input type="hidden" name="id" id="id" class="input" value=<?php echo $data['id'] ?> >


                    <div class="form-type">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="input" value=<?php echo $data['name']?> >

                    </div>
                    <div class="form-type">
                        <label for="">Price</label>
                        <input type="text" name="price" id="price" class="input" value=<?php echo $data['price']?> >

                    </div>
                    <div class="form-type">
                        <label for="" class="text">Description</label>
                        <textarea name="desc" id="" cols="30" rows="10" ><?php echo $data['description']?></textarea>
                    </div>
                    <div class="form-type">
                        <label for="">Image</label>

                        <input type="file" name="image[]" accept="image/*" multiple>
                    </div>
                    <div class="form-type">
               
                            <input class="sub" type="submit" name="update" value="update">
               
                    </div>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['update']))
    {


        echo count($_FILES['image']["name"]);
        if(!in_array("",$_FILES['image']["name"])){
            $id=$_POST['id'];
            $name = $_POST['name'];
            $price=$_POST['price'];
            
            $desc=$_POST['desc'];
                
                $files=$_FILES['image'];
                $file_names = implode(";",$files['name']);
                for($i=0;$i<count($files['name']); $i++){
                    $img_name=$files['name'][$i];
                    $path_img = "product_images/".$img_name;
                    $file_upload_error = false;
                    if(!move_uploaded_file($files['tmp_name'][$i], $path_img)){
                        echo $file['error'];
                        $file_upload_error = true;    
                    }    
                }
        if(!$file_upload_error){
            $qry = "UPDATE products SET name='$name', price=$price, description='$desc',image='$file_names' WHERE id=$id";
            
            
            if(mysqli_query($con, $qry)){
                ?>
                <script>
                    alert("One record updatedd");
                    window.location="display.php";
                    </script>
               <?php
                
            } else {
                "<p>Error: ".mysqli_error($con)."</p>";
            }
        }
        
    }
    else{
        $id=$_POST['id'];
        $name = $_POST['name'];
        $price=$_POST['price'];
        
        $desc=$_POST['desc'];
        $qry = "UPDATE products SET id=$id ,name='$name', price=$price, description='$desc' WHERE id=$id";
        if(mysqli_query($con, $qry)){
            ?>
        <script>
            alert("One record updatedd");
            window.location="display.php";
            </script>
       <?php
        
    } 
   }
}
?>

</body>

</html>