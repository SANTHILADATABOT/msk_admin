<?php 


function vehicleservicetype_detail($vehicleservicetype_id='') {
  global $pdo_conn;
  $vehicleservicetype = array();
  $condition = '';

  if ($vehicleservicetype_id!='') {
    $condition = " AND vehicleservicetype_id='".$vehicleservicetype_id."' ";
  }

  $sql = "SELECT * FROM vehicleservicetype WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $vehicleservicetype = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $vehicleservicetype;

} 

function uom_detail($uom_id='') {
  global $pdo_conn;
  $uom = array();
  $condition = '';

  if ($uom_id!='') {
    $condition = " AND uom_id='".$uom_id."' ";
  }

  $sql = "SELECT * FROM uom WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $uom_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $uom_result;

} 


function employeetype_detail($employeetype_id='') {
  global $pdo_conn;
  $employeetype = array();
  $condition = '';

  if ($employeetype_id!='') {
    $condition = " AND employeetype_id='".$employeetype_id."' ";
  }

  $sql = "SELECT * FROM employeetype WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $employeetype_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $employeetype_result;

} 
function employeetype() {
  global $pdo_conn;
  $employeetype = array();
  

  
  $sql = "SELECT * FROM employeetype WHERE delete_status!='1'";
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $employeetype_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $employeetype_result;

} 

function vendorcreation_detail($vendorcreation_id='') {
  global $pdo_conn;
  $vendorcreation = array();
  $condition = '';

  if ($vendorcreation_id!='') {
    $condition = " AND vendorcreation_id='".$vendorcreation_id."' ";
  }

  $sql = "SELECT * FROM vendorcreation WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $vendorcreation_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $vendorcreation_result;

} 

function vendorcreation1_detail() {
  global $pdo_conn;
  $vendorcreation = array();
  

 

  $sql = "SELECT * FROM vendorcreation WHERE delete_status!='1'";
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $vendorcreation_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $vendorcreation_result;

} 

function itemname() {
  global $pdo_conn;
  $itemname= array();
  

 

  $sql = "SELECT * FROM item_name WHERE delete_status!='1'";
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $itemname_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $itemname_result;

} 

function employeemaster_detail($employeemaster_id='') {
  global $pdo_conn;
  $employeemaster = array();
  $condition = '';

  if ($employeemaster_id!='') {
    $condition = " AND employeemaster_id='".$employeemaster_id."' ";
  }

  $sql = "SELECT * FROM employeemaster WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $employeemaster_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $employeemaster_result;

} 

function damageentry_sub_detail($damageentry_sub_id='') {
  global $pdo_conn;
  $employeemaster = array();
  $condition = '';

  if ($damageentry_sub_id!='') {
    $condition = " AND damageentry_sub_id='".$damageentry_sub_id."' ";
  }

  $sql = "SELECT * FROM damageentry_sublist WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $damageentery_sub_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $damageentery_sub_result;

} 

function traymaster_detail($traymaster_id='') {
  global $pdo_conn;
  $traymaster = array();
  $condition = '';

  if ($traymaster_id!='') {
    $condition = " AND traymaster_id='".$traymaster_id."' ";
  }

  $sql = "SELECT * FROM traymaster WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $traymaster_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $traymaster_result;

} 

function shiftmaster_detail($shiftmaster_id='') {
  global $pdo_conn;
  $shiftmaster = array();
  $condition = '';

  if ($shiftmaster_id!='') {
    $condition = " AND shiftmaster_id='".$shiftmaster_id."' ";
  }

  $sql = "SELECT * FROM shiftmaster WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $shiftmaster_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $shiftmaster_result;

} 
function damageentry() {
  global $pdo_conn;
  $damageentry = array();
  

  
  $sql = "SELECT * FROM damageentry WHERE delete_status!='1'";
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $damageentry_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $damageentry_result;

} 
function damageentry_edit($damageentry_id='') {
  global $pdo_conn;
  $damageentry = array();
  $condition = '';

  if ($damageentry_id!='') {
    $condition = " AND damageentry_id='".$damageentry_id."' ";
  }

  $sql = "SELECT * FROM damageentry WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $damageentry_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $damageentry_result;

} 

