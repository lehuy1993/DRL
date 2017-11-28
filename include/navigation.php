 <div id="page-wrapper" >
        <?php
        	$options = isset($_REQUEST['options'])?$_REQUEST['options']:"";
			switch ($options) {
				case "login":
		        include_once 'include/login.php';
		        break;
		        case "signout":
		        include_once 'include/signout.php';
		        break;     
		        case "cham_diem":
		        include_once 'include/cham_diem.php';
		        break;   
		        case "cham_diem_cb":
		        include_once 'include/drl_sv_list.php';
		        break;
		        case "drl_sv_edit":
		        include_once 'include/drl_sv_edit.php';
		        break;
		        case "xemdiem":
		        include_once 'include/xemdiem.php';
		        break; 
		        case "xemdiemsv":
		        include_once 'include/xemdiemsv.php';
		        break; 
		        case "xemdrl":
		        include_once 'include/xemdrl.php';
		        break; 
		        case "cham_diem_list_cb":
		        include_once 'include/cham_diem_list_cb.php';
		        break;  
		    }
        ?>
</div>