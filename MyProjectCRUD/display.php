<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display.php</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="display.css">

</head>

<body>
    <?php
    include 'connection.php';
    include "navbar.html";
    $query = "select * from products";
    $res = mysqli_query($con, $query);
    ?>

    <table>

        <tr>


            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Access</th>

        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($res)) {
        ?>

            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo "$row[name]" ?></td>
                <td><?php echo "$row[price]" ?></td>
                <td><?php echo "$row[description]" ?></td>
                <td>
                    <?php
                    $file_names = $row['image'];
                    $img_names = explode(";", $file_names);
                    foreach ($img_names as $iname) {
                    ?>
                        <img src="<?php echo "product_images/" . $iname; ?>" height="100px" width="100px">
                    <?php
                    }
                    ?>

                </td>
                <td>
                    <button><a href="delete.php?id=<?php echo "$row[id]" ?>" class="access"><i class="fa-solid fa-trash " style="color:red;"></i> Delete</a></button>
                    <button><a href="update.php?id=<?php echo "$row[id]" ?>" class="access"><i class="fa-solid fa-pen-to-square " style="color:blue;"></i> Update</a></button>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>