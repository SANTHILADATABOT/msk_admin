<?php 
require_once('dbConnect.php');

function dashboard_purchase(){
	global $pdo_conn;	
	$count=0;
	
	$sql ="SELECT sum(net) as net FROM purchasemain WHERE delete_status !='1' AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$list = $prepare->fetchAll();
		if(count($list) == '1'){
			$count = $list[0]['net'];
			if(empty($count)){
				$count =0;
			}
		}
	}
	return $count;
}

function dashboard_sales(){
	global $pdo_conn;	
	$count=0;
	
	$sql ="SELECT sum(net) as net FROM salesentrymain WHERE delete_status !='1' AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$list = $prepare->fetchAll();
		if(count($list) == '1'){
			$count = $list[0]['net'];
			if(empty($count)){
				$count =0;
			}
		}
	}
	return $count;
}
function dashboard_payment(){
	global $pdo_conn;	
	$count=0;
	
	$sql ="SELECT sum(paid_amount) as net FROM paymententry WHERE delete_status !='1' AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$list = $prepare->fetchAll();
		if(count($list) == '1'){
			$count = $list[0]['net'];
			if(empty($count)){
				$count =0;
			}
		}
	}
	return $count;
}
function dashboard_receipt(){
	global $pdo_conn;	
	$count=0;
	
	$sql ="SELECT sum(paid_amount) as net FROM receiptentry WHERE delete_status !='1' AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$list = $prepare->fetchAll();
		if(count($list) == '1'){
			$count = $list[0]['net'];
			if(empty($count)){
				$count =0;
			}
		}
	}
	return $count;
}
	
function stocklist(){
	global $pdo_conn;
	$sql =''; $data='';
	
/************************QUERY STARTS**********************************************/
	
	$sql = "SELECT * FROM (SELECT *, ";
	
	$sql .= "(open_stock+stockinproject+stockinretail+stockinquickpurchase) as pur_qty, ";
	
	$sql .= "(stockoutproject+stockoutretail) as sal_qty, ";
	
	$sql .= "round((open_stock+stockinproject+stockinretail+stockinquickpurchase)-(stockoutproject+stockoutretail), 0) as clo_qty";
	
	$sql .= ", CASE WHEN (((open_stock+stockinproject+stockinretail+stockinquickpurchase)-(stockoutproject+stockoutretail))<= minimum_stock) THEN '1' ELSE '0' END AS stockalert";
	
	$sql .= " FROM (";
	
	$sql .= "SELECT rs.minimum_stock, rs.open_stock, ib.itembase_id as ibase, rs.item_base as rbase, rs.units as runits, ib.item_code as hsn, ib.item_base as basename, ib.item_category as categoryid, ib.brand_name as brandid, ib.item_name as itemid, ";
	
	$sql .= "IFNULL((SELECT sum(stock_in) FROM stockinproject sip WHERE sip.item_id=rs.item_base AND sip.units = rs.units GROUP BY sip.item_id, sip.units),0) AS stockinproject, ";
	
	$sql .= "IFNULL((SELECT sum(stock_in) FROM stockinretail sir WHERE sir.item_id=rs.item_base AND sir.units = rs.units GROUP BY sir.item_id, sir.units),0) AS stockinretail, ";
	
	$sql .= "IFNULL((SELECT sum(stock_in) FROM stockinquickpurchase sqp WHERE sqp.item_id=rs.item_base AND sqp.units = rs.units GROUP BY sqp.item_id, sqp.units),0) AS stockinquickpurchase, ";
	
	$sql .= "IFNULL((SELECT sum(stock_out) FROM stockoutproject sop WHERE sop.item_id=rs.item_base AND sop.units = rs.units GROUP BY sop.item_id, sop.units),0) AS stockoutproject, ";
	
	$sql .= "IFNULL((SELECT sum(stock_out) FROM stockoutretail sor WHERE sor.item_id=rs.item_base AND sor.units = rs.units GROUP BY sor.item_id, sor.units),0) AS stockoutretail ";
	
	$sql .= " FROM itembase ib JOIN ratefixingsublist rs ON rs.item_base = ib.itembase_id WHERE ib.delete_status != '1' ";
	
	$sql .= " ) AS stockclose ";
	$sql .= " ) AS stocklist WHERE stockalert = '1' ";
	
	$sql .= " ORDER BY stockalert DESC limit 0,5";

/************************QUERY ENDS**********************************************/
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	$color = array('0'=>'badge-danger', '1'=>'badge-warning', '2'=>'badge-brown', '3'=>'badge-info', '4'=>'badge-purple');
	if($exc == TRUE){
		$list = $prepare->fetchAll();		
		if(count($list) > 0){
			for($i=0;$i<count($list);$i++){			
				$unitsname		= unit_name($list[$i]['runits']);
				$item_name = item_name($value['item_name']);
				$item = $item_name[0]['item_name'].' - '.$item_name[0]['item_base'].' / '.$item_name[0]['item_code'];
				$data .='<a class="media media-single">
						  <span class="title">'.$item.' - '.$unitsname.'</span>
						  <span class="badge badge-pill '.$color[$i].'">'.$list[$i]['clo_qty'].'/'.$list[$i]['minimum_stock'].'</span>
						</a>';
			}
		}else{
			$data = '<a class="media media-single"><span>List Empty</span></a>';
		}
	}else{
		$data = 'Process Failed';
	}
		
	return $data;
}

