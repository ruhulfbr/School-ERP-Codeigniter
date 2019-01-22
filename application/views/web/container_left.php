<div class="container_left">
<?php if (@$speech) {
$no=0;
$filter = true;
foreach ($speech as $value) {
	$no = $no+1;
	$id = $value->id;
	if ($no==3) {
		$filter = false;
	}
	if($filter) {?>
	<div class="smg">					
		<a href="<?php echo base_url('single_speach/').$value->id;?>">
			<img src="<?php echo base_url('web_resource/speech/').$value->image; ?>" style="height:80px; margin:5px; float:left;"><br>
			<p style="float:left; font-size:16px; color:white; margin-left:10px; text-align:justify;"><?php echo $value->title; ?></p>
		</a>
	</div><br/>
	<?php }
}}?>

	<div class="box_1">
		<p style="color:white; text-align:center; padding-top:20px; "><b>রেজাল্ট দেখুন</b></p>
				<div class="in_box_1">
					<h4><a href="http://dperesult.teletalk.com.bd" target="_blank" style="text-decoration:none;">পিএসসি রেজাল্ট</a></h4><hr>
					<h4><a href="http://www.educationboardresults.gov.bd" target="_blank" style="text-decoration:none;">বোর্ড ফলাফল</a></h4><hr>
					<h4><a href="result.php" style="text-decoration:none;">স্কুলের সকল রেজাল্ট লিস্ট</a></h4>
				</div>
	</div><br/>
	<!-- <div class="box_1">
		<p style="color:white; text-align:center; padding-top:20px; "><b>একাডেমিক</b></p>
				<div class="in_box_1">
					<h4><a href="left_side_content.php" style="text-decoration:none;">ঝরে পড়ার ছাত্র ছাত্রী তথ্য</a></h4><hr>
					<h4><a href="left_side_content.php" style="text-decoration:none;">শিক্ষার্থীদের উপস্থিতির গড়</a></h4><hr>
					<h4><a href="left_side_content.php" style="text-decoration:none;">শিক্ষকগণের উপস্থিতির গড়</a></h4><hr>
					<h4><a href="left_side_content.php" style="text-decoration:none;">শ্রেণি ভিত্তিক ছাত্র ছাত্রী </a></h4><hr>
					<h4><a href="form/attendance.php" target="_blank" style="text-decoration:none;">শিক্ষার্থীদের উপস্থিতি দেখুন</a></h4>
				</div>
	</div><br/> -->
	<div class="box">
		<div class="in_box">
			<h4><a href="<?php echo base_url('admission_form');?>" target="_blank" style="text-decoration:none;">ভর্তির আবেদন</a></h4>
		</div>
	</div><br/>
	<div class="box">
		<div class="in_box">
			<h4><a href="form/result_admission_exam.php" target="_blank" style="text-decoration:none;">ভর্তির  প্রবেশপত্র ডাউনলোড</a></h4>
		</div>
	</div><br/>
	<div class="fb_box">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11';
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div class="fb-page" data-href="https://www.facebook.com/dbnltd" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/dbnltd" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/dbnltd">Facebook</a></blockquote></div>	
	</div><br/>	
</div>