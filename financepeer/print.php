<?php
$con=mysqli_connect("localhost","root","","login");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM json");

echo "<table border='1'>
<tr>
<th>userId</th>
<th>id</th>
<th>Title</th>
<th>body</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['userId'] . "</td>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['title'] . "</td>";
echo "<td>" . $row['body'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>