function customerfolowup(){
	global $pdo_conn;
	$sql =''; $data='';
	
	$sql = "SELECT SQL_CALC_FOUND_ROWS *, (due_days - days) as remain_due_days FROM (";
	
	$sql .="SELECT salesentrymain_id as id, date, sales_type as type, ledger_name as name, invoice_no as no, net as total,";

	$sql .=" IFNULL((SELECT balance_amount FROM receiptentry WHERE invoice_no=sm.salesentrymain_id order by receiptentry_id desc limit 1),sm.net) as balance, "; 
	$sql .="DATEDIFF(CURDATE(), sm.date) AS days, "; 
	
	$sql .="IFNULL((SELECT due_days FROM ledgercreation WHERE ledgercreation_id = sm.ledger_name),0) as due_days, "; 
	
	$sql .="IFNULL((SELECT mobile_no FROM ledgercreation WHERE ledgercreation_id = sm.ledger_name),'') as mobile "; 
	
	$sql .="FROM salesentrymain sm WHERE delete_status !='1' ORDER BY sm.salesentrymain_id DESC limit 0,5";
	
	$sql .= ") as sale WHERE (balance !=0 OR balance IS NULL) ORDER BY remain_due_days ASC";
	
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$list = $prepare->fetchAll();
		if(count($list) > 0){
			$color = array('0'=>'badge-primary', '1'=>'badge-brown', '2'=>'badge-info', '3'=>'badge-warning', '4'=>'badge-danger');
			for($i=0;$i<count($list);$i++){
				$ledger_name = ''; $balance_amt = ''; $ledger_mobile ='';
								
				if(!is_numeric($list[$i]['name'])){
					$ledger_name = ucfirst($list[$i]['name']);
				}else{
					$ledger_mobile = ' - '.$list[$i]['mobile'];
					$ledgername = ledger_name($list[$i]['name']);
					$ledger_name = $ledgername[0]['ledger_name'];
				}
				$balance_amt = number_format($list[$i]['balance'],2);
				
				$data .='<a class="media media-single">
							<span class="title">'.$ledger_name.$ledger_mobile.'</span>
							<span class="badge badge-pill '.$color[$i].'">'.$balance_amt.'</span>
						</a>';
			}
		}else{
			$data = '<a class="media media-single">
						<span class="title">List Empty</span>
						<span class="badge badge-pill badge-secondary"></span>
					</a>';
		}

	}else{
		$data = 'Process Failed';
	}
		
	return $data;

}

