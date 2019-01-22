<div class="container_right">
<?php if (@$speech) {
$no=0;
foreach ($speech as $value) {
	$no = $no+1;
	$id = $value->id;
	if ($no==3) {?>
	<div class="smg">					
		<a href="<?php echo base_url('single_speach/').$value->id;?>">
			<img src="<?php echo base_url('web_resource/speech/').$value->image; ?>" style="height:80px; margin:5px; float:left;"><br>
			<p style="float:left; font-size:16px; color:white; margin-left:10px; text-align:justify;"><?php echo $value->title; ?></p>
		</a>
	</div><br/>
	<?php }
	if ($no==4) {?>
	<div class="smg">					
		<a href="<?php echo base_url('single_speach/').$value->id;?>">
			<img src="<?php echo base_url('web_resource/speech/').$value->image; ?>" style="height:80px; margin:5px; float:left;"><br>
			<p style="float:left; font-size:16px; color:white; margin-left:10px; text-align:justify;"><?php echo $value->title; ?></p>
		</a>
	</div><br/>
	<?php }}}?>
	<div class="box_1">
		<p style="color:white; text-align:center; padding-top:20px;"><b>নোটিশ বোর্ড</b></p>
			<div class="in_box_nt" >
				<?php if(@notice){ 
					$filter = true;
					$no=0;
					foreach ($notice as $key => $value) {
					 	$no=$no+1;
					 	if ($no==7) {
					 		$filter = false;
					 	}
					 	if ($filter) {?>
					 		<a href="<?php echo base_url('single_notice/').$value->id;;?>"><?php echo $no.". ".$value->title;?></a><br>
					 	<?php }}} ?>			
			</div>
		<a href="<?php echo base_url('all_notics');?>"><p style="color:white; text-align:center;"><b> সকল নোটিশ</b></p></a>					
	</div><br/>
	<!-- <div class="box_1">
		<p style="color:white; text-align:center; padding-top:20px; "><b>গুরুত্বপূর্ণ লিঙ্ক</b></p>
				<div class="in_box_1">
					<h4><a href="http://www.moedu.gov.bd/" style="text-decoration:none;" target="_blank">শিক্ষা মন্ত্রণালয়</a></h4><hr>
					<h4><a href="http://digitalcontent.ictd.gov.bd/" style="text-decoration:none;" target="_blank">ডিজিটাল কন্টেন্ট</a></h4><hr>							
					<h4><a href="http://www.dpe.gov.bd/" style="text-decoration:none;" target="_blank">প্রাথমিক শিক্ষা অধিদপ্তর </a></h4><hr>
					<h4><a href="http://www.mopme.gov.bd/" style="text-decoration:none;" target="_blank">প্রাথমিক ও গণশিক্ষা মন্ত্রণালয় </a></h4>														
				</div>
	</div><br/> -->
	<div class="box">
		<div class="in_box">
			<h4><a href="<?php echo base_url("login");?>"" target="_blank" style="text-decoration:none;">লগইন করুন</a></h4>
		</div>
	</div><br/>
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1824.2655976174656!2d90.3828014053004!3d23.870775442719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c40ffb5a7771%3A0xdf9d474fb2e6340b!2sDBN+Ltd.!5e0!3m2!1sen!2sbd!4v1521453811676" width="260" height="290" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div><br/>
</div><br>