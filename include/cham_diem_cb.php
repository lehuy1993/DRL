
<?php
    include_once 'core/CRUD.php';
    $dbsv=new CRUD();
    $id =  $_SESSION['user'];
    $where = array('MSV' =>$id , );
    $dbsv->select(Table::tbkqdrl_sv,$where);
    $row = $dbsv->fetch();

?>
<meta charset="UTF-8">
<?php
    include_once 'core/CRUD.php';
    if($_SESSION['chucvu']==35 || $_SESSION['chucvu']==40){
        $dbhk = new CRUD();
        $dbhk ->select(Table:: tbhocky);
        $row1=$dbhk->fetch(); 
        if (isset($_POST['chamdiem'])) {
            # code...
        $id = $_SESSION['id'];
        $hoten=$_SESSION['tenthat'];
        $lop=$_SESSION['lop'];
        $chucvu = $_SESSION['chucvu'];
        $tc5 =$_POST['tc5cb'];
        $tc2 = isset($_POST['tc2cb'])?$_POST['tc2cb']:''; 
        $tc1 = $_POST['tc1cb'] + $_POST['tc1_2cb']+ $_POST['tc1_3cb']+ $_POST['tc1_4cb']+ $_POST['tcb1cb']+ $_POST['tcb2cb'];
        $tc3 = $_POST['tc3cb'];
        $tc4 = $_POST['tc4_1cb']+$_POST['tc4_2cb']+$_POST['tc4_3cb'];
        $MaHK = $_POST['MaHK'];
        $tongdiem = $tc1+$tc2+$tc3+$tc4+$tc5;
        if ($tongdiem > 80) {
            $phanloai = 'xuất sắc';
        }
        else{
            $phanloai=' Khá';
        }
        $db= new CRUD();
        $data= array(   
                        'id' =>$id,
                        'TC1' =>$_POST['tc1cb'],
                        'TC1_2' =>$_POST['tc1_2cb'],
                        'TC1_3' =>$_POST['tc1_3cb'],
                        'TC1_4' =>$_POST['tc1_4cb'],
                        'TCB1' =>$_POST['tcb1cb'],
                        'TCB2' =>$_POST['tcb2cb'],
                        'TC2' =>$_POST['tc2cb'],
                        'TC3' =>$tc3,
                        'TC4_1' =>$_POST['tc4_1cb'],
                        'TC4_2' =>$_POST['tc4_2cb'],
                        'TC4_3' =>$_POST['tc4_3cb'],
                        'TC5' =>$tc5,
                        'Tongdiem' =>$tongdiem,
                        'Phanloai' =>$phanloai,
                        'MaHK' =>$MaHK,
                        'chucvu' =>$chucvu,
                        'Lop' =>$lop,

         );
        $where = array('MaHK' =>$MaHK,
                        'id' =>$id );
        $db->select(Table::tbkqdrl_cb,$where);
        $numrow = $db->num_rows();
        if($numrow > 0){
            echo "<script> alert('Bạn đã đánh giá điểm rèn luyện của mình rồi !');
        location.href='index.php?options=cham_lai';</script>"; 
        die();
        }
        else{
        if($db->insert(TABLE::tbkqdrl_cb,$data)){
            echo "<script> alert('Bạn đã đánh giá xong điểm rèn luyện của mình');
        location.href='index.php';</script>"; 
    }else{
        echo "<script> alert('Lỗi thêm mới!!');</script>";  
    }
}
}
    }else{
        echo "<script> alert('Bạn chưa đăng nhặp hoặc ngoài thời gian chấm điểm');
        location.href='index.php';</script>"; 
    }
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sinh viên tự chấm điểm rèn luyện học kỳ <?php echo $row1[0]['TenHK'].'   '.$row1[0]['TenNH']; ?> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="container">	
<div class="row">      
<div class="panel panel-default">
                   <?php $row[0]['TC1'] ?>      
                        <!-- /.panel-heading -->
    <div class="panel-body ">
    <div class="table-responsive col-lg-12">
    <form method="post">
    <input type="hidden" name="MaHK" value="<?php echo $row1[0]['MaHK'] ?>">
    <table class="table table-striped table-bordered table-hover">                           
    <tbody style="text-align: left;">
        <tr>
            <td style="height:38px; width:511px"><b>Ti&ecirc;u ch&iacute; đ&aacute;nh gi&aacute;/Điểm do c&aacute; nh&acirc;n, tập thể đ&aacute;nh gi&aacute;</td>
            <td style="width:56px"><b>Mức tối đa</td>
            <td style="width:57px"><b>SV tự ĐG</td>
            <td style="width:68px"><b>Tổ CTSV<br />
            Lớp, CĐ</td>
        </tr>
        <tr>
            <td style="height:20px; width:511px"> <b>I. Ti&ecirc;u ch&iacute; 1: &Yacute; thức v&agrave; kết quả học tập (Chỉ t&iacute;nh điểm thi lần 1)</td>
            <td>20</td>
            <td> </td> 
            <td> </td>
        </tr>
        <tr>
            <td style="height:20px; width:511px"><b> a. &Yacute; thức&nbsp;</td>
            <td>10</td>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="height:21px; width:511px">1.1. &Yacute; thức v&agrave; th&aacute;i độ học tập:&nbsp;</td>
            <td>4</td>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="height:40px; width:511px">+ Đ&uacute;ng giờ, đủ giờ, nghi&ecirc;m t&uacute;c, kh&ocirc;ng n&oacute;i chuyện, l&agrave;m việc kh&ocirc;ng li&ecirc;n quan đến m&ocirc;n học,&nbsp; c&oacute; thức thức XD b&agrave;i, chuẩn bị b&agrave;i đầy đủ ...</td>
            <td>4</td>
            <td><input type="radio" class="check_list" disabled="" name="tc1" id="input" value="4"  <?php if ($row[0]['TC1']==4) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc1cb" disabled=""  value="4"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">+ C&oacute; &yacute; thức nhưng chưa thật đầy đủ</td>
            <td>1 đến 3</td>
            <td><input type="radio" class="check_list" name="tc1" id="input" value="3"  <?php if ($row[0]['TC1']==3) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc1cb"  value="3"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">+ &Yacute; thức yếu , k&eacute;m</td>
            <td>0</td>
            <td><input type="radio" class="check_list" name="tc1" id="input" value="0"  <?php if ($row[0]['TC1']==0) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc1cb"  value="0"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.2. Tham gia CLB học thuật</td>
            <td>2</td>
            <td><input type="radio" class="check_list" name="tc1_2" id="input" value="2"  <?php if ($row[0]['TC1_2']==2) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc1_2cb"  value="2"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.3. Tham gia c&aacute;c kỳ thi, nghi&ecirc;m t&uacute;c, đ&uacute;ng quy chế, quy định</td>
            <td>3</td>
            <td><input type="radio" class="check_list"name="tc1_3" id="input" value="3"  <?php if ($row[0]['TC1_3']==3) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc1_3cb"  value="3"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.4. Tinh thần vượt kh&oacute;</td>
            <td>1</td>
            <td><input type="radio" class="check_list" name="tc1_4" id="input" value="1"  <?php if ($row[0]['TC1_4']==1) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc1_4cb"  value="1"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px"><b>b. Kết quả học tập v&agrave; NCKH</td>
            <td>10</td>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="height:20px; width:511px"><b>b.1. Học tập</td>
            <td>8</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.5. Điểm TBCHT&nbsp; học kỳ từ 3,60 đến 4,00</td>
            <td>8</td>
           <td><input type="radio" class="check_list" name="tcb1" id="input" value="8" <?php if ($row[0]['TCB1']==8) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tcb1cb"  value="8"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.6. Điểm TBCHT&nbsp; học kỳ từ 3,20 đến 3,59</td>
            <td>6</td>
            <td><input type="radio" class="check_list" name="tcb1" id="input" value="6"  <?php if ($row[0]['TCB1']==6) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tcb1cb"  value="6"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.7. Điểm TBCHT&nbsp; học kỳ từ 2,50 đến 3,19</td>
            <td>4</td>
            <td><input type="radio" class="check_list" name="tcb1" id="input" value="4"  <?php if ($row[0]['TCB1']==4) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tcb1cb"  value="4"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.8. Điểm TBCHT&nbsp; học kỳ từ 2,00 đến 2,49</td>
            <td>2</td>
            <td><input type="radio" class="check_list" name="tcb1" id="input" value="2"  <?php if ($row[0]['TCB1']==2) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tcb1cb"  value="2"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.9. Điểm TBCHT học kỳ từ 1,00 đến 1,99</td>
            <td>1</td>
            <td><input type="radio" class="check_list" name="tcb1" id="input" value="1"  <?php if ($row[0]['TCB1']==1) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tcb1cb"  value="1"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.10. Điểm TBCHT học kỳ &lt;1,00</td>
            <td>0</td>
            <td><input type="radio" class="check_list" name="tcb1" id="input" value="0"  <?php if ($row[0]['TCB1']==0) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tcb1cb"  value="0"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px"><b>b.2. Thi sinh vi&ecirc;n giỏi v&agrave; NCKH</td>
            <td>2</td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.11 Sinh vi&ecirc;n Thi Olympic, Thi sinh vi&ecirc;n giỏi, NCKH đạt giải cấp khoa trở l&ecirc;n&nbsp;</td>
            <td>2</td>
            <td><input type="radio" class="check_list" name="tcb2" id="input" value="2"  <?php if ($row[0]['TCB2']==2) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tcb2cb"  value="2"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">1.12. Sinh vi&ecirc;n Thi Olympic, Thi sinh vi&ecirc;n giỏi, tham gia NCKH, Kh&ocirc;ng đạt giải</td>
            <td>1</td>
            <td><input type="radio" class="check_list" name="tcb2" id="input" value="1"  <?php if ($row[0]['TCB2']==1) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tcb2cb"  value="1"></td>
        </tr>
        <tr>
            <td style="height:24px; width:511px"><b>II. Ti&ecirc;u ch&iacute; 2: &Yacute; thức v&agrave; kết quả chấp h&agrave;nh nội quy, quy chế trong nh&agrave; trường</td>
            <td>25</td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">2.1. Thực hiện tốt c&aacute;c nội quy quy chế&nbsp;</td>
            <td>25</td>
            <td><input type="radio" class="check_list" name="tc2" id="input" value="25"  <?php if ($row[0]['TC2']==25) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc2cb"  value="25"></td>
        </tr>
        <tr>
            <td style="height:40px; width:511px">2.2. Vi phạm quy chế thi v&agrave; kiểm tra; kh&ocirc;ng đ&oacute;ng học ph&iacute; học kỳ; Kh&ocirc;ng ho&agrave;n th&agrave;nh nghĩa vụ c&ocirc;ng lao động sinh vi&ecirc;n&hellip;</td>
            <td>0</td>
            <td><input type="radio" class="check_list" name="tc2" id="input" value="0"  <?php if ($row[0]['TC2']==0) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc2cb"  value="0"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">2.3 Nộp học ph&iacute;, đo&agrave;n ph&iacute; kh&ocirc;ng đ&uacute;ng kỳ hạn</td>
            <td>15</td>
           <td><input type="radio" class="check_list" name="tc2" id="input" value="15" <?php if ($row[0]['TC2']==15) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc2cb"  value="15"></td>
        </tr>
        <tr>
            <td style="height:60px; width:511px">2.4. Vi phạm nội quy, quy chế (Nội, ngoại tr&uacute;, đi học muộn, bỏ giờ; Kh&ocirc;ng đeo thẻ sinh vi&ecirc;n; Kh&ocirc;ng nộp Phiếu quản l&yacute; sinh vi&ecirc;n; Sinh vi&ecirc;n nam kh&ocirc;ng ho&agrave;n th&agrave;nh thủ tục đăng k&iacute; nghĩa vụ qu&acirc;n sự; Kh&ocirc;ng ho&agrave;n th&agrave;nh hồ sơ sinh vi&ecirc;n đ&uacute;ng k&igrave; hạn... )</td>
            <td>10</td>
            <td><input type="radio" class="check_list" name="tc2" id="input" value="10" <?php if ($row[0]['TC2']==10) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc2cb"  value="10"></td>
        </tr>
        <tr>
            <td style="height:38px; width:511px"><b>III. Ti&ecirc;u ch&iacute; 3: &Yacute; thức v&agrave; kết quả tham gia c&aacute;c hoạt động ch&iacute;nh trị - x&atilde; hội, văn h&oacute;a - văn nghệ, thể thao, ph&ograve;ng chống c&aacute;c tệ nạn x&atilde; hội</td>
            <td>20</td>
        </tr>
        <tr>
            <td style="height:40px; width:511px">3.1. Tham gia đầy đủ c&aacute;c hoạt động v&agrave; được khen thưởng của c&aacute;c tổ chức Đo&agrave;n, Hội sinh vi&ecirc;n, Hội li&ecirc;n hiệp thanh ni&ecirc;n, được khen thưởng Cấp khoa trở l&ecirc;n</td>
            <td>20</td>
            <td><input type="radio" class="check_list" name="tc3" value="20" <?php if ($row[0]['TC3']==20) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc3cb"  value="20"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">3.2. Tham gia đầy đủ c&aacute;c hoạt động&nbsp;</td>
            <td>18</td>
