<?php 
// File: commonfunction1
// Prepared By : sanjjeev
// Date : 29-8-2019
// Update By: Date:
// Update By: Date:

//expense_type_details
function expense_type_detail($expense_type_id='') {
  global $pdo_conn;
  $expense_type_name = array();
  $condition = '';

  if ($expense_type_id!='') {
    $condition = " AND expense_type_id='".$expense_type_id."' ";
  }

  $sql = "SELECT * FROM expensetype WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $expense_type = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $expense_type;

}  


//bankmaster_details
function bankmaster_detail($bankmaster_id='') {
  global $pdo_conn;
  $bankmaster = array();
  $condition = '';

  if ($bankmaster_id!='') {
    $condition = " AND bankmaster_id='".$bankmaster_id."' ";
  }

  $sql = "SELECT * FROM bankmaster WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $bankmaster = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $bankmaster;

} 

function bankmaster() {
  global $pdo_conn;
  $bankmaster = array();
  
  $sql = "SELECT * FROM bankmaster WHERE delete_status!='1'";
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $bankmaster = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $bankmaster;

} 

//vehiclemaster
function vehiclemaster_detail($vehicle_master_id='') {
  global $pdo_conn;
  $vehiclemaster = array();
  $condition = '';

  if ($vehicle_master_id!='') {
    $condition = " AND vehicle_master_id='".$vehicle_master_id."' ";
  }

  $sql = "SELECT * FROM vehiclemaster WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $vehiclemaster = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $vehiclemaster;

} 

//vendorpurchase
function vendorpurchasemainlist($purchase_no='') {
  global $pdo_conn;
  $vendorpurchase = array();
  $condition = '';

  if ($purchase_no!='') {
    $condition = " AND purchase_no='".$purchase_no."' ";
  }

  $sql = "SELECT * FROM vendorpurchase WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $vendorpurchase = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $vendorpurchase;

}

//vendorpurchase sublist
function vendorpurchasesublist($purchase_no='') {
  global $pdo_conn;
  $vendorpurchase_sub = array();
  $condition = '';

  if ($purchase_no!='') {
    $condition = " AND purchase_no='".$purchase_no."' ";
  }

  $sql = "SELECT * FROM vendorpurchase_sublist WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $vendorpurchase_sub = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $vendorpurchase_sub;

}


//salespurchase
function salespurchasemainlist($bill_no='') {
  global $pdo_conn;
  $salespurchase = array();
  $condition = '';

  if ($bil_no!='') {
    $condition = " AND bill_no='".$bill_no."' ";
  }

  $sql = "SELECT * FROM salespurchase WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $salespurchase = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $salespurchase;

}

function get_salespurchase_bill_no($salespurchase_id)
{
  global $pdo_conn;
  $salespurchase = array();
  $condition = '';

  if ($bil_no!='') {
    $condition = " AND salespurchase_id='".$salespurchase_id."' ";
  }

  $sql = "SELECT * FROM salespurchase WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $salespurchase_bill_no = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $salespurchase_bill_no;
}

function salespurchase_bill_list($customer_id='')
{
  global $pdo_conn;
  $salespurchase_bills = array();
  $condition = '';

  if (!empty($customer_id)) {

    $condition = " AND customer_name='".$customer_id."' ";

  }
    
    $sql = "SELECT bill_no,salespurchase_id FROM salespurchase WHERE delete_status!='1'".$condition;
    $prepare = $pdo_conn->prepare($sql);
    $exc = $prepare->execute();
    $bill_nos = $prepare->fetchall(PDO::FETCH_ASSOC);

    return $bill_nos;
}

