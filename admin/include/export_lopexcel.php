   <meta charset="utf-8">
<?php
    $data = array(array('MSV', 'Họ và tên','Lớp','TC1','TC2','TC3','TC4','TC5','Tổng điểm','Phân loại'));
    include_once '/../../core/CRUD.php';
    require 'php-excel.php';
     $MaL=$_POST['MaL'];
     $where = array('Lop' => $MaL, );
     $db = new CRUD();
    $lop=$db->select(Table::tbkqdrl,$where);
    $lists = $db->fetch();
    $num = $db->num_rows();
    if ($num>0)
    {
      foreach ($lists as $row)
      { 
        $data[] = array ($row['MSV'], $row['tenthat'],$row['Lop'],$row['TC1'],$row['TC2'],$row['TC3'],$row['TC4'],$row['TC5'],$row['Tongdiem'],$row['Phanloai']); 
      } 
      $xls = new Excel_XML('UTF-8', false, 'Sheet 1');
      $xls->addArray($data);
      $xls->generateXML('ketqua_lop_'.$MaL);
      /*echo "<script> alert('Xuất ra fiel Excel thành công');
      location.href='/TTCN/admin/index.php?options=ketqua_lop';</script>"; */
    }
         else{
      echo "<script> alert('không có dữ liệu');
        location.href='/TTCN/admin/index.php?options=ketqua_lop';</script>"; 
         }
    
?>