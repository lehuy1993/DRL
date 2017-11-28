<?php
    
?>
    <div id="wrapper">

<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse dropdown">
                    <ul class="nav" id="side-menu">
                    <form method="GET" action="?options=search">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                             <input type="hidden" name="options" value="search" />
                                <input type="text" class="form-control" name="q" placeholder="Search...">
                                <span class="input-group-btn">
                                <input class="btn btn-default" type="submit" value="Search">
                                </input>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        </form>
                         <li>
                            <a href="#" title="Quản lý" >Quản lý thời gian sinh viên
                            <span class="fa arrow"></span></a>
                            <ul  class="nav nav-second-level">
                            <li><a href="?options=thoi_gian_sv_list" title="fdsffds">
                                Danh sách thời gian chấm</a></li>
                            <li><a href="?options=thoi_gian_sv_add">
                                 Thêm thời gian chấm </a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="#" >Quản lý thời gian cán bộ lớp
                            <span class="fa arrow"></span></a>
                            <ul  class="nav nav-second-level">
                            <li><a href="?options=thoi_gian_cb_list">
                                Danh sách thời gian chấm</a></li>
                            <li><a href="?options=thoi_gian_cb_add">
                                 Thêm thời gian chấm </a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="#" >Quản lý danh sách lớp 
                            <span class="fa arrow"></span></a>
                            <ul  class="nav nav-second-level">
                            <li><a href="?options=danh_sach_lop_list">
                                Danh sách lớp</a></li>
                            <li><a href="?options=danh_sach_lop_add">
                                 Thêm lớp </a></li>
                            </ul>
                        </li>
                         
                        <li>
                            <a href="#" >Chấm điểm
                            <span class="fa arrow"></span></a>
                            <ul  class="nav nav-second-level">
                           <li class="">
                                    <a href="?options=drl_list">Theo lớp  </span></a>
                            </li>
                           
                            </ul>
                        </li>
                        <li>
                            <a href="#" ></i>Quản lý học kỳ
                            <span class="fa arrow"></span></a>
                            <ul  class="nav nav-second-level">
                            <li><a href="?options=hoc_ky_list">
                                Danh sách học kỳ</a></li>
                            <li><a href="?options=hoc_ky_add">
                                Thêm mới học kỳ</a></li>
                            </ul>
                        </li>
                        
                        <li>
                        <?php
                            
                        ?>
                            <a href="#" >Báo cáo - Thống kê
                            <span class="fa arrow"></span></a>
                            <ul  class="nav nav-second-level">
                            <li><a href="?options=ketqua_lop">
                                Theo lớp</a></li>
                            <li><a href="?options=ketqua_khoa">
                                Theo khoa</a></li>
                                <li><a href="?options=ketqua_sv">
                                Theo danh sách sinh viên cụ thể</a></li>

                            </ul>
                        </li>
                     
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            </div>
            
            <!-- /.navbar-static-side -->
             <!-- jQuery -->
    <script src="../jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>