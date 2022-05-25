<?php
include '../config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  } 
  if (!isset($_SESSION['adm_name'])) {
    header('location:../admin/admlogin.php');
  }
if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    if ($conection) {
        $query = "SELECT * FROM `category` WHERE id='$ID'";
        $final = mysqli_query($conection, $query);
        if ($final) {
            $row = mysqli_fetch_row($final);
        }
    }
    if (isset($_POST['btn2'])) {
        $id = $_POST['H-id'];
        $name = $_POST['name'];

        if ($conection) {
            if (empty($_FILES['image']['name'])) {
                $query2 = "UPDATE `category` SET `name`='$name' WHERE id='$id'";
                $final2 = mysqli_query($conection, $query2);
                if ($final2) {
                    header('location:catview.php');
                } else {
                    echo "<script>alert('ggh');</script>";
                }
            } else {
                $pro_img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $query2 = "UPDATE `category` SET `name`='$name',`cat_image`='$pro_img' WHERE id='$id'";
                $final2 = mysqli_query($conection, $query2);
                if ($final2) {
                    header('location:catview.php');
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
                    <h1>Edit </h1>
                    </p>

                   <input type="hidden" name="H-id" value="<?php echo $row[0]; ?>" >
                    <div class="form-group">
                        <label>Category Name </label><br>
                        <input type="text" class="form-control" name="name" value="<?php echo $row[1]; ?>" required>
                    </div><br>
                    <div class="form-group">
                    <label>Image</label><br>
                    <input type="file" name="image"> <img src="data:image/jpg;base64,<?php echo base64_encode($row[2]);?>"width="50" height="60" ></div></br>
                    <input class="btn btn-light" type="submit" value="Update" name="btn2">
                </form>
            </div>
        </div>
    
</body>
<?php
include '../panel/footer.php' ;?>