function mostsale(){
	global $pdo_conn;
	$sql =''; $data='';
	
	$sql ="SELECT SQL_CALC_FOUND_ROWS *, (stockoutproject+stockoutretail) as sal_qty, (totaloutproject+totaloutretail) as sal_total FROM ( ";
	
	$sql .="SELECT ib.itembase_id as ibase, rs.item_base as rbase, rs.units as runits, ib.item_code as hsn, ib.item_base as basename, ib.item_category as categoryid, ib.brand_name as brandid, ib.item_name as itemid, ";
	
	$sql .="IFNULL((SELECT sum(stock_out) FROM stockoutproject sop WHERE sop.item_id=rs.item_base AND sop.units = rs.units GROUP BY sop.item_id, sop.units),0) AS stockoutproject, ";
	
	$sql .="IFNULL((SELECT sum(stock_out) FROM stockoutretail sor WHERE sor.item_id=rs.item_base AND sor.units = rs.units GROUP BY sor.item_id, sor.units),0) AS stockoutretail, ";
	
	$sql .="IFNULL((SELECT sum(total_price) FROM stockoutproject sop WHERE sop.item_id=rs.item_base AND sop.units = rs.units GROUP BY sop.item_id, sop.units),0) AS totaloutproject, ";
	
	$sql .="IFNULL((SELECT sum(total_price) FROM stockoutretail sor WHERE sor.item_id=rs.item_base AND sor.units = rs.units GROUP BY sor.item_id, sor.units),0) AS totaloutretail ";
	
	$sql .="FROM itembase ib ";
	
	$sql .="JOIN ratefixingsublist rs ON rs.item_base = ib.itembase_id WHERE ib.delete_status != '1'
) AS stockreport ORDER By sal_qty DESC limit 0,5";

	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$list = $prepare->fetchAll();
		if(count($list) > 0){
			$color = array('0'=>'badge-success', '1'=>'badge-info', '2'=>'badge-warning', '3'=>'badge-primary', '4'=>'badge-brown');
			for($i=0;$i<count($list);$i++){
				$unitsname		= unit_name($list[$i]['runits']);
				$item_name = item_name($value['item_name']);
				$item = $item_name[0]['item_name'].' - '.$item_name[0]['item_base'].' / '.$item_name[0]['item_code'];				
				
				$data .= '<a class="media media-single">
						  <span class="title">'.$item.' - '.$unitsname.'</span>
						  <span class="badge badge-pill '.$color[$i].'">'.$list[$i]['sal_total'].'</span>
						</a>';
			}
		}else{
			$data = '<a class="media media-single">
					  <span class="title">List Empty</span>
					  <span class="badge badge-pill badge-secondary"></span>
					</a>';
		}
	}else{
		//$data = 'Process Failed';
		$data = $exc.$pdo_conn->errorInfo();
	}
		
	return $data;

}

function abandonedcustomer(){
	global $pdo_conn;
	$sql =''; $data='';
	
	$sql = "SELECT * FROM( SELECT ledger_name as lid,  ABS(DATEDIFF(date, CURDATE())) AS days FROM salesentrymain WHERE salesentrymain_id IN ( SELECT MAX(salesentrymain_id) FROM salesentrymain GROUP BY ledger_name ) AND date < DATE_SUB(CURDATE(),INTERVAL 30 DAY) ) AS saleday ORDER BY days DESC limit 0,5";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$list = $prepare->fetchAll();
		if(count($list) > 0){
			for($i=0;$i<count($list);$i++){
				$ledger = ledger_name($list[$i]['lid']);
				$data .='<div class="media">
					  <div class="media-body">
						<p>
						  <a><strong>'.$ledger[0]['ledger_name'].'</strong></a>
						   <small class="sidetitle">Last sale: '.$list[$i]['days'].' days ago</small>						  
						</p>
						<p><strong><em>'.$ledger[0]['mobile_no'].'</em></strong></p>
						<p><strong><em>'.$ledger[0]['mail_id'].'</em></strong></p>
					  </div>					  
					</div>';
			}
		}else{
			$data ='<div class="media">
					  <div class="media-body">
						<p>
						  <a><strong>List Empty</strong></a>
						 </p>
					</div>
					</div>';
		}
	}else{
		$data = 'Process Failed';
	}
	return $data;
}
?>