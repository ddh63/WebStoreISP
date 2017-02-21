<?php 

function get_products_count() {
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	try {
		$result = mysqli_query($db, "SELECT COUNT(product_id) FROM products");
		$row = $result->fetch_row();
		mysqli_close($db);
	} catch (Exception $e) {
		echo "Data could not be retrieved from the database.";
		mysqli_close($db);
		exit();
	}

	return $row[0];
}

function get_products_subset($posStart, $posEnd) {
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$offset = $posStart - 1;
	$rows = $posEnd - $posStart + 1;

	try {
		$result = mysqli_query($db, "SELECT product_id, product_name, product_price, product_desc, product_img FROM products ORDER BY product_id LIMIT $offset, $rows");
		$subset = fetch_all($result);
		mysqli_close($db);
	} catch (Exception $e) {
		echo "Data could not be retrieved from the database.";
		mysqli_close($db);
		exit();
	}

	return $subset;
}

function get_product_single($id) {
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	try {
		$result = mysqli_query($db, "SELECT product_name, product_price, product_desc, product_img FROM products WHERE product_id = $id");
		$product = mysqli_fetch_assoc($result);
	} catch (Exception $e) {
		echo "Data could not be retrieved from the database.";
		mysqli_close($db);
		exit();
	}

	if ($product === false) {
		mysqli_close($db);
		return $product;
	}

	$product['sizes'] = array();

	try {
		$result = mysqli_query($db, "SELECT size FROM product_sizes ps INNER JOIN sizes s ON ps.size_id = s.id WHERE product_id = $id ORDER BY `order`");
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$product['sizes'][] = $row['size'];
		}
		mysqli_close($db);
	} catch (Exception $e) {
		echo "Data could not be retrieved from the database.";
		mysqli_close();
		exit();
	}


	return $product;
}

function get_cart_items($user) {
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	try {
		$result = mysqli_query($db, "SELECT product_id, product_size, quantity FROM users_cart WHERE user_id = $user");
		
		if (mysqli_num_rows($result) == 0)
			return 0;

		$result = fetch_all($result);
		mysqli_close($db);
	} catch (Exception $e) {
		echo "Data could not be retrieved from the database.";
		mysqli_close($db);
		exit();
	}

	return $result;
}

function get_cart_details($prod_id) {
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	try {
		$prod = mysqli_query($db, "SELECT product_name, product_price FROM products WHERE product_id = $prod_id");
		$prod = mysqli_fetch_assoc($prod);
		mysqli_close($db);
	} catch (Exception $e) {
		echo "Data could not be retrieved from the database.";
		mysqli_close($db);
		exit();
	}

	return $prod;
}

function remove_from_cart($user_id, $prod_id) {
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	try {
		mysqli_query($db, "DELETE FROM users_cart WHERE user_id = $user_id and product_id = $prod_id");
		mysqli_close($db);
	} catch (Exception $e) {
		echo "Data could not be retrieved from the database.";
		mysqli_close($db);
		exit();
	}
}

function remove_all_from_cart($user_id) {
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	try {
		mysqli_query($db, "DELETE FROM users_cart WHERE user_id = $user_id");
		mysqli_close($db);
	} catch (Exception $e) {
		echo "Data could not be retrieved from the database.";
		mysqli_close($db);
		exit();
	}
}

function fetch_all($result)
{
   $rows = array();
   while ($row = $result->fetch_assoc())
          $rows[] = $row;

   return $rows;
}

?>