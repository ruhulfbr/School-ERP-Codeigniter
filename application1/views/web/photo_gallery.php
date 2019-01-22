		<?php include'header.php';?>	
		<?php include'navbar.php';?>

		<div class="container_main">
			<?php include'container_left.php';?>	
			<div class="container_mid" style="text-align:justify; padding-left:0px;">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header" align="center">ফটোগ্যালারী</h1>
				</div>
				<?php if (@$photo_gallery) {
					foreach ($photo_gallery as $value) {?>
						<div class="col-md-4 col-xs-4 thumb">
							<a target="_blank" class="thumbnail fancybox-buttons" href="<?php echo base_url('web_resource/photo_gallary/').$value->image; ?>">
								<img src="<?php echo base_url('web_resource/photo_gallary/').$value->image; ?>" >
							</a>
						</div>
				<?php }} ?>
			</div>
			<div class="row">
				<center>
					<?= $this->pagination->create_links(); ?>
				</center>		
			</div>		
		</div>
	<?php include'container_right.php';?>	
	</div>				
	<?php include'footer.php';?>
    