<td><input type="radio" name="tc3" class="check_list" id="input" value="18" <?php if ($row[0]['TC3']==18) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc3cb"  value="18"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">3.3. Tham gia kh&ocirc;ng đầy đủ</td>
            <td>10</td>
            <td><input type="radio" class="check_list" name="tc3" id="input" value="10" <?php if ($row[0]['TC3']==10) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc3cb"  value="10"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">3.4. Kh&ocirc;ng tham gia c&aacute;c hoạt động</td>
            <td>0</td>
            <td><input type="radio" class="check_list" name="tc3" id="input" value="0" <?php if ($row[0]['TC3']==0) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc3cb"  value="0"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">3.5. Tham gia đầy đủ tuần SHCD - SV đầu năm nhưng b&agrave;i thu hoạch kh&ocirc;ng đạt</td>
            <td>5</td>
           <td><input type="radio" class="check_list" name="tc3" id="input" value="5" <?php if ($row[0]['TC3']==5) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc3cb"  value="5"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px"> <b>IV. Ti&ecirc;u ch&iacute; 4: Phẩm chất c&ocirc;ng d&acirc;n v&agrave; quan hệ với cộng đồng</td>
            <td>25</td>
        </tr>
        <tr>
            <td style="height:40px; width:511px"><b>4.1. &Yacute; thức chấp h&agrave;nh v&agrave; tham gia tuy&ecirc;n truyền c&aacute;c chủ trương của Đảng, ch&iacute;nh s&aacute;ch, ph&aacute;p luật của Nh&agrave; nước v&agrave; cộng đồng</td>
            <td>15</td>
            <td><input type="radio" class="check_list" name="tc4_1" id="input" value="15" <?php if ($row[0]['TC4_1']==15) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc4_1cb"  value="15"></td>
        </tr>
        <tr>
            <td style="height:40px; width:511px">4.1.1. T&iacute;ch cực tham gia tuy&ecirc;n truyền v&agrave; chấp h&agrave;nh tốt ph&aacute;p luật, được lớp v&agrave; chi đo&agrave;n t&iacute;n nhiệm c&oacute; &yacute; thức tập thể tốt (c&oacute; &gt;=70% số SV trong lớp biểu quyết đồng &yacute;)</td>
            <td>15</td>
           <td><input type="radio" class="check_list" name="tc4_1" id="input" value="15"  <?php if ($row[0]['TC4_1']==15) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc4_1cb"  value="15"></td>
        </tr>
        <tr>
            <td style="height:60px; width:511px">4.1.2. T&iacute;ch cực tham gia tuy&ecirc;n truyền v&agrave; chấp h&agrave;nh tốt ph&aacute;p luật, được lớp v&agrave; chi đo&agrave;n t&iacute;n nhiệm c&oacute; &yacute; thức tập thể tốt (c&oacute; 30% đến 69% số SV trong lớp biểu quyết đồng &yacute;)</td>
            <td>10</td>
