<?php if (isset($_GET["d1"])) { $d1  = $_GET["d1"]; } else { $d1=0; }; 
if (isset($_GET["d2"])) { $d2  = $_GET["d2"]; } else { $d2=0; }; 
$result = $db->prepare("SELECT *,SUM(Metoda_De_Plata) FROM EMH_rezervari WHERE Data_Si_Ora_Rezervarii BETWEEN :a AND :b");
$result->bindParam(':a', $d1);
$result->bindParam(':b', $d2);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
?>
<tr class="record">
<td><?php echo $row['SUM(Metoda_De_Plata)']; ?></td>
 
</tr>
<?php
}
?>