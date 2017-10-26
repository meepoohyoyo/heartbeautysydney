  <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
   
    
    <script src="<?php echo base_url('assets/js/moment.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js');?>"></script>

    <script type="text/javascript">

    $(function() {

      function refreshSumAmountAll(){
        var $shoppingBagTable = $("#shoppingbag-table")
        var sum = 0
        $shoppingBagTable.find('p[name="totalprice"]').each(function(){
          sum += parseInt($(this).html())
        })
        $("#sum-amount-all").html(sum)
      }

      refreshSumAmountAll()
      $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD hh:mm:ss'
      });

      $(".add-amount-btn").click(function(){
          var $amountInput = $(this).parent().find('input[name="amount"]')
          var $priceInput = $(this).parent().find('#price')
          var curAmount = parseInt($amountInput.val())
          var productPrice = parseInt($priceInput.val())
          curAmount = curAmount+1
          $amountInput.val(curAmount)

          var totalPrice = curAmount*productPrice;
          $(this).parent().parent().find('p[name="totalprice"]').each(function(){
             $(this).html(totalPrice)
          });
          refreshSumAmountAll()
      })

        $(".delete-amount-btn").click(function(){
          var $amountInput = $(this).parent().find('input[name="amount"]')
          var $priceInput = $(this).parent().find('#price')
          var curAmount = parseInt($amountInput.val())
          var productPrice = parseInt($priceInput.val())

          if(curAmount>1){
            curAmount = curAmount - 1
            $amountInput.val(curAmount)

            var totalPrice = curAmount*productPrice;
            $(this).parent().parent().find('p[name="totalprice"]').each(function(){
              $(this).html(totalPrice)
            });
            refreshSumAmountAll()
          }
      })

      $("#submit-first-form").click(function(){
        var $form = $('#first-form');

        $form.html("")
        if($("#shoppingbag-table").find("tr").length==0){
          alert("ไม่มีสินค้าในตะกร้า")
          return false
        }
        $("#shoppingbag-table").find("tr").each(function(){
          $form.append('<input type="text" name="ShoppingBagID[]" value="'
          + $(this).find("#input-shopping-bag-id").val() +'">');

          $form.append('<input type="text" name="amount[]" value="'+
          $(this).find('input[name="amount"]').eq(0).val()
          +'">');

          $form.append('<input type="text" name="totalprice[]" value="'+
          $(this).find('p[name="totalprice"]').eq(0).html()
          +'">');
        })

        $form.submit()

      })
    });
  </script>
</body>

</html>