
<style type="text/css">
.style1 {font-weight:normal;font-family:calibri;font-size: 14px;}
.style2 {font-weight:normal;font-family:calibri;font-size: 16px;}
.style3 {font-weight:bold; text-align:right;font-family:calibri;font-size: 12px;}
.style4 {font-weight:bold; font-family:calibri;font-size: 16px;}
.style5 {font-family:calibri;font-weight: bold;font-size: 18px;}
.style6 {font-family:calibri;font-weight: bold;font-size: 16px;}
.style10{ border-top: solid 1px; border-top-color:#BFBFBF;}
.bottom{ border-bottom: solid 1px; border-bottom-color:#BFBFBF;}
.right{ border-right: solid 1px; border-bottom-color:#BFBFBF;}
</style>
<?php 
error_reporting(0);
session_start();
include ("../inc/commonfunction.php");

$cur_date=date('Y-m-d');

$wanted_data=$_REQUEST['wanted_data'];

$country_id=$_GET['country_id'];
$area_id=$_GET['area_id'];
$city_id=$_GET['city_id'];
$state_id=$_GET['state_id'];
$district_id=$_GET['district_id'];


$query='';

$user_country_id =   $_SESSION['country_id'];
$user_state_id =   $_SESSION['state_id'];
$user_district_id =   $_SESSION['district_id'];
$user_city_id =   $_SESSION['city_id'];
$user_area_id =   $_SESSION['area_id'];
$user_type  =   $_SESSION['user_roll'];

 function val_of_family_name($exp_val)
    {
        $i=1;
	    global $pdo_conn;
        $get_val=explode(",",$exp_val);
        $get_count=count($get_val);
        foreach($get_val as  $val_get)
        {
             if($i==$get_count) {$val_con="";  } else {$val_con=","; }
             $findrelationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where id='".$val_get."'");
             $findrelationship->execute();
             $fetrelationship_list = $findrelationship->fetch();
             $get_val_name.=$fetrelationship_list['family_head_name'].$val_con;
              $i++;
        }
    
      return   $get_val_name;
         
} 	 
?>
 


	

<div id="daybook_report_prints">
	<table width="100%" cellspacing="0" cellpadding="0">
         <tr>
			<td rowspan='3' width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
	<?php
	if($wanted_data=='Medical'){
	    ?>
			<td height="37" align="center" class="style5">2. <?php echo $wanted_data;?> (Surgery) </td>
			<?php
	}else if($wanted_data=='medicine'){
	?>
	<td height="37" align="center" class="style5">3. Medicine Tablet (Monthly Expenses)</td>
	<?php
	}
	?>
        </tr>
        <?php include('quran.php'); ?>
        <tr>
            <td></td>
            <td><b>Country : </b><?php echo get_country_name($country_id);?></td>
            <td><b>State : </b><?php echo get_state_name($state_id);?></td>
            <td><b>District : </b><?php echo get_district_name($district_id);?></td>
        </tr>
        
        <tr>
            <td></td>
            <td><b>City : </b><?php echo get_city_name($city_id)?></td>
            <td><b>Area : </b><?php echo get_area_name($area_id);?></td>
        </tr>

	</table>
	<br>
    <table width="100%" cellspacing="0" cellpadding="0">
	
	  <tr>
            <td width="5%" height="27" align="center" class="style10 style4 right"><strong>S.No</strong></td>
            <td width="6%" align="center" class="style10 style4 right"><strong>&nbsp;F.No</strong></td>
            <?php
            if($wanted_data=='Medical'){
            ?>
			 <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Disease Details</strong></td>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Surgery Disease Details</strong></td>
             <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Name(Surgery)</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Mon Exp On Medicine</strong></td>
			<td width="14%" align="center" class="style10 style4 right bottom"><strong>&nbsp;Name(Mon Exp)</strong></td>
			<?php
            }else if($wanted_data=='medicine'){
            ?>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Name</strong></td>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Disease</strong></td>
             <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Amount</strong></td>
             <?php
            }
            ?>
            <td width="14%" align="center" class="style10 style4 right bottom"><strong>&nbsp;Phone No</strong></td>
			
			 <td width="14%" align="center" class="style10 style4 right bottom"><strong>&nbsp;Apply</strong></td>
			
	  </tr>
        <tr>
		
				<td height="0" colspan="7" align="center" class="style10 style3 right" ></td>
        </tr>
        <?php 
	
		if($user_type=='1')
{
	$user_type_area_query='';	 
}
else if($user_type=='2')
{
	$user_type_area_query='  and a.country_id="'.$user_country_id.'"';	 
}
else if($user_type=='3')
{
	$user_type_area_query='  and a.country_id="'.$user_country_id.'"  and a.state_id="'.$user_state_id.'" ';
}
else if($user_type=='4')
{
	$user_type_area_query='  and a.country_id="'.$user_country_id.'" and a.state_id="'.$user_state_id.'" and a.district_id="'.$user_district_id.'"';
}
else if($user_type=='5')
{
    $user_type_area_query='  and a.country_id="'.$user_country_id.'" and a.state_id="'.$user_state_id.'" and a.district_id="'.$user_district_id.'" and a.city_id="'.$user_city_id.'"';	  
}
else if ($user_type=='6') {
	$user_type_area_query='  and a.country_id="'.$user_country_id.'" and a.state_id="'.$user_state_id.'" and a.district_id="'.$user_district_id.'" and a.city_id="'.$user_city_id.'" and a.area_id="'.$user_area_id.'"';
}
	
                                if($country_id!='')
                                {
                                	$area_query.='   and a.country_id="'.$country_id.'"';
                                }
                                
                                if($state_id!='')
                                {
                                	$area_query.='   and a.state_id="'.$state_id.'"';
                                }
                                
                                if($district_id!='')
                                {
                                	$area_query.='   and a.district_id="'.$district_id.'"';
                                }
                                
                                if($city_id!='')
                                {
                                	$area_query.='   and a.city_id="'.$city_id.'"';
                                }
                                
                                
                                if($area_id!='')
                                {
                                	$area_query.='   and a.area_id="'.$area_id.'"';
                                }


if($wanted_data=='Medical'){
$survey_sub_medical = $pdo_conn->prepare("SELECT DISTINCT a.country_id,a.district_id,a.state_id,a.city_id,a.area_id,a.survey_id,a.unique_no,a.family_no,b.disease_details,b.surgery_details,b.surgery_details_no,b.mon_exp_on_medicine,b.mon_exp_on_medicine_no,a.contact_no FROM  fact_family_disease b left join fact_finding_form a ON a.unique_no=b.unique_no WHERE  b.delete_status!='1' and a.user_id!='0' and a.delete_status!='1' $area_query $user_type_area_query ORDER BY a.survey_id DESC");
}else if($wanted_data=='medicine'){
    $survey_sub_medical = $pdo_conn->prepare("SELECT DISTINCT a.country_id,a.district_id,a.state_id,a.city_id,a.area_id,a.survey_id,a.unique_no,a.family_no,b.disease_details,b.surgery_details,b.surgery_details_no,b.mon_exp_on_medicine,b.mon_exp_on_medicine_no,a.contact_no FROM  fact_family_disease b left join fact_finding_form a ON a.unique_no=b.unique_no WHERE  b.delete_status!='1' and a.user_id!='0' and a.delete_status!='1' AND b.disease_details!='' and b.mon_exp_on_medicine!='' $area_query $user_type_area_query ORDER BY a.survey_id DESC");
}						

        
 $survey_sub_medical->execute();
 $med_survey_list_sub = $survey_sub_medical->fetchall();//echo "<pre>";print_r($survey_list_sub);echo "</pre>";
 if(!empty($med_survey_list_sub))
 {
         foreach ($med_survey_list_sub as $record1)
         {
              
                $names = explode(',',$record1['mon_exp_on_medicine_no']);
                $name='';
	    foreach($names as $na){
	        $name .= val_of_family_name($na).', ';
	    }

 ?>
	
	<tr>
            	<td align="center" height="25" class="style2 right bottom"><?php echo $i = $i+1; ?></td>
                <td align="center" class="style2 right bottom">&nbsp;<?php echo $record1[family_no];?></td>
<?php
if($wanted_data=='Medical'){
?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $record1['disease_details']; ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php echo $record1[surgery_details]; ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php echo val_of_family_name($record1[surgery_details_no]); ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php echo $record1[mon_exp_on_medicine]; ?></td>
							<td align="center" class="style2 right bottom ">&nbsp;<?php echo val_of_family_name($record1[mon_exp_on_medicine_no]); ?></td>
					<?php
}else if($wanted_data=='medicine'){
?>
<td align="center" class="style2 right bottom">&nbsp;<?php if($record1['mon_exp_on_medicine_no']=='Select' || $record1['mon_exp_on_medicine_no']==''){echo '-';}else { echo rtrim($name,', ');} ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php echo $record1[disease_details]; ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php  echo ($record1[mon_exp_on_medicine]);  ?></td>
<?php
}
?>
							<td align="center" class="style2 right bottom ">&nbsp;<?php echo $record1[contact_no]; ?></td>
					
						
						<td align="center" class="style2 right bottom ">&nbsp;<?php echo ""; ?></td>
					
					<?php
			}	}?>
				
	</tr>
		   

				<td colspan="10" align="right" class="style10 style1" >Printed Date :<?php echo $curdate=date('d-m-Y');?></td>
		
	
     
    </table>
</div>