<div id="pagination" style="position:absolute; left: 56px; <?php if ($productsOnPage <= 2) echo 'top: 600px'; else echo 'top: 840px;' ?>">

	<?php $i = 0; ?>
	<?php while ($i < $total_pages) : ?>
		<?php $i += 1; ?>
		<?php if ($i == $current_page) : ?>
			<span><?php echo $i; ?> </span>
		<?php else : ?>
			<a href="products.php?pg=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php endif; ?>
	<?php endwhile; ?>

</div>