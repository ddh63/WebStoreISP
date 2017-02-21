<?php 
	$prod = get_cart_details($product['product_id']); 
	$prod_id = $product['product_id'];
?>
<tr>
	<td><?php echo $prod['product_name']; ?></td>
	<td><?php echo $product['product_size'] ?></td>
	<td><?php echo $product['quantity']; ?></td>
	<td><?php echo "$" . $prod['product_price'] * $product['quantity']; $_SESSION['cost'] += $prod['product_price'] * $product['quantity']; ?></td>
	<td><input type="button" id="submit" style="cursor: pointer; font-family: 'Open Sans Condensed'; font-size:14px; border-radius: 4px; height: 25px;" name="<?php echo $prod['product_name']; ?>" value="Remove" onclick="location.href='cart.php?remove=<?php echo $prod_id; ?>'" /></td>
</tr>