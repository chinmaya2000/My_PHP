<?php
include 'connection.php';
include 'navbar.html';
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
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
            $qry = "INSERT INTO products VALUES($id, '$name',$price,'$desc','$file_names')";
           
            if(mysqli_query($con, $qry)){
                ?>
                <script>
                alert("One record inserted");
                window.location="display.php";
                </script>
               <?php
                
            } else {
                "<p>Error: ".mysqli_error($con)."</p>";
            }
        }
        
    }
    ?> 
    


