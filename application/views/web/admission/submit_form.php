<?php

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('helvetica', '', 10);

$pdf->AddPage();

$school_logo = base_url('resource/img/').$school_info->logo;
$student_image = base_url('resource/uploaded_data/').$submit_data['file'];
$name = $submit_data['name'];
$gender = $submit_data['gender'];
$bloodgroup = $submit_data['bloodgroup'];
$religion = $submit_data['religion'];
$nationality = $submit_data['nationality'];
$dob = $submit_data['dob'];
$mobile = $submit_data['mobile'];
$quota = $submit_data['quota'];
$father = $submit_data['father'];
$mother = $submit_data['mother'];
$father_profession = $submit_data['father_profession'];
$mother_profession = $submit_data['mother_profession'];
$father_nationalID = $submit_data['father_nationalID'];
$mother_nationalID = $submit_data['mother_nationalID'];
$gmobile = $submit_data['gmobile'];
$email = $submit_data['email'];
$postOffice = $submit_data['postOffice'];
$annualincome = $submit_data['annualincome'];
$localguardian = $submit_data['localguardian'];
$localguardian_district = $submit_data['localguardian_district'];
$yourrelation = $submit_data['yourrelation'];
$thana_upojela = $submit_data['thana_upojela'];
$mobileOfLG = $submit_data['mobileOfLG'];
$homeaddress = $submit_data['homeaddress'];
$nameOfExam = $submit_data['nameOfExam'];
$examroll = $submit_data['examroll'];
$passingYear = $submit_data['passingYear'];
$registrationNo = $submit_data['registrationNo'];
$board = $submit_data['board'];
$GPA = $submit_data['GPA'];
$Subj4 = $submit_data['Subj4'];
$Subj5 = $submit_data['Subj5'];
$Subj6 = $submit_data['Subj6'];
$optional = $submit_data['optional'];

$html = <<<EOF
	<!-- EXAMPLE OF CSS STYLE -->
<style type="text/css">
		table,tr,td{
			border:1px solid #f5f2c2;
			font-family: Arial, sans-serif;
		    font-size: 12px;
		    font-weight: normal;
		    font-style: normal;
		    text-decoration: none;
		    color: #333333;
		    padding: 5px 4px;
		}
		.info{
			width:100%;
			border:1px solid #f5f2c2;
			text-align: center;
		}
		
		.signature td{
			 /*  margin-top: 100px; */
			  height: 70px;
			 
		}
		

	</style>