<td><input type="radio" name="tc4_1" class="check_list" id="input" value="10"  <?php if ($row[0]['TC4_1']==10) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc4_1cb"  value="10"></td>
        </tr>
        <tr>
            <td style="height:40px; width:511px">4.1.3. T&iacute;ch cực tham gia tuy&ecirc;n truyền v&agrave; chấp h&agrave;nh tốt ph&aacute;p luật, được lớp v&agrave; chi đo&agrave;n t&iacute;n nhiệm c&oacute; &yacute; thức tập thể tốt (c&oacute; &lt;30% số SV trong lớp biểu quyết đồng &yacute;)</td>
            <td>5</td>
            <td><input type="radio" class="check_list" name="tc4_1" id="input" value="5"<?php if ($row[0]['TC4_1']==5) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc4_1cb"  value="5"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px">4.1.4. Vi phạm khuyết điểm, g&acirc;y mất đo&agrave;n kết</td>
            <td>0</td>
<td><input type="radio" name="tc4_1" class="check_list" id="input" value="0"  <?php if ($row[0]['TC4_1']==0) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc4_1cb"  value="0"></td>
        </tr>
        <tr>
            <td style="height:40px; width:511px"><b>4.2. &Yacute; thức tham gia c&aacute;c hoạt động x&atilde; hội c&oacute; th&agrave;nh t&iacute;ch được ghi nhận, biểu dương khen thưởng</td>
            <td>5</td>
            <td><input type="radio" name="tc4_2" class="check_list" id="input" value="5" <?php if ($row[0]['TC4_2']==5) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc4_2cb"  value="5"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px"><b>4.3. C&oacute; tinh thần chia sẻ, gi&uacute;p đỡ người th&acirc;n, người c&oacute; kh&oacute; khăn, hoạn nạn</td>
            <td>5</td>
            <td><input type="radio" name="tc4_3" class="check_list" id="input" value="5"  <?php if ($row[0]['TC4_3']==5) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc4_3cb"  value="5"></td>
        </tr>
        <tr>
            <td style="height:20px; width:511px"> <b>V. Ti&ecirc;u ch&iacute; 5: &Yacute; thức tham gia c&ocirc;ng t&aacute;c lớp, đo&agrave;n, Hội SV, c&aacute;c tổ chức kh&aacute;c</td>
            <td>10</td>
        </tr>
        <tr>
            <td style="height:40px; width:511px">5.1. Th&agrave;nh vi&ecirc;n BCS; BCHHSV; BCH từ cấp CĐ; BCN c&aacute;c C&acirc;u lạc bộ sinh vi&ecirc;n c&oacute; Quyết định của Trường, Khoa trở l&ecirc;n m&agrave; TT đ&oacute; được khen</td>
            <td>10</td>
            <td><input type="radio" class="check_list" name="tc5" id="input" value="10"  <?php if ($row[0]['TC5']==10) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc5cb"  value="10"></td>
        </tr>
        <tr>
            <td style="height:40px; width:511px">5.2. Th&agrave;nh vi&ecirc;n BCS; BCHHSV; BCH từ cấp Chi đo&agrave;n; BCN c&aacute;c C&acirc;u lạc bộ sinh vi&ecirc;n c&oacute; Quyết định của Trường, Khoa trở l&ecirc;n</td>
            <td>9</td>
            <td><input type="radio" class="check_list" name="tc5" id="input" value="9"  <?php if ($row[0]['TC5']==9) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc5cb"  value="9"></td>
        </tr>
        <tr>
            <td style="height:60px; width:511px">5.3. Th&agrave;nh vi&ecirc;n BCS; BCHHSV; BCH từ cấp Chi đo&agrave;n; BCN c&aacute;c C&acirc;u lạc bộ sinh vi&ecirc;n c&oacute; Quyết định của Trường, Khoa trở l&ecirc;n m&agrave; lớp c&oacute; sai phạm nhưng chưa bị thi h&agrave;nh kỷ luật</td>
            <td>5</td>
           <td><input type="radio" class="check_list" name="tc5" id="input" value="5"  <?php if ($row[0]['TC5']==5) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc5cb"  value="5"></td>
        </tr>
        <tr>
            <td style="height:60px; width:511px">5.4. Th&agrave;nh vi&ecirc;n BCS; BCHHSV; BCH từ cấp Chi đo&agrave;n; BCN c&aacute;c CLB SV c&oacute; Quyết định của Trường, Khoa trở l&ecirc;n m&agrave; Lớp c&oacute; sai phạm, bị ph&ecirc; b&igrave;nh từ cấp Khoa trở l&ecirc;n</td>
            <td>0</td>
            <td><input type="radio" class="check_list" name="tc5" id="input" value="0"  <?php if ($row[0]['TC5']==0) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc5cb"  value="0"></td>
        </tr>
        <tr>
            <td style="height:40px; width:511px">5.5. Đội TNXK; TNTN thường trực; đội Văn nghệ; Thể thao; th&agrave;nh vi&ecirc;n CLB SV c&oacute; Quyết định của Trường, Khoa trở l&ecirc;n, được khen thưởng</td>
            <td>9</td>
            <td><input type="radio" name="tc5" class="check_list" id="input" value="9"  <?php if ($row[0]['TC5']==9) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc5cb"  value="9"></td>
        </tr>
        <tr>
            <td style="height:40px; width:511px">5.6. Đội TNXK; TNTN thường trực; đội Văn nghệ, Thể thao; c&aacute;c CLB SV c&oacute; Quyết định của Trường, Khoa trở l&ecirc;n</td>
            <td>5</td>
            <td><input type="radio" class="check_list" name="tc5" id="input" value="5"  <?php if ($row[0]['TC5']==5) {?> checked="checked"<?php } ?>} ?></td>
            <td><input type="radio" class="check_list" name="tc5cb"  value="5"></td>
        </tr>
        <tr>
            <td style="height:29px"><b>Tổng điểm</td>
            <td>100</td>
            <td>&nbsp;</td>
        </tr>
        <tr><td style="text-align: right">Sum</td><td><span id="sum"></span></td></tr> 

    </tbody>
   
</table>  
        <input   type="submit" name="chamdiem" value="Gửi điểm">

 </form>
</div>
</div>
</div>
</div>
</div>
<script>
            $(document).ready(function(){
                update();
            });
            $('input[type=radio]').click(function(){
                update();
            })
            function update(){
                var sum = 0;
                $('.check_list').each(function () {
                    if (this.checked) {              
                        sum += Number($(this).attr("value")); 
                    }
                });
                $("#sum").html(sum);
                
            }
        </script>
                
