

      <?php
  	$priceSum=0; 
       try {
       $username = "root";
       $password = "freshdiet";
       $hostname = "localhost";
       $dbname = "examples";
   
       $pdo = new PDO
      ("mysql:host=$hostname;dbname=$dbname", $username, $password);
 
      echo "Connected to MySQL<br>";
  
      } catch (PDOException $e) {
       echo "Unable to connect to MySQL: " . $e->getMessage() . "\n";
              exit;
      }
  
      $query = $pdo ->prepare("SELECT id, name,year, Price  FROM cars");
      $query -> execute();
  
      //fetch tha data from the database 
      for ($i=0; $row = $query->fetch();$i++){
    echo $i." - ".$row['name']." - ".intval($row['year'])." - ".intval($row['Price'])."<br/>";
	$priceSum=$priceSum + intval($row['Price']);    
}
	
    //close the connection
    unset ($pdo);
    unset($query);


 ?>
<html>
<body>

<form name="form1" action="newpage3.php" method="POST">


Name: <input type="text" name="name"  value=""<br>
E-mail: <input type="text" name="email"><br>
<input type="submit" value="Checkout">

<input hidden name="priceSum" value="<?php $txt2 = "Price sum= " . $priceSum ; echo $txt2;?>". />
</form>
<?php
$string1 = "fresh";
?>
<form name="form2" action="newpage3.php" method="POST"><br>
 Promo Code: <input type="text" name="promo" value=""><br>


<input type="submit" value="Discount">

<input type="hidden" name="submit" value="yes">


  <input hidden name="priceSum" value="<?php $txt2 = "$1000 removed new price  =$ " . intval($priceSum-1000); echo $txt2;?>". />
  </form>


</body>
</html>
