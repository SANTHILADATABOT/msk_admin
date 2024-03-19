<?php
include('../inc/dbConnect.php');
echo $_POST['state_id'];
?>

<?php
if($_GET['action']=='get_state_list'){
?>
<select name="state_id" id="state_id" required class="form-control select2 item_name">
	<option value="">Select State</option>
		<?php 
		$state = $pdo_conn->prepare("SELECT * FROM state WHERE country_id=$_POST[country_id] AND delete_status!='1' and status='1' ORDER BY state_id ASC");
		$state->execute();
		$state_list = $state->fetchall();
		foreach($state_list as $value) { 
		?>
			<option value="<?php echo $value['state_id']?>"<?php if($value['state_id']==$_POST['state_id']){echo "selected";}?>><?php echo $value['state_name']?></option>
		<?php } ?>
</select>
<?php } ?>
