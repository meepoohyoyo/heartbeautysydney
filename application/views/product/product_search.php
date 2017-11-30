<div class="container content-container">
    <div class="row">
        <div class="col-md-12">
            <div class="partition-header">
                <h1 class="text-center uppercase">ผลลัพธ์การค้นหา "<?php echo $q; ?>"</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            foreach ($results as $row)
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
</div>
        
  

  
