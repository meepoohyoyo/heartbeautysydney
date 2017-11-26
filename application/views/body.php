<div class="container content-container">
    <div class="row">
        <h1 class="text-center uppercase">ผิวกาย</h1>
        <?php
                $query = $this->db->query("SELECT * FROM product;");
                foreach ($query->result() as $row)
                    {
                        echo '<div class="col-sm-3 col-lg-3 col-md-3 product-list">
                            <div class="thumbnail">
                                <img style="min-height:200px; height:200px;" src="assets/img/'.$row->ImagePath.'" alt="">
                                <div class="caption">
                                    <h4 class="pull-right text-bold">'.$row->ProductPrice.'</h4>
                                    <h4><a href="'.site_url("detail")."/".$row->ProductID.'">'.$row->ProductName.'</a></h4>
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
            <?php
                $query = $this->db->query("SELECT * FROM product;");
                foreach ($query->result() as $row)
                    {
                        echo '<div class="col-sm-3 col-lg-3 col-md-3 product-list">
                            <div class="thumbnail">
                                <img style="min-height:200px; height:200px;" src="assets/img/'.$row->ImagePath.'" alt="">
                                <div class="caption">
                                    <h4 class="pull-right text-bold">'.$row->ProductPrice.'</h4>
                                    <h4><a href="'.site_url("detail")."/".$row->ProductID.'">'.$row->ProductName.'</a></h4>
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
            <?php
                $query = $this->db->query("SELECT * FROM product;");
                foreach ($query->result() as $row)
                    {
                        echo '<div class="col-sm-3 col-lg-3 col-md-3 product-list">
                            <div class="thumbnail">
                                <img style="min-height:200px; height:200px;" src="assets/img/'.$row->ImagePath.'" alt="">
                                <div class="caption">
                                    <h4 class="pull-right text-bold">'.$row->ProductPrice.'</h4>
                                    <h4><a href="'.site_url("detail")."/".$row->ProductID.'">'.$row->ProductName.'</a></h4>
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
        <div class="row" style="padding-bottom:10px;">
            <center><a href="#">ดูสินค้าเพิ่มเติม</a></center>
        </div>
</div>