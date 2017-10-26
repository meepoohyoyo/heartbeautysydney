<br>
<br>
            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12">
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
                        <br><br><br>
                          

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
                   $query = $this->db->query("SELECT * FROM product;");
                        foreach ($query->result() as $row)
                            {
                                echo '<div class="col-sm-3 col-lg-3 col-md-3">
                                  <div class="thumbnail">
                                      <img style="min-height:200px; height:200px;" src="assets/img/'.$row->ImagePath.'" alt="">
                                      <div class="caption">
                                          <h4 class="pull-right">'.$row->ProductPrice.'</h4>
                                          <h4><a href="'.site_url("detail")."/".$row->ProductID.'">'.$row->ProductName.'</a></h4>
                                          <p>'.$row->ProductDetail.'</p>
                                      </div>
                                      <div>
                                        <a href="add-to-cart/'.$row->ProductID.'" ><img src="assets/img/bt_buynow.png" alt="buy"></a>
                                      </div>
                                  </div>
                              </div>';
                            }
                    ?> 

                </div>

            </div>

        </div>

    </div>

  
