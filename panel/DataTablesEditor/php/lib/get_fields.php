<?
include "config.php";
$sql="SELECT * FROM test jenisbeasiswa BY IDBEASISWA ASC";
$result = mysql_query($sql);
$stack=array();
    while($row = mysql_fetch_array($result))
          {
            array_push($stack,array($row['column1'],$row['column2']));
          }
           
echo json_encode($stack);
?>