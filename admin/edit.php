<?php
include '../config.php';
if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    if ($conection) {
        $query = "SELECT * FROM `admin` WHERE id='$ID'";
        $final = mysqli_query($conection, $query);
        if ($final) {
            $row = mysqli_fetch_row($final);
        }
    } 
    if (isset($_POST['btn2'])) {
        $id = $_POST['H-id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        if ($conection) {

            $query2 = "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password' WHERE id='$id'";
            $final2 = mysqli_query($conection, $query2);
            if ($final2) {
                header('location:admview.php');
            } else {
                echo "<script>alert('ggh');</script>";
            }
        } else {
            echo "<script>alert('error in conection');</script>";
        }
    }
}

include '../panel/header.php' 
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
                        <label>Name </label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row[1]; ?>">
                    </div><br>
                    <div class="form-group">
                        <label>Email </label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row[2] ?>">
                    </div><br>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="pass" value="<?php echo $row[3] ?>">
                    </div><br>
    
                    <input class="btn btn-light" type="submit" value="Update" name="btn2">
                </form>
            </div>
        </div>
    
</body>
<?php
include '../panel/footer.php' ;?>