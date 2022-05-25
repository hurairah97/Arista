<?php
include '../config.php';
if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    if ($conection) {
        $query = "SELECT * FROM `sub_category` WHERE sub_id='$ID'";
        $final = mysqli_query($conection, $query);
        $cat_query = "Select * from category";
        $cat_result = mysqli_query($conection, $cat_query);
        if ($final) {
            $row = mysqli_fetch_row($final);
        }
    }  
    if (isset($_POST['btn2'])) {
        $id = $_POST['H-id'];
        $category = $_POST['txtcate'];
        $name = $_POST['name'];

        if ($conection) {
            if (empty($_FILES['image']['name'])) {
                $query2 = "UPDATE `sub_category` SET `category_name`='$category',`names`='$name' WHERE sub_id='$id'";
                $final2 = mysqli_query($conection, $query2);
                if ($final2) {
                    header('location:subview.php');
                } else {
                    echo "<script>alert('ggh');</script>";
                }
            } else {
                $pro_img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $query2 = "UPDATE `sub_category` SET `category_name`='$category',`names`='$name',`images`='$pro_img' WHERE sub_id='$id'";
                $final2 = mysqli_query($conection, $query2);
                if ($final2) {
                    header('location:subview.php');
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
                        <label>category </label>
                        <select class="form-control" name="txtcate">
                            <?php
                            while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                                if ($cat_row['id'] == $row[1]) { ?>
                                    <option value="<?php echo $cat_row['id']; ?>" selected><?php echo $cat_row['name']; ?> </option>
                                <?php } else { ?>
                                    <option value="<?php echo $cat_row['id']; ?>"><?php echo $cat_row['name']; ?> </option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row[2]; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label>Image </label></br>
                    <input type="file" name="image"> <img src="data:image/jpg;base64,<?php echo base64_encode($row[3]);?>"width="50" height="60" ></div></br>
                    <input class="btn btn-light" type="submit" value="Update" name="btn2">
                </form>
            </div>
        </div>
    
</body>
<?php
include '../panel/footer.php' ;?>