<?php
include("connect.php");

?>

<select name="owner">
<?php 
$sql = mysqli_query($con, "SELECT Rname FROM combobox");
while ($row = $sql->fetch_assoc()){
echo "<option value=\"Combobox\">" . $row['Rname'] . "</option>";
}
?>
</select>
