<div class="container content-container">
    <div class="row">
        <div class="carousel-holder">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                <?php
                    for($i=0;$i<2;$i++)
                    {
                        if($i==0)
                        {
                        echo "<div class='item active'>
                                <img class='slide-image' src='http://www.konvy.com/static/mall/2017/0117/14846291733699.jpg' alt=''>
                                </div>";
                        }
                        else
                        {
                        echo "<div class='item'>
                                <img class='slide-image' src='http://www.konvy.com/static/mall/2017/0113/14842934323434.jpg' alt=''>
                                </div>
                                ";

                        }
                    }
                ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="partition-header">
                <h1 class="text-center uppercase">สินค้าใหม่</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            /* for($i=0;$i<9;$i++)
            {
                echo "<div class='col-sm-4 col-lg-4 col-md-4'>
                        <div class='thumbnail'>
                            <img src='http://www.konvy.com/static/team/2016/0330/14593278748288.jpg' alt=''>
                            <div class='caption'>
                                <h4 class='pull-right'>฿259</h4>
                                <h4><a href='#'>Eglips Blur Powder Pact 9g #23</a>
                                </h4>
                            </div>
                            <img src='assets/img/bt_buynow.png' alt='buy'>
                        </div>
                    </div>";
            } */
        $query = $this->db->query("SELECT * FROM product order by ProductID desc LIMIT 8;");
            foreach ($query->result() as $row)
                {
                    echo '<div class="col-sm-3 col-lg-3 col-md-3 product-list">
                        <div class="thumbnail">
                            <img style="min-height:200px; height:200px;" src="assets/img/'.$row->ImagePath.'" alt="">
                            <div class="caption">
                                <h4 class="pull-right text-bold">'.$row->ProductPrice.'</h4>
                                <h4><a href="'.site_url("detail")."/".$row->ProductID.'">'.substr($row->ProductName, 0,17).'</a></h4>
                                <p>'.$row->ProductDetail.'</p>
                            </div>
                            <div class="row">
                                <a href="add-to-cart/'.$row->ProductID.'" class="btn btn-custom-pink pull-right">ซื้อเลย</a>
                            </div>
                        </div>
                    </div>';
                }
        ?> 
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="partition-header">
                <h1 class="text-center text-uppercase">PROMOTION</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="promotions-item">
                <div class="promotion-thumbnail">
                    <img src="assets/img/123.jpg" alt="buy">
                </div>
                <div class="promotion-details">
                    <span class="offer-timeout"><i class="glyphicon glyphicon-time"></i> 12:12:00 </span>
                    <h3 class="promotion-title">Product</h3>
                    <p class="promotion-description">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                        It has survived not only five centuries
                        simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                        It has survived not only five centuries</p>
                    <div class="promotion-action-btn-group">
                        <span class="price-tag"><b>$299</b></span>
                        <button class="btn btn-custom-pink pull-right width-200">ซื้อเลย</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
  

  
