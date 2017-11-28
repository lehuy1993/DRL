 <div id="page-wrapper" >
        <?php
        	$options = isset($_REQUEST['options'])?$_REQUEST['options']:"";
			switch ($options) {
				case "signout":
		        include_once 'user/signout.php';
		        break;  
		    	case "thoi_gian_sv_list":
		        include_once 'include/thoi_gian_sv_list.php';
		        break;
		        case "thoi_gian_sv_add":
		        include_once 'include/thoi_gian_sv_add.php';
		        break;
		        case "thoi_gian_sv_edit":
		        include_once 'include/thoi_gian_sv_edit.php';
		        break;
		        case "thoi_gian_cb_list":
		        include_once 'include/thoi_gian_cb_list.php';
		        break;
		        case "thoi_gian_cb_add":
		        include_once 'include/thoi_gian_cb_add.php';
		        break;
		        case "thoi_gian_cb_edit":
		        include_once 'include/thoi_gian_cb_edit.php';
		        break;    
		        case "danh_sach_lop_add":
		        include_once 'include/danh_sach_lop_add.php';
		        break; 
		        case "danh_sach_lop_list":
		        include_once 'include/danh_sach_lop_list.php';
		        break;
		        case "danh_sach_lop_edit":
		        include_once 'include/danh_sach_lop_edit.php';
		        break; 
		        case 'chamdiem':
		        include_once 'include/cham_diem.php';
		        break;
		        case "hoc_ky_list":
		        include_once 'include/hoc_ky_list.php';
		        break;
		        case "hoc_ky_add":
		        include_once 'include/hoc_ky_add.php';
		        break;
		        case "hoc_ky_edit":
		        include_once 'include/hoc_ky_edit.php';
		        break;
		        case "drl_list":
		        include_once 'include/drl_list.php';
		        break; 
		        case "drl_edit":
		        include_once 'include/drl_edit.php';
		        break;
		        case "search":
		        include_once 'include/result.php';
		        break;
		        case "ketqua_lop":
		        include_once 'include/ketqua_lop.php';
		        break;     
		        case "ketqua_sv":
		        include_once 'include/ketqua_sv.php';
		        break; 
		        case "ketqua_csv":
		        include_once 'include/ketqua_csv.php';
		        break;     
		        case "ketqua_khoa":
		        include_once 'include/ketqua_khoa.php';
		        break;       
		    }
        ?>
</div>