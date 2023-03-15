<?php
require_once "../header.php"; 
require_once "../db/dbo.php";
require_once "../models/Store.php";

use shop\models\Store;
$store = new Store($con);

$productList = $store->getBasket($_SESSION['login_id']);
?>

<form action="process-basket.php" method="post">
<table class="table">
<th>
    
</th>
<?php
if($productList) 
{
foreach($productList as $product) {

$str = "<tr><td>". $product->id . 
     '</td><td class="name">' . $product->name . 
     "</td><td>" . $product->qty ; 
if($user_is_logged) $str .=
     '</td><td> <input type="number" min="0" max="' . $product->qty . 
     '"  name="qty_'. $product->id . '" style="width: 3em" value="1">'; 
$str .= "</td><td>" . $product->price;
if($user_is_logged) $str .=
     '</td><td> <input type="checkbox" value="yes" name="chk_'. $product->id . 
     '" style="width: 2em">'; 
     $str .=    "</td></tr>" ;

echo $str;     
}

if($user_is_logged) echo 
'<tr><td></td><td><input type="submit" value="Оплатить">' . 
'</td> <td></td> <td></td> <td></td> <td></td> </tr>';
}
else{
echo "<h2>Ваша корзина пуста</h2>";

}
?>

</table>  
</form>  


<?php require "../footer.php"; ?>