<div class="wrapper">
		<page size="A4" layout="" >
			<section class="section" >
				<table style="">
					<tr>
						<td width="119px" height="150px;" >
							<img style="width:300px; height:300px;" src="$school_logo" class="image">
						</td>

						<td width="400px;" height="150px;" style="text-align: center;">
							<p>
							<b><span style="font-size:20px;">$school_info->name</span><br>
							    $school_info->address_1st_line, $school_info->address_2nd_line<br>
								Admission Form</b>
							</p> 
						</td>
						<td width="119px" height="150px;">
							<img style="width:300px; height:300px;" src="$student_image" class="image">
						</td>

					</tr>
				</table>
			</section> 
				<section >
					<div class="info "><b>Student Information</b></div>
					<table >
					  <tbody>
					    <tr>
					      <td >Name</td>
					      <td >$name</td>
					      <td >Gender</td>
					      <td >$gender</td>
					    </tr>
					    <tr>
					      <td >Blood Group</td>
					      <td>$bloodgroup</td>
					      <td>Religion</td>
					      <td>$religion</td>
					    </tr>
					    <tr>
					      <td >Nationality</td>
					      <td>$nationality</td>
					      <td>Date of Birth</td>
					      <td>$dob</td>
					    </tr>
					    <tr>
					      <td >Mobile(Student)</td>
					      <td>$mobile</td>
					      <td>Quota</td>
					      <td>$quota</td>
					    </tr>
					  </tbody>
					</table>
					<div class="info "><b>Guardian Information & Address</b></div>
					<table >
					  <tbody>
					    <tr>
					      <td >Father's Name</td>
					      <td >$father</td>
					      <td >Mother's Name</td>
					      <td >$mother</td>
					    </tr>
					    <tr>
					      <td >Father's Profession</td>
					      <td>$father_profession</td>
					      <td>Mother's Profession</td>
					      <td>$mother_profession</td>
					    </tr>
					    <tr>
					      <td >National ID Father</td>
					      <td>$father_nationalID</td>
					      <td>National ID Mother</td>
					      <td>$mother_nationalID</td>
					    </tr>
					    <tr>
					      <td >Guardian Number</td>
					      <td>$gmobile</td>
					      <td>Email</td>
					      <td>$email</td>
					    </tr>
					      <tr>
					      <td >Post office</td>
					      <td >$postOffice</td>
					      <td >Annual Income</td>
					      <td >$annualincome</td>
					    </tr>
					    <tr>
					      <td >Local Guardian</td>
					      <td>$localguardian</td>
					      <td>District</td>
					      <td>$localguardian_district</td>
					    </tr>
					    <tr>
					      <td >Your Religion</td>
					      <td>$yourrelation</td>
					      <td>Upazila/Thana</td>
					      <td>$thana_upojela</td>
					    </tr>
					    <tr>
					      <td >Mobile of Local Guardian</td>
					      <td>$mobileOfLG</td>
					      <td>House Location</td>
					      <td>$homeaddress</td>
					    </tr>
					  </tbody>
					</table>
						<div class="info "><b>Academic Information</b></div>
					<table >
					  <tbody>
					    <tr>
					      <td >Name of Exam</td>
					      <td >$nameOfExam</td>
					      <td >Exam Roll</td>
					      <td >$examroll</td>
					    </tr>
					    <tr>
					      <td >Passing Year</td>
					      <td>$passingYear</td>
					      <td>Registration No</td>
					      <td>$registrationNo</td>
					    </tr>
					    <tr>
					      <td >Name of Board</td>
					      <td>$board</td>
					      <td>GPA</td>
					      <td>$GPA</td>
					    </tr>
					  </tbody>
					</table>
						<div class="info "><b>Subject Information</b></div>
					<table >
					  <tbody>
					    <tr>
					      <td >1. Main Subject</td>
					      <td >Bangla</td>
					      <td >4. Compulsory</td>
					      <td >$Subj4</td>
					    </tr>
					    <tr>
					      <td >2. Main Subject</td>
					      <td>English</td>
					      <td>5. Compulsory</td>
					      <td>$Subj5</td>
					    </tr>
					    <tr>
					      <td >3. Main Subject</td>
					      <td>ICT</td>
					      <td>6. Compulsory</td>
					      <td>$Subj6</td>
					    </tr>
					    <tr>
					      <td ></td>
					      <td></td>
					      <td>7. Optional</td>
					      <td>$optional</td>
					    </tr>
					  </tbody>
					</table>
					<table style="text-align:center;">
						<tbody>
							<tr>
								<td><b>N:B: After signature admission will be approve.</b></td>
							</tr>
						</tbody>
					</table>
					<br><br><br><br>					
					<table class="signature" style=" height:100px;">
					  <tbody>
					    <tr>
					      <td>
					       <div align="center"><br>
						      <br><br><br><strong><u> 
						      Signature of Applicant</u></strong>
						  	</div>
					      </td>
					      <td >
					      	 <div align="center"><br>
							      <br><br><br><strong><u> 
							      Signature of Guardian</u></strong>
							  	</div>
					      </td>
					      <td >
					      	 <div align="center"><br>
							      <br><br><br><strong><u> 
							      Signature of Convener</u></strong>
							  	</div>
					      </td>
					      <td >
				      		<div align="center"><br>
							      <br><br><br><strong><u> 
							      Signature of Principal</u></strong><br>
							      MD Sefaur Rahaman<br><strong>&nbsp;</strong> 
							      01740-845025 
							</div>
					      </td>
					    </tr>
					  </tbody>
					</table>
				</section>
		</page>
	</div>
EOF;
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Admission_form.pdf', 'I');