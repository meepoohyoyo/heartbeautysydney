             <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administrator
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $completeOrders; ?></div>
                                        <div>ออเดอร์ที่ชำระเงินแล้ว</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url('/payment?onlywaitconfirm=true');?>">
                                <div class="panel-footer">
                                    <span class="pull-left">ดูรายละเอียด</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> สถิติการขาย</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <tbody>
                                            <tr>
                                                <td>ยอดรวมออเดอร์</td>
                                                <td><?php echo $sum_totalprice; ?></td>
                                                <td>บาท</td>
                                            </tr>
                                            <tr>
                                                <td>จำนวน</td>
                                                <td><?php echo $sum_amount; ?></td>
                                                <td>ชิ้น</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">ดูสถิติการขายทั้งหมด <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> ออเดอร์ล่าสุด</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped" id="index-table">
                                        <thead>
                                            <tr>
                                                <th>เลขที่ออเดอร์</th>
                                                <th>วันที่</th>
                                                <th>สถานะ</th>
                                                <th>ลูกค้า</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($latestOrders as $order){
                                            echo "<tr>";
                                            echo "<td>" . $order->OrderID . "</td>";
                                            echo "<td>" . $order->OrderDate . "</td>";
                                            echo "<td>" . getThaiOrder($order->OrderStatus) . "</td>";
                                            echo "<td>" . $order->CustomerID . "</td>";
                                            echo "</tr>";
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="<?php echo site_url('/order');?>">ดูทั้งหมด <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->



   
