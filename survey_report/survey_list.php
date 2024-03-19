  
<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");
 $wanted=$_POST['wanted'];
 

$query='';

if($wanted=='Job')
{ 
	$query='   and guide_for_emp!=""';
}

else if($wanted=='Medical')
{
	$query='   and disease_details!=""';
}

else if($wanted=='Marriage')
{
	$query='   and marriage_help!=""';
}

else if($wanted=='MSK')
{
	$query='   and interested_to_serve!=""';
}
//echo "query".$query;
 	 
?>
 
 <?php 
 //echo "SELECT * FROM fact_finding_form WHERE delete_status!='1' $query ORDER BY survey_id DESC";
   if(($wanted=="Medical")||($wanted=''))
						  {
						      	$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form a left join fact_family_disease b ON a.unique_no=b.unique_no  WHERE a.delete_status!='1' and b.delete_status!='1'  ORDER BY survey_id DESC");
						  }
						  else
						  {
						  
								$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE delete_status!='1' $query ORDER BY survey_id DESC");
						  }
	$survey->execute();
	$survey_list = $survey->fetchall();

	foreach($survey_list as $value)
	{?>

	   <tr>
		<td><?php echo $roll_id;?></td>
		
		<?php 
		if($wanted=='MSK')
		{
			$name=$value['interest_to_serve_msk_no'];
	    }
		else if($wanted=='Job')
		{
			$name=$value['guide_for_emp'];
	    }
		else if($wanted=='Medical')
		{
			$name=$value['disease_no'];
	    }
		else if($wanted=='Marriage')
		{
			$name=$value['marriage_help'];
	    }
		
		
		
		?>
	 
			<td><?php echo $name;?></td>
	    <td><?php echo $value['contact_no']; ?></td>
		<td><?php echo get_country_name($value['country_id']);	?>	</td>
		<td><?php echo get_state_name($value['state_id']); ?></td>
		<td><?php echo  get_district_name($value['district_id']); ?></td>
		<td><?php echo  get_city_name($value['city_id']); ?></td> 
		<td><?php echo  get_area_name($value['area_id']); ?></td>
	    <td> 
  	 	<a onclick="survey_view('<?php echo $value['survey_id']  ?>')" title="view"><i class="fa fa-eye" aria-hidden="true"></i>
   		</a>   
   	<!--	<a href="#" title="View" id="quotation_view_modal" onclick="survey_view('<?php echo $value['survey_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  -->

   
  		</td>
	</tr>
						
	<?php $roll_id+=1;}
	?>
 
	
									
						
						
						
				 
			 