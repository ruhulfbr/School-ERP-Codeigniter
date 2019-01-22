		<?php include'header.php';?>	
		<?php include'navbar.php';?>

		<div class="container_main">
			<?php include'container_left.php';?>	
			<div class="container_mid" style="text-align:justify; padding-left:0px;">
				<div>
					<center><h4>সকল নোটিশ </h4></center>
				</div><br>		
				<table class="table table-bordered">
					<thead>
						<tr>
						  <td class="active" align="center">সিরিয়াল</td>
						  <td class="active" align="center">শিরোনাম</td>
						  <td class="active" align="center">কর্ম</td>
						</tr>
					</thead>
					<tbody>
					<?php
					if (@$notice) {
						$no=0;
						foreach ($notice as $value) { 
							$no++;
							$replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
						    $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
						    $b_no = str_replace($search_array, $replace_array, $no);?>
						<tr>
							<td class="active" align="center"><?php echo $b_no;?></td>
						  	<td class="active" align="center"><?php echo $value->title;?></td>
						 	 <td class="active" align="center"><a href="<?php echo base_url('single_notice/').$value->id;;?>" target="_blank" class="btn btn-default">বিস্তারিত</a></td>
					 	</tr>
					<?php }}?>
					</tbody>
				</table>	
			</div>
			<?php include'container_right.php';?>	
		</div>
		<?php include'footer.php';?>