<?php

include '../config.php';
if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    if ($conection) {
        $query = "SELECT * FROM `products` WHERE p_id='$ID'";
        $final = mysqli_query($conection, $query);

      if ($final) {
            $row = mysqli_fetch_row($final);
        }
    }
    if (isset($_POST['btn2'])) {
        $id = $_POST['H-id'];
        $name = $_POST['name'];
        $category=$_POST['txtcate'];
        $subcategory=$_POST['txtsub'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $disc=$_POST['disc'];
        
        
        if ($conection) {
            if (empty($_FILES['image']['name'])) {
                $query2 = "UPDATE `products` SET `p_name`='$name',`category_id`='$category',`sub_id`='$subcategory',`price`='$price',`quantity`='$qty',`discount`='$disc' WHERE p_id='$id'";
                $final2 = mysqli_query($conection, $query2);
                if ($final2) {
                    header('location:prdview.php');
                } else {
                    echo "<script>alert('ggh');</script>";
                }
            } else {
                $pro_img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $query2 = "UPDATE `products` SET `p_name`='$name',`category_id`='$category',`sub_id`='$subcategory',`price`='$price',`quantity`='$qty',`image`='$pro_img',`discount`='$disc' WHERE p_id='$id'";
                $final2 = mysqli_query($conection, $query2);
                if ($final2) {
                    header('location:prdview.php');
                } else {
                    echo "<script>alert('ggh');</script>";
                }
            }

        } else {
            echo "<script>alert('error in conection');</script>";
        }
    }
}
include '../panel/header.php' ;
?>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">

                <form method="post" enctype="multipart/form-data">
                    <p>
                    <h1>Edit</h1>
                    </p>

                   <input type="hidden" name="H-id" value="<?php echo $row[0]; ?>">
                    <div class="form-group">
                        <label> Name </label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row[1]; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="CATEGORY-DROPDOWN">Category</label>
                        <select class="form-control" id="category-dropdown" name="txtcate" required>
                            <option value="">Select Category</option>
                            <?php
                                $result = mysqli_query($conection,"SELECT * FROM category");
                                while($cat_row = mysqli_fetch_array($result)) {
                                if ($cat_row['id'] == $row[2]) { ?>
                                ?>
                                 <option value="<?php echo $cat_row['id']; ?>" selected><?php echo $cat_row['name']; ?> </option>
                                <?php } else { ?>
                                 <option value="<?php echo $cat_row['id']; ?>"><?php echo $cat_row['name']; ?> </option>
                            <?php
                                }}
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                    <label>Sub Category </label>
                    <select class="form-control" id="sub-category-dropdown" name="txtsub" required>
                    <?php
                                $s_result = mysqli_query($conection,"SELECT * FROM sub_category where category_name =".$row[2]);
                                while($s_row = mysqli_fetch_array($s_result)) {
                                if ($s_row['sub_id'] == $row[3]) { ?>
                                ?>
                                 <option value="<?php echo $s_row['sub_id']; ?>" selected><?php echo $s_row['names']; ?> </option>
                                <?php } else { ?>
                                 <option value="<?php echo $s_row['sub_id']; ?>"><?php echo $s_row['names']; ?> </option>
                            <?php
                                }}
                            ?>
                    </select> 
                    </div><br>
                    <div class="form-group">
                        <label> Price </label>
                        <input type="number" class="form-control" name="price" value="<?php echo $row[4] ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label> Discount </label>
                        <input  type="number" class="form-control" name="disc" value="<?php echo $row[7] ?>" required></div><br>
                    <div class="form-group">
                        <label> Quantity </label>
                        <input type="number" class="form-control" name="qty" value="<?php echo $row[5] ?>" required>
                    </div><br>
                    <div class="form-group">
                    <label> Image </label></br>
                    <input type="file" name="image" > <img src="data:image/jpg;base64,<?php echo base64_encode($row[6]);?>"width="50" height="60" ></div></br>
                    <input class="btn btn-light" type="submit" value="Update" name="btn2">
                </form>
            </div>
        </div>
</body>
<script>
         $(document).ready(function() {
    $('#category-dropdown').on('change', function() {
        var category_id = this.value;
        $.ajax({
            url: "fetch.php",
            type: "POST",
            data: {
                category_id: category_id
            },
            cache: false,
            success: function(result) {
                $("#sub-category-dropdown").html(result);
            }
        });
    });
});
      </script>
<?php
include '../panel/footer.php' ;?>