<li>
	<a href="<?php echo "product.php?id=" . $product["product_id"]; ?>">
	<img style="height: 150px; width: 150px;" src="<?php echo $product["product_img"]; ?>" alt="<?php echo $product["product_name"]; ?>">
	</a>
	<p><?php echo $product["product_name"] . "<br />" . $product["product_desc"]; ?></p>
	<p><?php echo "$" . $product["product_price"]; ?></p>
</li>