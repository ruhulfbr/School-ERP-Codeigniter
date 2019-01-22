<?php include'header.php';?>	
<?php include'navbar.php';?>

<div class="container_main">
	<?php include'container_left.php';?>	
	<div class="container_mid" style="text-align:justify; padding-left:0px;">
		<div>
			<center><h4><?php echo $single_notice->title;?></h4></center>
		</div><br>
		<div>
			<p><?php echo $single_notice->details;?></p>
		</div>	
	</div>
	<?php include'container_right.php';?>	
</div>
<?php include'footer.php';?>