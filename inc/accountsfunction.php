<?php
include('../inc/dbConnect.php');

/************************************* Account transaction credit***************************************/
function acc_transaction_credit($entryid, $date, $bill_type, $no, $type, $name, $ref_from, $ledgerid, $paymentmode, $credit, $accyear){
	global $pdo_conn;
	$sql =''; $prepare =''; $exc =''; $err=0;
	
	$sql = "INSERT INTO acc_transaction(entry_id, date, bill_type, ref_no, ref_type, ref_name, ref_from, ledger_id, payment_mode, debit, credit, acc_year, delete_status)VALUES(:entry_id, :date, :bill_type, :ref_no, :ref_type, :ref_name, :ref_from, :ledger_id, :payment_mode, :debit, :credit, :acc_year, :delete_status)";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute(array(':entry_id'=>$entryid, ':date'=>$date, ':bill_type'=>$bill_type, ':ref_no'=>$no, ':ref_type'=>$type, ':ref_name'=>$name, ':ref_from'=>$ref_from, ':ledger_id'=>$ledgerid, ':payment_mode'=>$paymentmode, ':debit'=>'', ':credit'=>$credit, ':acc_year'=>$accyear, ':delete_status'=>'0'));	
	
	if($exc == TRUE){
		$err = "1";
	}else{
		$err = $prepare->errorinfo();
	}
	
	return $err;					
	
}
/************************************* Account transaction debit***************************************/
function acc_transaction_debit($entryid, $date, $bill_type, $no, $type, $name, $ref_from, $ledgerid, $paymentmode, $debit, $accyear){
	global $pdo_conn;
	$sql =''; $prepare =''; $exc =''; $err=0;
	
	$sql = "INSERT INTO acc_transaction(entry_id, date, bill_type, ref_no, ref_type, ref_name, ref_from, ledger_id, payment_mode, debit, credit, acc_year, delete_status)VALUES(:entry_id, :date, :bill_type, :ref_no, :ref_type, :ref_name, :ref_from, :ledger_id, :payment_mode, :debit, :credit, :acc_year, :delete_status)";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute(array(':entry_id'=>$entryid, ':date'=>$date, ':bill_type'=>$bill_type, ':ref_no'=>$no, ':ref_type'=>$type, ':ref_name'=>$name, ':ref_from'=>$ref_from, ':ledger_id'=>$ledgerid, ':payment_mode'=>$paymentmode, ':debit'=>$debit, ':credit'=>'', ':acc_year'=>$accyear, ':delete_status'=>'0'));
	
	if($exc == TRUE){
		$err = "1";
	}else{
		$err = $prepare->errorinfo();
	}
	
	return $err;					
						
}
/************************************* Account mode credit***************************************/
function acc_mode_credit($entryid, $date, $bill_type, $no, $type, $name, $ref_from, $ledgerid, $paymentmode, $credit, $accyear){
	global $pdo_conn;
	$sql =''; $prepare =''; $exc =''; $err=0;
	
	$sql = "INSERT INTO acc_mode(entry_id, date, bill_type, ref_no, ref_type, ref_name, ref_from, ledger_id, payment_mode, debit, credit, acc_year, delete_status)VALUES(:entry_id, :date, :bill_type, :ref_no, :ref_type, :ref_name, :ref_from, :ledger_id, :payment_mode, :debit, :credit, :acc_year, :delete_status)";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute(array(':entry_id'=>$entryid, ':date'=>$date, ':bill_type'=>$bill_type, ':ref_no'=>$no, ':ref_type'=>$type, ':ref_name'=>$name, ':ref_from'=>$ref_from, ':ledger_id'=>$ledgerid, ':payment_mode'=>$paymentmode, ':debit'=>'', ':credit'=>$credit, ':acc_year'=>$accyear, ':delete_status'=>'0'));
	
	if($exc == TRUE){
		$err = "1";
	}else{
		$err = $prepare->errorinfo();
	}
	
	return $err;					
	
}
/************************************* Account mode debit***************************************/
function acc_mode_debit($entryid, $date, $bill_type, $no, $type, $name, $ref_from, $ledgerid, $paymentmode, $debit, $accyear){
	global $pdo_conn;
	$sql =''; $prepare =''; $exc =''; $err=0;
	
	$sql = "INSERT INTO acc_mode(entry_id, date, bill_type, ref_no, ref_type, ref_name, ref_from, ledger_id, payment_mode, debit, credit, acc_year, delete_status)VALUES(:entry_id, :date, :bill_type, :ref_no, :ref_type, :ref_name, :ref_from, :ledger_id, :payment_mode, :debit, :credit, :acc_year, :delete_status)";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute(array(':entry_id'=>$entryid, ':date'=>$date, ':bill_type'=>$bill_type, ':ref_no'=>$no, ':ref_type'=>$type, ':ref_name'=>$name, ':ref_from'=>$ref_from, ':ledger_id'=>$ledgerid, ':payment_mode'=>$paymentmode, ':debit'=>$debit, ':credit'=>'', ':acc_year'=>$accyear, ':delete_status'=>'0'));
	
	if($exc == TRUE){
		$err = "1";
	}else{
		$err = $prepare->errorinfo();
	}
	
	return $err;					
	
}
/************************************* Account transaction update***************************************/
function acc_transaction_update($entryid, $date, $bill_type, $no, $type, $name, $ref_from, $ledgerid, $paymentmode, $debit, $credit){
	global $pdo_conn;
	$sql =''; $prepare =''; $exc =''; $err=0; $condition='';
	
	if($debit==''){
		$condition = "AND debit='' ";	
	}else{
		$condition = "AND credit='' ";	
	}
	
	$sql = "UPDATE acc_transaction SET date='".$date."', bill_type='".$bill_type."', ref_type='".$type."', ledger_id='".$ledgerid."', payment_mode='".$paymentmode."', debit='".$debit."', credit='".$credit."' WHERE ref_no ='".$no."' AND ref_name='".$name."' AND ref_from='".$ref_from."' AND entry_id='".$entryid."' ".$condition." AND delete_status !='1' ";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$err = "1";
	}else{
		$err = $prepare->errorinfo();
	}
	return $err;
}
/************************************* Account mode update***************************************/
function acc_mode_update($entryid, $date, $bill_type, $no, $type, $name, $ref_from, $ledgerid, $paymentmode, $debit, $credit){
	global $pdo_conn;
	$sql =''; $prepare =''; $exc =''; $err=0; $condition='';
	
	if($debit==''){
		$condition = "AND debit='' ";	
	}else{
		$condition = "AND credit='' ";	
	}
		
	$sql = "UPDATE acc_mode SET date='".$date."', bill_type='".$bill_type."', ref_type='".$type."', ledger_id='".$ledgerid."', payment_mode='".$paymentmode."', debit='".$debit."', credit='".$credit."' WHERE ref_no ='".$no."' AND ref_name='".$name."'  AND ref_from='".$ref_from."' AND entry_id='".$entryid."' ".$condition." AND delete_status !='1' ";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$err = "1";
	}else{
		$err = $prepare->errorinfo();
	}
	return $err;
}
/************************************* Account delete***************************************/
function acc_delete($entryid, $ref_name, $ref_from){
	global $pdo_conn;
		
	$err_acc=''; $err_mode=''; $status=0;
	$sql="UPDATE acc_mode SET delete_status = 1 WHERE entry_id ='".$entryid."' AND ref_name='".$ref_name."' AND ref_from='".$ref_from."' ";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$err_acc = '1';
	}else{
		$err_acc = $prepare->errorinfo();
	}
	
	$sql1="UPDATE acc_transaction SET delete_status = 1 WHERE entry_id ='".$entryid."' AND ref_name='".$ref_name."' AND ref_from='".$ref_from."' ";
	$prepare1 = $pdo_conn->prepare($sql1);
	$exc1 = $prepare1->execute();
	if($exc1 == TRUE){
		$err_mode='1';
	}else{
		$err_mode = $prepare->errorinfo();
	}
	
	if($err_acc =='1' && $err_mode=='1'){
		$status = '1';
	}else{
		$status = $err_mode.'<br>'.$err_acc;
	}
	return $status;
}

?>