//salespurchase sublist
function salespurchasesublist($bill_no='') {
  global $pdo_conn;
  $salespurchase_sub = '';$sql= '';
  $condition = '';
  $roll_id = 1;
  $salespurchase_sub_otp = array();
   if(!empty($bill_no)){     
      $sql = "SELECT * FROM salespurchase_sublist WHERE bill_no = '".$bill_no."' AND delete_status != '1'";
        $select_con_list=$pdo_conn->prepare($sql);
        $select_con_list->execute();
        $conlist = $select_con_list->fetchAll();
    $data = '';
    $amount = 0; $subtotal=0; $discount=0; $net=0;


  foreach ($conlist as $value) {
    $item_name = itemname_detail($value['item_name']);
    $item_name = $item_name[0]['item_name'];
    $uomname = uom_detail($value['uom']);
    $uomname = $uomname[0]['uom'];
    $data .= '<tr>
      <td>'.$roll_id.'</td>
      <td>'.$item_name.'</td>
      <td>'.$value['quantity'].'</td>
      <td>'.$uomname.'</td>
      <td>'.$value['rate'].'</td>
      <td>'.$value['amount'].'</td>
      <td><a href="#" id="'.$value['salespurchase_sub_id'].'" onclick="salespurchase_sub_edit('.$value['salespurchase_sub_id'].')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>    
        <a href="#" id="'.$value['salespurchase_sub_id'].'" onclick="salespurchase_sub_del('.$value['salespurchase_sub_id'].')" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
    </tr>';

    $amount += $value['amount'];
    $roll_id ++;
   
  }
  
  }
   $salespurchase_sub_otp = array('data' => $data, 'amount' => $amount);
  return $salespurchase_sub_otp;
}


function receiptentry_detail($receiptentry_id='') {
  global $pdo_conn;
  $subcustomer_name = array();
  $condition = '';

  if ($subcustomer_id!='') {
    $condition = " AND receiptentry_id='".$subcustomer_id."' ";
  }

  $sql = "SELECT * FROM receiptentry WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $receiptentries = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $receiptentries;

} 

//tbody vendor sublist
function vendorpurchase_sub_list($purchase_no = '', $type = ''){
    global $pdo_conn;
    $vendorpurchase_sublist = ''; $sql='';
    $amount = 0;
    $roll_id = 1;
    if(!empty($purchase_no)){     
      $sql = "SELECT * FROM vendorpurchase_sublist WHERE purchase_no = '".$purchase_no."' AND delete_status != 1 ORDER BY purchase_no DESC";
      $select_con_list=$pdo_conn->prepare($sql);
      $select_con_list->execute();
      $conlist = $select_con_list->fetchAll();
      foreach($conlist as $value){       
        $uomname = uom_detail($value['uom']);
        $uomname1 = $uomname[0]['uom'];  
        $item_name = itemname_detail($value['item_name']); 
        $item_name1 = $item_name[0]['item_name'];
        $vendorpurchase_sublist .='<tr>
                    <td>'.$roll_id.'</td>
                    <td>'.$item_name1.'</td>
                    <td>'.$uomname1.'</td>                    
                    <td>'.$value['quantity'].'</td>
                    <td>'.$value['rate'].'</td>                                                         
                    <td>'.$value['amount'].'</td>';                                     
        //if($type != 'approve' ){
        $vendorpurchase_sublist .= '<td id="colaction">
                      <a href="#" id="'.$value['vendorpurchase_sub_id'].'" onclick="vendorpurchase_sub_edit('.$value['vendorpurchase_sub_id'].')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>    
                      <a href="#" id="'.$value['vendorpurchase_sub_id'].'" onclick="vendorpurchase_sub_del('.$value['vendorpurchase_sub_id'].')" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>              
                    </td>';
        //}
      $vendorpurchase_sublist .= '</tr>';      
      $roll_id++;
      $amount += $value['amount'];
      $subtotal = $amount;
      $net = $amount;
      }
    }    
    $vendorsublist = array('data'=> $vendorpurchase_sublist, 'amount'=>$amount,'sql'=> $sql);
    
    return $vendorsublist;
}

//drive master
function drive_master($drivermaster_id='') {
  global $pdo_conn;
  $drivermaster = array();
  $condition = '';

  if ($drivermaster_id!='') {
    $condition = " AND drivermaster_id='".$drivermaster_id."' ";
  }

  $sql = "SELECT * FROM drivermaster WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $drivermaster = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $drivermaster;

}

// Payment_Mode getter
function get_payment_mode($key='ALL')
{
  switch ($key) {
    case '1':
      return 'Cash';
      break;
    case '2':
      return 'Cheque';
      break;
    case '3':
      return 'NEFT';
      break;
    case 'ALL':
      $modes = array('1'=>'Cash','2'=>'Cheque','3'=>'NEFT');
      return $modes;
      break;
    default:
      return;
      break;
  }
}

?>