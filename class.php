<?php
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "formdb");



$nameid = $_POST['datapost'];
$q = "SELECT * FROM classes WHERE mid = '$nameid'";
$result = mysqli_query($conn, $q);
while ($rows = mysqli_fetch_array($result)) {
?>
    <option value="<?php echo $rows['class']; ?>"><?php echo $rows['class']; ?></option>
<?php
}
?>