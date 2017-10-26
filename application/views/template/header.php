<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage</title>
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
      <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/shop-homepage.css');?>" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet">
   
    <link href="<?php echo base_url('assets/css/custom.css');?>" rel="stylesheet">
    
  </head>
  <body>
  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
                    
    </style>


</head>

<body>

    


    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #FDB4BF; border-color: #EFA694;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-lef">
                    <li><a href="<?php echo site_url('/'); ?>" style="margin-top:-5px;"><i class="fa fa-home" style="font-size: 2em;" aria-hidden="true"></i> </a></li>
                </ul>
                <ul class="nav navbar-nav  navbar-right" >
                    <li>
                                <a href="<?php echo site_url('shoppingbagclient'); ?>"><i class="fa fa-shopping-basket"></i>
                                <?php 
                                if(isset($_SESSION['cart_items'])){
                                    echo $_SESSION['cart_items'];
                                }
                                 ?></a>
                            </li>
                    <?php if(isset($_SESSION['username'])){ ?> 
                                        <li>
                        <a href="<?php echo site_url('/clientpayment');?>">แจ้งชำระเงิน </a>
                    </li>
                                        <li>
                        <a href="<?php echo site_url('/allorders');?>">ดูออเดอร์ </a>
                    </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php if(isset($_SESSION['username'])){
                                        echo $_SESSION['username'];
                                    }else{
                                        echo "บัญชีของฉัน";
                                    } ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo site_url('/payment/create');?>"><i class="fa fa-money"></i> แจ้งชำระเงิน</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-user"></i>ข้อมูลส่วนตัว</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo site_url('logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>              
                    <?php            }else{ ?>
                        <li>
                            <a href="<?php echo site_url('/login'); ?>">เข้าสู่ระบบ </a>
                        </li>  
                     <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>    

    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-4" >
                <a href="<?php echo site_url('/home/page');?>" class="list-group-item">สกินแคร์</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="list-group-item">ผิวกาย</a>
            </div>
            <div class="col-md-4">
                    <a href="#" class="list-group-item">อาหารเสริม</a>
            </div>
    </div>