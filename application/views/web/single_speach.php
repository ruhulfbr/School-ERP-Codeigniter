		<?php include'header.php';?>	
		<?php include'navbar.php';?>

		<div class="container_main">
			<?php include'container_left.php';?>	
				<div class="container_mid" style="padding-right:5x; margin-right:0px;">
					<?php if (@$speec_single) { ?>
					<div align="center">
						<h3><?php echo $speec_single->title; ?></h3>
						<img src="<?php echo base_url('web_resource/speech/').$speec_single->image;?>" height="250" width="220">
						<?php } ?>	
					</div><br>
					<p><?php echo $speec_single->speech; ?></p>
				</div>
			<?php include'container_right.php';?>	
		</div>
		<?php include'footer.php';?>