
<?php
    include_once '../core/CRUD.php';
     $MaL=isset($_REQUEST['TenL'])?$_REQUEST['TenL']:" ";
     $where = array('lop' => $_REQUEST['TenL'] , );
     $db = new CRUD();
    $lop=$db->select(Table::tbkqdrl_cb,$where);
    $numrow = $db->num_rows();

?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản  lý điểm rèn luyện lớp  - năm học</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="panel panel-default">
                        <div class="panel-heading">
                           Danh sách điểm rèn luyện 
                        </div>
                        <div class="panel-body">
                        <ul>
                        <a>Lọc theo lớp</a>
                        <div class = "btn-group">
                                        <select class = "form-control" name = "MaMDRL" 
                                            onChange="location.href='?options=drl_list&TenL='+this.value;">
                                            <option value="0">---Tất cả---</option>
                                                <?php    
                                                    $dbloai=new CRUD();
                                                    $dbloai->select(Table::tblop);
                                                    $num=$dbloai->num_rows();
                                                    if($num>0){
                                                        $data1=$dbloai->fetch();
                                                        foreach ($data1 as $row1) {
                                                           echo '<option value="' . $row1['TenL'] .'"';
                                                            if($row1['TenL']== $MaL)  echo "selected"; 
                                                            echo '>' . $row1['TenL'] . '</option>';
                                                        }
                                                    }
                                                ?>   
                                       </select>
                        </div>
                        </ul>
                        </div>  
                        <!-- /.panel-heading -->
                        <form method="post" id="frm1">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align: center;">Mã sinh viên</th>
                                            <th style="text-align: center;">Họ tên</th>
                                            <th style="text-align: center;">Lớp</th>
                                            <th style="text-align: center;">Tổng điểm</th>
                                            <th style="text-align: center;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php   
                                                //Kiểm tra xem có dữ liệu hay không,
                                                if($numrow>0){
                                                     //Nếu có dữ liệu
                                                    $data=$db->fetch(); 
                                                // đọc từng dòng dữ liệu và hiển thị
                                                    $i=0;
                                                    foreach($data as $row){
                                                        $i++;
                                            ?>
                                        <tr>
                                            <td >
                                                <input type="checkbox" value="<?php echo $row['MaKQDRLCB']; ?>"
                                                id="chk_<?php echo $row['MaKQDRLCB'];?>" 
                                                name="chk_<?php echo $i; ?>"  />
                                            </td>
                                            <td style="text-align: center;"><?php echo $row['MSV'];?></td>
                                            <td style="text-align: center;"><?php echo $row['tenthat'];?></td>
                                            <td style="text-align: center;"><?php echo $row['lop'];?></td>
                                            <td style="text-align: center;"><?php echo $row['Tongdiem'];?></td>
                                            <td class="td-actions" style="text-align: center;width:20%">
                                                        <a href="?options=drl_edit&MSV=<?php echo $row['MSV'];?>" 
                                                           class="btn btn-small btn-warning" 
                                                           title="Chấm điểm sinh viên có mã[<?php echo $row['MSV'];?>]">
                                                            <i class="btn-icon-only fa fa fa-pencil"> </i>
                                                        </a>
                                                       
                                                    </td>
                                            <input type="hidden" name="Ten_<?php echo $i;?>" value="<?php echo $row['tenthat']; ?>"></input>
                                            <input type="hidden" name="TC1_<?php echo $i; ?>" value="<?php echo $row['TC1']+ $row['TC1_2']+ $row['TC1_3']+ $row['TC1_4']+ $row['TCB1']+ $row['TCB2']; ?>" ></input>
                                            <input type="hidden" name="TC2_<?php echo $i;?>" value="<?php echo $row['TC2']; ?>"></input>
                                            <input type="hidden" name="TC3_<?php echo $i;?>" value="<?php echo $row['TC3']; ?>"></input>
                                            <input type="hidden" name="TC4_<?php echo $i;?>" value="<?php echo $row['TC4_1']+$row['TC4_2']+$row['TC4_3']; ?>"></input>
                                            <input type="hidden" name="TC5_<?php echo $i;?>" value="<?php echo $row['TC5']; ?>"></input>
                                            <input type="hidden" name="Tongdiem_<?php echo $i;?>" value="<?php echo $row['Tongdiem']; ?>"></input>
                                            <input type="hidden" name="MSV_<?php echo $i;?>" value="<?php echo $row['MSV']; ?>"></input>
                                            <input type="hidden" name="Phanloai_<?php echo $i;?>" value="<?php echo $row['Phanloai']; ?>"></input>
                                            <input type="hidden" name="MaHK_<?php echo $i;?>" value="<?php echo $row['MaHK']; ?>"></input>
                                            <input type="hidden" name="Lop_<?php echo $i;?>" value="<?php echo $row['lop']; ?>"></input>
                                             
                                                </tr>
                                                <tr>
                                                </tr>
                                                 <?php
                                                        }// end while
                                                    }// 
                                                    else{       
                                                 ?>
                                                <tr>
                                                    <td colspan="6"> 
                                                        Không điểm rèn luyện nào !
                                                    </td>
                                                </tr>   
                                                <?php }
                                                //end if
                                                 ?>
                                                <tr>
                                                    <td colspan="6"></td>
                                                </tr>
                                                <tr>
                                                <input type="hidden" class="span4" id="num" value="<?php echo $i ?>" name="num"  >

                                                    <td><input required="" type='checkbox' name='checkall' onclick='checkedAll(frm1);'></td>
                                                    <td colspan="5" style="text-align: center;"><input type="submit" class="btn btn-success" name="duyetdiem" value="Duyệt điểm"></input></td>
                                                </tr>            
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </form>
 <script type="text/javascript">
 checked=false;
function checkedAll (frm1) {var aa= document.getElementById('frm1'); if (checked == false)
{
checked = true
}
else
{
checked = false
}for (var i =0; i < aa.elements.length; i++){ aa.elements[i].checked = checked;}
}
 </script>  

 <?php
    if (isset($_POST['duyetdiem']) && $_POST['checkall'] ) {
        for($i=1;$i<=$_POST["num"];$i++){

            $ten =  $_POST["Ten_".$i];
            $tc1 = $_POST["TC1_".$i];
            $tc2 = $_POST["TC2_".$i];
            $tc3 = $_POST["TC3_".$i];
            $tc4 = $_POST["TC4_".$i];
            $tc5 = $_POST["TC5_".$i];
            $msv = $_POST["MSV_".$i];
            $phanloai = $_POST["Phanloai_".$i];
            $lop = $_POST["Lop_".$i];
            $MaHK = $_POST["MaHK_".$i];
            $tongdiem = $_POST["Tongdiem_".$i];

             $data = array("tenthat"=>$ten,
                            "TC1" =>$tc1,
                            "TC2" =>$tc2,
                            "TC3" =>$tc3,
                            "TC4" =>$tc4,
                            "Tc5" =>$tc5,
                            "MSV" =>$msv,
                            "Phanloai" =>$phanloai,
                            "Lop" =>$lop,
                            "MaHK" =>$MaHK,
                            "Tongdiem" =>$tongdiem);

        $db = new CRUD();
        $db->INSERT(TABLE::tbkqdrl,$data);
        $db->delete(TABLE::tbkqdrl_cb);
        
    }
     echo"<script> alert('Duyệt điểm thành công');
        location.href='?options=drl_list';</script>";  
   }

    
 ?>
