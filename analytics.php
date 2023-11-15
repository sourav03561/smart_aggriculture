
<?php
require('db.php');
$sql = "SELECT * FROM data";
$result = mysqli_query($con,$sql);
echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">P</font> </td> 
          <td> <font face="Arial">N</font> </td> 
          <td> <font face="Arial">K</font> </td> 
          <td> <font face="Arial">Temp</font> </td> 
          <td> <font face="Arial">Humidity</font> </td>
          <td> <font face="Arial">Ph</font> </td>
          <td> <font face="Arial">Rainfall</font> </td>
          <td> <font face="Arial">Label</font> </td>   
      </tr>';
if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) 
{
    $P = $row["P"];
    $N = $row["N"];
    $K = $row["K"];
    $Temp = $row["temperature"];
    $Humidity = $row["humidity"];
    $PH = $row["ph"];
    $rain = $row["rainfall"];
    $label = $row["label"];

    echo '<tr> 
                  <td>'.$P.'</td> 
                  <td>'.$N.'</td> 
                  <td>'.$K.'</td> 
                  <td>'.$Temp.'</td> 
                  <td>'.$Humidity.'</td>
                  <td>'.$PH.'</td>
                  <td>'.$rain.'</td>
                  <td>'.$label.'</td>
              </tr>';
}
} 
else 
{
    echo "0 results";
}
  
?>

