<?php include'header.php';?>	
<?php include'navbar.php';?>

<div class="container_main">
	<?php include'container_left.php';?>	
	<div class="container_mid" style="text-align:justify; padding-left:0px;">
		<div class="row">
			<div class="col-lg-12">
				<center><h1 class="page-header">ভিডিও গ্যালারী</h1></center>
			</div>
		</div>
		<div class="row">	
			<div>
				<?php foreach ($video_gallery_web as $value) { ?>
                	<video width="100%" controls>
	                  <source src="<?php echo base_url('web_resource/video/').$value->video_link; ?>" type="video/mp4">
	                  Your browser does not support HTML5 video.
	                </video>
                <?php } ?>		
			</div>	
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