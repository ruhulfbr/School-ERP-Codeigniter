<?php include'header.php';?>	
<?php include'navbar.php';?>

<div class="container_main">
	<?php include'container_left.php';?>	
		<div class="container_mid" style="padding-right:0px; margin-right:0px;">
			<div class="view_wc" >
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<?php 
						$no=0;
						foreach ($slider as $key => $value) {
							$no = $no+1;
							if($no==1){
								echo '<div class="item active">';
							}else{
								echo '<div class="item">';
							}
							?>
								<img src="<?php echo base_url('web_resource/slider/').$value->image; ?>" style="width:100%; height:250px;" alt="...">
								<div class="carousel-caption">
								<strong><?php echo $value->title; ?></strong>
							  	</div>
							</div>
						<?php } ?>
					</div>
				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</div><br/><br/><br/> 							
			<div class="block grid16-12 omega" style=" min-height:350px; font-size:75%">			
					<div class="block topic-box grid16-4">
						<h2 class="">ইংরেজী</h2>
						<div class="content">
							<img src="<?php echo base_url() ?>web_resource/img/3.jpg" alt="" title="" class="imagecache imagecache-service_box" height="130" width="180">													
							<!--ul style="display: none;">
								<li><a href="">ইংরেজী</a></li>											
							</ul-->						
						</div>
					</div>
					<div class="block topic-box grid16-4">
						<h2 class="">বাংলা</h2>
						<div class="content">
							<img src="<?php echo base_url() ?>web_resource/img/64.jpg" alt="" title="" class="imagecache imagecache-service_box" height="130" width="180">													
							<!--ul style="display: none;">
								<!--li><a href="">বাংলা</a></li>											
							</ul-->						
						</div>
					</div>
					<div class="block topic-box grid16-4">
						<h2 class="">গণিত</h2>
						<div class="content">
							<img src="<?php echo base_url() ?>web_resource/img/65.jpg" alt="" title="" class="imagecache imagecache-service_box" height="130" width="180">													
							<!--ul style="display: none;">
								<li><a href=""> গণিত</a></li>											
							</ul-->						
						</div>
					</div>
					<div class="block topic-box grid16-4">
						<h2 class="">ধর্ম ও নৈতিক শিক্ষা</h2>
						<div class="content">
							<img src="<?php echo base_url() ?>web_resource/img/1298.jpg" alt="" title="" class="imagecache imagecache-service_box" height="130" width="180">													
							<!--ul style="display: none;">
								<li><a href="">ধর্ম ও নৈতিক শিক্ষা</a></li>											
							</ul-->						
						</div>
					</div>					
					<div class="block topic-box grid16-4">
						<h2 class="">বিজ্ঞান</h2>
						<div class="content">
							<img src="<?php echo base_url() ?>web_resource/img/81.jpg" alt="" title="" class="imagecache imagecache-service_box" height="130" width="180">													
							<!--ul style="display: none;">
								<li><a href="">বিজ্ঞান</a></li>											
							</ul-->						
						</div>
					</div>
					<div class="block topic-box grid16-4">
						<h2 class="">ব্যবসায় শিক্ষা</h2>
						<div class="content">
							<img src="<?php echo base_url() ?>web_resource/img/1299.jpg" alt="" title="" class="imagecache imagecache-service_box" height="130" width="180">													
							<!--ul style="display: none;">
								<li><a href="">ব্যবসায় শিক্ষা</a></li>										
							</ul-->						
						</div>
					</div>					
					<div class="block topic-box grid16-4">
						<h2 class="">সাধারণ শিক্ষা</h2>
						<div class="content">
							<img src="<?php echo base_url() ?>web_resource/img/1077.jpg" alt="" title="" class="imagecache imagecache-service_box" height="130" width="180">													
							<!--ul style="display: none;">
								<li><a href="">সাধারণ শিক্ষা</a></li>										
							</ul-->						
						</div>
					</div>					
					<div class="block topic-box grid16-4">
						<h2 class="">কারিগরি শিক্ষা</h2>
						<div class="content">
							<img src="<?php echo base_url() ?>web_resource/img/1079.jpg" alt="" title="" class="imagecache imagecache-service_box" height="130" width="180">													
							<!--ul style="display: none;">
								<li><a href="">কারিগরি শিক্ষা</a></li>										
							</ul-->						
						</div>
					</div>					
					<div class="block topic-box grid16-4">
						<h2 class="">মাদ্রাসা শিক্ষা</h2>
						<div class="content">
							<img src="<?php echo base_url() ?>web_resource/img/1078.jpg" alt="" title="" class="imagecache imagecache-service_box" height="130" width="180">													
							<!--ul style="display: none;">
								<li><a href="">মাদ্রাসা শিক্ষা</a></li>									
							</ul-->						
						</div>
					</div>			
			</div>
			<!-- <div>
				<iframe width="287" height="175" src="https://www.youtube.com/embed/JqEa7tpLivk" frameborder="0" allowfullscreen></iframe>
				<iframe width="287" height="175" src="https://www.youtube.com/embed/fK4lDZ0KICc" frameborder="0" allowfullscreen></iframe>				
				<iframe width="287" height="175" src="https://www.youtube.com/embed/8sQd4f76iF0" frameborder="0" allowfullscreen></iframe>
				<iframe width="287" height="175" src="https://www.youtube.com/embed/NPGi1d8XbyQ" frameborder="0" allowfullscreen></iframe>	
				<iframe width="287" height="175" src="https://www.youtube.com/embed/PGguEpdTkX0" frameborder="0" allowfullscreen></iframe>
				<iframe width="287" height="175" src="https://www.youtube.com/embed/mS9tzQA2rkw" frameborder="0" allowfullscreen></iframe>				
			</div>	 -->								     
		</div>
	<?php include'container_right.php';?>	
</div>
<?php include'footer.php';?>