function damageentry_sub_list($damage_id = ''){
    global $pdo_conn;
    $vendorpurchase_sublist = ''; $sql='';
    $amount = 0;
    $roll_id = 1;
    if(!empty($damage_id)){     
      $sql = "SELECT * FROM damageentry_sublist WHERE damage_id = '".$damage_id."' AND delete_status != 1 ORDER BY damage_id DESC";
      $select_con_list=$pdo_conn->prepare($sql);
      $select_con_list->execute();
      $conlist = $select_con_list->fetchAll();
      foreach($conlist as $value){       

        $vendorpurchase_sublist .='<tr>
                    <td>'.$roll_id.'</td>
                    <td>'.$value['item_name'].'</td>
                    <td>'.$value['quantity'].'</td>';                                     
        //if($type != 'approve' ){
        $vendorpurchase_sublist .= '<td id="colaction">
                      <a href="#" id="'.$value['damageentry_sublist'].'" onclick="sub_edit('.$value['damageentry_sublist'].')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>    
                      <a href="#" id="'.$value['vendorpurchase_sub_id'].'" onclick="sub_delete('.$value['damageentry_sublist'].')" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>              
                    </td>';
        //}
      $vendorpurchase_sublist .= '</tr>';      
      $roll_id++;
      
      }
    }    
    $vendorsublist = array('data'=> $vendorpurchase_sublist, 'amount'=>$amount,'sql'=> $sql);
    
    return $vendorsublist;
}

function paymententry_edit($paymententry_id='') {
  global $pdo_conn;
  $paymententry = array();
  $condition = '';

  if ($paymententry_id!='') {
    $condition = " AND paymententry_id='".$paymententry_id."' ";
  }

  $sql = "SELECT * FROM paymententry WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $paymententry_result = $prepare->fetchall(PDO::FETCH_ASSOC);



  return $paymententry_result;

} 

function paymententry_detail() {
  global $pdo_conn;
  $subcustomer_name = array();
  $condition = '';

  $sql = "SELECT * FROM paymententry WHERE delete_status!='1'";
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $subcustomer_name = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $subcustomer_name;

} 


function expenseentry_detail() {
  global $pdo_conn;
  $subcustomer_name = array();
  $condition = '';

 

  $sql = "SELECT * FROM expenseentry WHERE delete_status!='1'";
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $expense = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $expense;

} 
function salesordermainlist($bill_no='') {
  global $pdo_conn;
  $salespurchase = array();
  $condition = '';

  if ($bil_no!='') {
    $condition = " AND bill_no='".$bill_no."' ";
  }

  $sql = "SELECT * FROM salesorder WHERE delete_status!='1'".$condition;
  $prepare = $pdo_conn->prepare($sql);
  $exc = $prepare->execute();
  $salesorder = $prepare->fetchall(PDO::FETCH_ASSOC);

  return $salesorder;

}
function salesordersublist($bill_no='') {
  global $pdo_conn;
  $salespurchase_sub = '';$sql= '';
  $condition = '';
  $roll_id = 1;
  $salespurchase_sub_otp = array();
   if(!empty($bill_no)){     
      $sql = "SELECT * FROM salesorder_sublist WHERE bill_no = '".$bill_no."' AND delete_status != '1'";
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
      <td><a href="#" id="'.$value['salesorder_sublist_id'].'" onclick="salesorder_sub_edit('.$value['salesorder_sublist_id'].')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>    
        <a href="#" id="'.$value['salesorder_sublist_id'].'" onclick="salesorder_sub_del('.$value['salesorder_sublist_id'].')" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
    </tr>';

    $amount += $value['amount'];
    $roll_id ++;
   
  }
  
  }
   $salespurchase_sub_otp = array('data' => $data, 'amount' => $amount);
  return $salespurchase_sub_otp;
}


?>