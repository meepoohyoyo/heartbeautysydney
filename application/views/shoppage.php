
<style> 
       
        .img{
                width:  90px;
                height: 90px;
                text-align: center;
        }

</style>
<div class="container content-container">
	<div class="row">
		<div style="padding:20px">
			<h1>
				<?php echo $ProductName; ?>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="item-details row">
				<div class="item-details-thumbnail col-md-6">
					<img src="../assets/img/<?php echo $ImagePath; ?>">
				</div>
				<div class="item-details-description col-md-6">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Brand</td>
								<td>
									<?php echo $ProductName; ?>
								</td>
							</tr>
							<tr>
								<td>Price</td>
								<td>
									<?php echo $ProductPrice; ?>
								</td>
							</tr>
							<tr>
								<td>Details</td>
								<td>
									<?php echo $ProductDetail; ?>
								</td>
							</tr>
							<tr>	
								<td colspan="2" style="padding-right:0px;">
									<a href="add-to-cart/'.$row->ProductID.'" class="btn btn-custom-pink width-200 pull-right">
										ซื้อเลย
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


