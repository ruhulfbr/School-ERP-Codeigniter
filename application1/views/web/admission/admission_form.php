<!DOCTYPE html>
<html lang="en" class="yui3-js-enabled">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 

<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php echo $title;?></title>
</head> 
<body style="">
		
	

<table style="margin-left: 16%; margin-right: 16%;" bordercolor="#d4d4d4" bgcolor="#d0fdd0" border="1" rules="all" cellspacing="2" cellpadding="1">
  <tbody>
  <tr class="">
  	<td align="center">
  		<img height="100px" width="100px" src="<?php echo base_url('resource/img/').$school_info->logo; ?>">
  	</td>
    <td class="rnr-label" style="width: 765px;" rowspan="1" colspan="4">
      <div align="center"><br></div>
      <div align="center"><font size="3"></font>
        <font size="4"></font><font size="4">
          <font size="5"></font><font size="5">
            <font color="#0000ff"></font>
            <font color="#0000ff">
              <span id="edit1_InstituteName_0" class="rnr-nowrap">
                <span id="readonly_value_InstituteName_1" style="width: 200px;">
                <?php echo $school_info->name;?></span>
              </span>
            </font>
          </font>
        </font><br>
        <font size="2"></font>
        <font size="2">
          <font size="3"></font>
          <font color="#0000ff" size="3">
            <span id="edit1_InsAddress_0" class="rnr-nowrap">
              <span id="readonly_value_InsAddress_1" style="width: 200px;"><?php echo $school_info->address_1st_line.", ".$school_info->address_2nd_line;?></span>
            </span>
          </font>
        </font><br>
        <font size="4"></font>
        <font color="#0000ff" size="4">
          <span id="edit1_FormName_0" class="rnr-nowrap">
            <span id="readonly_value_FormName_1" style="width: 200px;">Admission Form</span>
          </span>
        </font><br>
        <font size="4"></font>
        <?php echo form_open_multipart('admission_form_filup'); ?>
        <br><br>
      </td>
    </tr>
    <tr class="">
    <td class="rnr-label" style="width: 765px; white-space: nowrap; background-image: none; background-color: rgb(255, 215, 0);" rowspan="1" colspan="4">
      <p align="center">
        <font size="3"><b>Student Information</b></font>
        <br>
      </p>
    </td>
</tr>
<tr class="" data-fieldname="Session">
  <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"><em></em> 
      Name </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Name_0" class="rnr-nowrap">
        <input style="width: 200px;" type="text" name="name" maxlength="50" required>&nbsp;
        <font color="red">*</font></span> 
    </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      Gender</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Gender_0" class="rnr-nowrap">
        <select size="1" name="gender" style="width: 207px">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>&nbsp;
          <font color="red">*</font></span>
    </td>
