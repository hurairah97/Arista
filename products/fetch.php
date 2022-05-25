<?php
require_once "../config.php";
$category_id = $_POST["category_id"];
$result = mysqli_query($conection,"SELECT * FROM  sub_category where category_name = $category_id");
?>
<option value="">Select Sub Category</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["sub_id"];?>"><?php echo $row["names"];?></option>
<?php
}
?>