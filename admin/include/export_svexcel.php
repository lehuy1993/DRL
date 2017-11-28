   <meta charset="utf-8">
<?php
		include_once '/../../core/CRUD.php';
		require 'php-excel.php';
		$conn = mysql_connect("localhost","root","") or die(mysql_error() );
	    mysql_select_db("ttcn",$conn);
	     mysql_query('SET NAMES "UTF-8"');
		$sql = "SELECT kqdrl.* , sinhvien.MSV FROM sinhvien,kqdrl where kqdrl.MSV = sinhvien.MSV";
		$result = mysql_query($sql);
		$lists = mysql_fetch_array($result);
		$num = mysql_num_rows($result);
		if ($num>0)
		{
			foreach ($lists as $row)
			{ 
				$data = array ('MSV'=> $row['MSV'],'Họ và tên'=> $row['tenthat'],'Lớp'=>$row['Lop'],'TC1'=>$row['TC1'],'TC2'=>$row['TC2'],'TC3'=>$row['TC3'],'TC4'=>$row['TC4'],'TC5'=>$row['TC5'],'Tongdiem'=>$row['Tongdiem'],'Phanloai'=>$row['Phanloai']); 
			} 
			$xls = new Excel_XML('UTF-8', false, 'Sheet 1');
			$xls->addArray($data);
			$xls->generateXML('ketqua_sv');

			$db= new CRUD();
			$db->DELETE(Table::tbsinhvien);
		}
         else{
			echo "<script> alert('không có dữ liệu');
        location.href='/TTCN/admin/index.php?options=ketqua_sv';</script>"; 
         }
		
?>