</tr>
  <tr class="" data-fieldname="Group">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"><em></em> 
      Blood Group </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_BloodGroup_0" class="rnr-nowrap">
        <select size="1" name="bloodgroup" style="width: 207px">
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
        </select>
      </span>
    </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      Religion</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span class="rnr-nowrap">
        <select size="1" name="religion" style="width: 207px">
          <option value="Islam">Islam</option>
          <option value="Hindu">Hindu</option>
          <option value="Christian">Christian</option>
          <option value="Buddhism">Buddhism</option>
          <option value="Others">Others</option>
        </select>&nbsp;
        <font color="red">*</font>
      </span>
    </td>
  </tr>
  <tr class="" data-fieldname="Section">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"><em></em> 
      Nationality </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Nationality_0" class="rnr-nowrap">
        <select size="1" name="nationality" style="width: 207px">
          <option value="Bangladeshi">Bangladeshi</option>
          <option value="Others">Others</option>
        </select>&nbsp;<font color="red">*</font></span> </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      Date Of Birth</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_DateOfBirth_0" class="rnr-nowrap">
        <input type="date" name="dob" style="width: 200px; white-space: nowrap;" rowspan="1" colspan="1" required>&nbsp;&nbsp;<font color="red">*</font>

      </td>
    </tr>
  <tr class="" data-fieldname="Roll">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"> Mobile (Applicant) </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Cmobile_0" class="rnr-nowrap">
        <input style="width: 200px;" type="text" name="mobile" maxlength="50" required></span><br>&nbsp;&nbsp;(use number. don't use any sign&nbsp;or hyphen)
    </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1">
      <strong></strong><strong> 
      Quota</strong>
    </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Quota_0" class="rnr-nowrap">
        <select size="1" name="quota" style="width: 207px">
          <option value="Not Applicable">Not Applicable</option>
          <option value="Freedom fighter grandchildren">Freedom fighter grandchildren</option>
          <option value="physically challenged">physically challenged</option>
          <option value="Women">Women</option>
          <option value="Ethnic minority">Ethnic minority</option>
          <option value="Backward district">Backward district</option>
        </select>&nbsp;
        <font color="red">*</font>
      </span>
    </td>
  </tr>
  <tr class="" data-fieldname="Name">
    <td class="rnr-label" style="width: 765px; white-space: nowrap; background-image: none; background-color: rgb(255, 215, 0);" rowspan="1" colspan="4">
      <p align="center">
        <font size="3"><b>Guardian Information &amp; 
                              Address</b></font>
      </p>
    </td>
  </tr>
  <tr class="" data-fieldname="Religion">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"><em></em> 
      Father's Name&nbsp; </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Father_0" class="rnr-nowrap">
        <input style="width: 200px;" type="text" name="father" maxlength="50" required>&nbsp;
        <font color="red">*</font></span> 
    </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1">
      <strong> 
      Mother's Name</strong>&nbsp;
    </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Mother_0" class="rnr-nowrap">
        <input style="width: 200px;" type="text" name="mother" maxlength="50" required>&nbsp;
        <font color="red">*</font></span> </td></tr>
  <tr class="" data-fieldname="Quota">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"><em></em> 
      Profession&nbsp;of Father </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong> 
      <span id="edit1_Profession_0" class="rnr-nowrap">

        <input style="width: 200px;" type="text" name="father_profession" maxlength="50" required>&nbsp;<font color="red">*</font></span>&nbsp;</td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong>Profession of Mother</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong> 
      <span id="edit1_ProfessionoOfMo_0" class="rnr-nowrap">

        <input style="width: 200px;" type="text" name="mother_profession" maxlength="50" required></span>
      </td></tr>
  <tr class="" data-fieldname="Photo">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1">
      National ID of Father </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong> 
      <span class="rnr-nowrap">

        <input style="width: 200px;" type="text" name="father_nationalID" maxlength="50"></span>&nbsp;(Optional) </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong>National ID of Mother</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong> 
      <span id="edit1_NationalDMo_0" class="rnr-nowrap">
        <input style="width: 200px;" type="text" name="mother_nationalID" maxlength="50"></span>(Optional) </td></tr>
  <tr class="">
    <td class="rnr-label" rowspan="1" colspan="1"> Guardian Mobile </td>
    <td class="rnr-control style3" rowspan="1" colspan="1">
      <span id="edit1_GMobile_0" class="rnr-nowrap">
        <input style="width: 200px;" type="text" name="gmobile" maxlength="50" required>&nbsp;<font color="red">*</font></span> </td>
    <td class="rnr-control style3 runner-cc" rowspan="1" colspan="1"><strong>
      Email</strong> </td>
    <td class="rnr-control style3 runner-cc" rowspan="1" colspan="1">
      <span id="edit1_Email_0" class="rnr-nowrap">
        <input style="width: 200px;" type="email" name="email" maxlength="50"></span>(Optional) </td></tr>
  <tr class="" data-fieldname="Father">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"><em></em> 
      Post Office </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_PostOffice_0" class="rnr-nowrap">

        <input style="width: 200px;" type="text" name="postOffice" maxlength="50" required></span> </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      Annual Income</strong>
    </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong> 
      <span class="rnr-nowrap">

        <input style="width: 200px;" type="text" name="annualincome" maxlength="50" required>&nbsp;
        <font color="red">*</font></span><br>(use                
         only&nbsp;number. don't use any sign ot text)
       </td></tr>
  <tr class="" data-fieldname="NationalID">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"><em></em>Name of 
      Local Guardian </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_LocalGuardian_0" class="rnr-nowrap">

        <input style="width: 200px;" type="text" name="localguardian" maxlength="50" required>&nbsp;<font color="red">*</font></span> </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      District</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_District_0" class="rnr-nowrap">

        <input style="width: 200px;" type="text" name="localguardian_district" maxlength="50" required>&nbsp;
        <font color="red"></font></span> </td></tr>
  <tr class="" data-fieldname="Profession">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"><em></em> 
      Your Relation </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_YourRelation_0" class="rnr-nowrap">

        <input style="width: 200px;" type="text" name="yourrelation" maxlength="50" required></span> </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      Thana</strong>/<strong>Upazilla</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Thana_0" class="rnr-nowrap">

        <input style="width: 200px;" type="text" name="thana_upojela" maxlength="50" required>
      </span> </td></tr>
  <tr class="" data-fieldname="AnnualIncome">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"> Mobile of Local Gurdian&nbsp; </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_MobileOfLG_0" class="rnr-nowrap">

        <input style="width: 200px;" type="text" name="mobileOfLG" maxlength="50" required>&nbsp;
        <font color="red">*</font></span> </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      Home Address</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_HomeAddress_0" class="rnr-nowrap">

      <input style="width: 270px;" type="text" name="homeaddress" maxlength="150" required></span> </td></tr>
  <tr class="" data-fieldname="Mother">
    <td class="rnr-label" style="width: 765px; white-space: nowrap; background-image: none; background-color: rgb(255, 215, 0);" rowspan="1" colspan="4">
      <p align="center"><font size="3"><b>Academic Information</b></font></p></td></tr>
  <tr class="" data-fieldname="GMobile">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"><em></em> 
      Name Of Exam </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_NameOfExam_0" class="rnr-nowrap">
      <select size="1" name="nameOfExam" style="width: 207px">
        <option value="SSC">SSC</option>
        <option value="SSC DAKHIL">SSC DAKHIL</option>
        <option value="SSC VOCATIONAL">SSC VOCATIONAL</option>
        <option value="SSC EQUIVALENT">SSC EQUIVALENT</option>
      </select>&nbsp;<font color="red">*</font></span>
    </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      Exam Roll</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_ExamRoll_0" class="rnr-nowrap">
        <input style="width: 200px;" type="text" name="examroll" maxlength="50" required>&nbsp;<font color="red">*</font></span> </td></tr>
  <tr class="" data-fieldname="MobileOfLG">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1">
      Passing Year </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_PassingYear_0" class="rnr-nowrap">
        <select size="1" name="passingYear" style="width: 207px">
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
        </select>&nbsp;<font color="red">*</font></span> </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      Registration No</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_RegistrationNo_0" class="rnr-nowrap">
        <input style="width: 200px;" type="text" name="registrationNo" maxlength="50" required></span> </td></tr>
  <tr class="">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1">
      Board </td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Board_0" class="rnr-nowrap">
        <select size="1" name="board" style="width: 207px">
          <option value="RAJSHAHI">RAJSHAHI</option>
          <option value="DHAKA">DHAKA</option>
          <option value="BARISAL">BARISAL</option>
          <option value="CHITTAGONG">CHITTAGONG</option>
          <option value="COMILLA">COMILLA</option>
          <option value="DINAJPUR">DINAJPUR</option>
          <option value="JESSORE">JESSORE</option>
          <option value="SYLHET">SYLHET</option>
          <option value="MADRASAH">MADRASAH</option>
          <option value="TECHNICAL">TECHNICAL</option>
          <option value="OTHERS BOARD">OTHERS BOARD</option>
        </select>&nbsp;<font color="red">*</font></span> </td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      GPA</strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_GPA_0" class="rnr-nowrap">
        <input style="width: 200px;" type="text" name="GPA" maxlength="50" required>&nbsp;<font color="red">*</font></span> 
    </td></tr>
    <tr class="" data-fieldname="GPA">
    <td class="rnr-label" style="width: 765px; white-space: nowrap; background-image: none; background-color: rgb(255, 215, 0);" rowspan="1" colspan="4">
      <p align="center"><font size="3">&nbsp;<b>Subject              
                 Selection</b></font> </p></td></tr>
  <tr class="">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"> &nbsp;</td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1"></td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong><font color="#0000ff"> 
      Select Group</font></strong> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1"><font color="#0000ff"></font><font color="#0000ff"><strong></strong><strong> 
      <span id="edit1_SelectGroup_0" class="rnr-nowrap">
        <select size="1" name="ad_group" style="width: 207px" id="select_group">
          <option value="None">Select Group</option>
          <option value="SCIENCE">SCIENCE</option>
          <option value="HUMANITIES">HUMANITIES</option>
          <option value="BUSINESS_STUDIES">BUSINESS STUDIES</option>
        </select>&nbsp;
        <font color="red">*</font></span></strong></font> </td></tr>
  <tr class="" data-fieldname="Subj1">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1">
      Subj 1 (Main)</td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Subj1_0" class="rnr-nowrap"><span id="readonly_value_Subj1_1" style="width: 200px;">Bengali</span>&nbsp;</td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong> 
      Subj 4</strong></td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
        <select size="1" name="Subj4" style="width: 207px" id="subject4">
          <option>Select</option>
        </select>&nbsp;
        <font color="red">*</font></td></tr>
  <tr data-fieldname="Subj2">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1">
      Subj 2 (Main)</td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Subj2_0" class="rnr-nowrap"><span id="readonly_value_Subj2_1" style="width: 200px;">English</span><input id="value_Subj2_1" type="Hidden" name="value_Subj2_1" value="English"></span> &nbsp;</td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      Subj 5</strong> </td>
    <td style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
        <select size="1" name="Subj5" style="width: 207px" id="subject5">
          <option>Select</option>
        </select>&nbsp;
        <font color="red">*</font>
      </td></tr>
  <tr class="" data-fieldname="Subj3">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1">
      Subj 3 (Main)</td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1">
      <span id="edit1_Subj3_0" class="rnr-nowrap"><span id="readonly_value_Subj3_1" style="width: 200px;">ICT</span><input id="value_Subj3_1" type="Hidden" name="value_Subj3_1" value="ICT"></span> &nbsp;</td>
    <td class="rnr-control style3 runner-cc" style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong> 
      Subj 6</strong> </td>
    <td style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1">
      
        <select size="1" name="Subj6" style="width: 207px" id="subject6">
          <option>Select</option>
        </select>&nbsp;
      <font color="red">*</font> </td></tr>
  <tr class="" >
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="1"></td>
    <td class="rnr-control style3" style="width: 259px; white-space: nowrap;" rowspan="1" colspan="1"> &nbsp;</td>
    <td style="width: 89px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong><strong> 
      Subj 7&nbsp;</strong><strong><font color="#ff0000">(Optional)</font></strong><font></font> </td>
    <td class="rnr-control style3 runner-cc" style="width: 282px; white-space: nowrap;" rowspan="1" colspan="1"><strong></strong> 
        <select size="1" name="optional" style="width: 207px" id="subject7">
          <option>Select</option>
        </select>&nbsp;&nbsp;<font color="red">*</font></span> </td></tr>

  <tr class="" data-fieldname="Subj6">
    <td class="rnr-label" style="width: 765px; white-space: nowrap; background-image: none; background-color: rgb(255, 215, 0);" rowspan="1" colspan="4">
      <p align="center"><font size="3">&nbsp;<b>Photo 
      Upload (passport 
      size)</b></font>&nbsp;</p></td></tr>

      <tr class="" data-fieldname="GPA">

  <tr class="" style="height: 37px;" data-fieldname="Subj7">
    <td class="rnr-label" style="width: 111px; white-space: nowrap;" rowspan="1" colspan="4">
      <div align="center"><font color="#ff0000"></font>
        <font color="#ff0000"> 
          <span id="edit1_NoticePhoto_0" class="rnr-nowrap">
            <span id="readonly_value_NoticePhoto_1" style="width: 200px;">Photo Size: 300px X 300px<br>
                      File size max: 200 Kb<br>
                      Format:  jpg</span>
          </span>
        </font> 
      <span id="edit1_Photo_0" class="rnr-nowrap">
        <div class="row fileupload-buttonbar">
            <div class="span7">
 				<span class="btn btn-success fileinput-button rnr-visibleelem">
            
            <img id="preview-img" src="noimage" height="100" width="100">
            <input type="file" name="file" id="file" required>

				</span>

        </div>
        <table>
      </tr>
    </tbody>
  </table>
  <tr class="" style="height: 86px;">
    <td class="rnr-label" style="width: 60px; height: 80px; white-space: normal;" rowspan="1" colspan="4">
    <center><input type="submit" value="Submit"></center>
  </span>
</form>
</span>
</td></tr>
</tbody>
</table>
</div><strong></strong> 
<div class="rnr-brickcontents style2 rnr-b-editbuttons ">
</div> </div></div></div> 
</div></div>
<div class="rnr-middle">
<div class="rnr-left "></div>
<div class="rnr-center "></div>
<div class="rnr-right "></div></div>
<div class="rnr-bottom "></div></div>
<div id="yui3-css-stamp" style="position: absolute !important; visibility: hidden !important" class=""></div><div id="shiny_box" class="shiny_box _hintBox" style="display: none;"><div class="shiny_box_body rnr-panel rnr-list"></div></div>

<script src="<?php echo base_url() ?>resource/js/jquery-3.1.1.min.js"></script>

<script type='text/javascript'>
    
    $(document).ready(function(){
        
        $('#select_group').change(function(){
            var group4 = $(this).val();

            // AJAX request
            $.ajax({
                url:'<?=base_url()?>index.php/Web_frontend_controller/subj4',
                method: 'post',
                data: {sub_group_4: group4},
                dataType: 'json',
                success: function(response){

                    // Remove options
                    $('#subject4').find('option').not(':first').remove();

                    // Add options
                    $.each(response,function(index,data){
                        $('#subject4').append('<option value="'+data['subject_name_4']+'">'+data['subject_name_4']+'</option>');
                    });
                }
            });
        });
    });
</script>

<script type='text/javascript'>
    
    $(document).ready(function(){
        
        $('#select_group').change(function(){
            var group5 = $(this).val();

            // AJAX request
            $.ajax({
                url:'<?=base_url()?>index.php/Web_frontend_controller/subj5',
                method: 'post',
                data: {sub_group_5: group5},
                dataType: 'json',
                success: function(response){

                    // Remove options
                    $('#subject5').find('option').not(':first').remove();

                    // Add options
                    $.each(response,function(index,data){
                        $('#subject5').append('<option value="'+data['subject_name_5']+'">'+data['subject_name_5']+'</option>');
                    });
                }
            });
        });
    });
</script>

<script type='text/javascript'>
    
    $(document).ready(function(){
        
        $('#select_group').change(function(){
            var group6 = $(this).val();

            // AJAX request
            $.ajax({
                url:'<?=base_url()?>index.php/Web_frontend_controller/subj6',
                method: 'post',
                data: {sub_group_6: group6},
                dataType: 'json',
                success: function(response){

                    // Remove options
                    $('#subject6').find('option').not(':first').remove();

                    // Add options
                    $.each(response,function(index,data){
                        $('#subject6').append('<option value="'+data['subject_name_6']+'">'+data['subject_name_6']+'</option>');
                    });
                }
            });
        });
    });
</script>

<script type='text/javascript'>
    
    $(document).ready(function(){
        
        $('#select_group').change(function(){
            var group7 = $(this).val();

            // AJAX request
            $.ajax({
                url:'<?=base_url()?>index.php/Web_frontend_controller/subj7',
                method: 'post',
                data: {sub_group_7: group7},
                dataType: 'json',
                success: function(response){

                    // Remove options
                    $('#subject7').find('option').not(':first').remove();

                    // Add options
                    $.each(response,function(index,data){
                        $('#subject7').append('<option value="'+data['subject_name_7']+'">'+data['subject_name_7']+'</option>');
                    });
                }
            });
        });
    });
</script>

<script type="text/javascript">

function noPreview() {
  $('#image-preview-div').css("display", "none");
  $('#preview-img').attr('src', 'noimage');
  $('upload-button').attr('disabled', '');
}

function selectImage(e) {
  $('#file').css("color", "green");
  $('#image-preview-div').css("display", "block");
  $('#preview-img').attr('src', e.target.result);
  $('#preview-img').css('max-width', '550px');
}

$(document).ready(function (e) {

  var maxsize = 500 * 1024; // 500 KB

  $('#max-size').html((maxsize/1024).toFixed(2));

  $('#upload-image-form').on('submit', function(e) {

    e.preventDefault();

    $('#message').empty();
    $('#loading').show();

    $.ajax({
      url: "upload-image.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {
        $('#loading').hide();
        $('#message').html(data);
      }
    });

  });

  $('#file').change(function() {

    $('#message').empty();

    var file = this.files[0];
    var match = ["image/jpeg", "image/png", "image/jpg"];

    if ( !( (file.type == match[0]) || (file.type == match[1]) || (file.type == match[2]) ) )
    {
      noPreview();

      $('#message').html('<div class="alert alert-warning" role="alert">Unvalid image format. Allowed formats: JPG, JPEG, PNG.</div>');

      return false;
    }

    if ( file.size > maxsize )
    {
      noPreview();

      $('#message').html('<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is ' + (file.size/1024).toFixed(2) + ' KB, maximum size allowed is ' + (maxsize/1024).toFixed(2) + ' KB</div>');

      return false;
    }

    $('#upload-button').removeAttr("disabled");

    var reader = new FileReader();
    reader.onload = selectImage;
    reader.readAsDataURL(this.files[0]);

  });

});
  
</script>

</body>
</html>