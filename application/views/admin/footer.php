             </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
 
 <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/datatables/datatables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-multiselect/bootstrap-multiselect.min.js');?>"></script>

    <script src="<?php echo base_url('assets/js/custom.js');?>"></script>
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('assets/js/plugins/morris/raphael.min.js');?>"></script>
    <script>
    $(function(){
        $('#index-table').DataTable();
        $('#promotionproduct').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
            maxHeight: 200,
            dropUp: true
        });
    })
    </script>
    <?php 
    if(isset($report)){
    ?>
    <script>
        $(function(){
            if($("input[name=from_date]").val() > $("input[name=to_date]").val()){
                alert("วันที่เริ่มต้นต้องน้อยกว่าหรือเท่ากับวันที่สิ้นสุด");
            }

            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ]
            });
        })
    </script>
    <?php } ?>
    
</body>

</html>
