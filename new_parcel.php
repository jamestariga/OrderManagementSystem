<?php if(!isset($conn)){ include 'db_connect.php'; } ?>
<style>
  textarea{
    resize: none;
  }
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-parcel">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div id="msg" class=""></div>
        <div class="row">
          <div class="col-md-6">
              <b>Sender Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="sender_name" id="" class="form-control form-control-sm" value="<?php echo isset($sender_name) ? $sender_name : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="sender_address" id="" class="form-control form-control-sm" value="<?php echo isset($sender_address) ? $sender_address : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="sender_contact" id="" class="form-control form-control-sm" value="<?php echo isset($sender_contact) ? $sender_contact : '' ?>" required>
              </div>
          </div>
          <div class="col-md-6">
              <b>Recipient Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="recipient_name" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_name) ? $recipient_name : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="recipient_address" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_address) ? $recipient_address : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="recipient_contact" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_contact) ? $recipient_contact : '' ?>" required>
              </div>
          </div>
        </div>
        <b>Parcel Information</b>
        <table class="table table-bordered" id="parcel-items">
          <thead>
            <tr>
              <th>Item Name</th>
              <th>Order Number</th>
              <th>Purchase Date</th>
			  <th>Quantity</th>
              <th>Price</th>
              <?php if(!isset($id)): ?>
              <th></th>
            <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name='item_name[]' value="<?php echo isset($item_name) ? $item_name :'' ?>" required></td>
              <td><input type="text" name='order_number[]' value="<?php echo isset($order_number) ? $order_number :'' ?>" required></td>
              <td><input type="date" name='purchase_date[]' value="<?php echo isset($purchase_date) ? $purchase_date :'' ?>" required></td>
              <td><input type="text" name='quantity[]' value="<?php echo isset($quantity) ? $quantity :'' ?>" required></td>
              <td><input type="text" class="text-right number" name='price[]' value="<?php echo isset($price) ? $price :'' ?>" required></td>
              <?php if(!isset($id)): ?>
              <td><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
              <?php endif; ?>
            </tr>
          </tbody>
              <?php if(!isset($id)): ?>
          <tfoot>
            <th colspan="4" class="text-right">Total</th>
            <th class="text-right" id="tAmount">0.00</th>
            <th></th>
          </tfoot>
              <?php endif; ?>
        </table>
              <?php if(!isset($id)): ?>
        <div class="row">
          <div class="col-md-12 d-flex justify-content-end">
            <button  class="btn btn-sm btn-primary bg-gradient-primary" type="button" id="new_parcel"><i class="fa fa-item"></i> Add Item</button>
          </div>
        </div>
              <?php endif; ?>
      </form>
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-parcel">Save</button>
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=parcel_list">Cancel</a>
  		</div>
  	</div>
	</div>
</div>
<div id="ptr_clone" class="d-none">
  <table>
    <tr>
        <td><input type="text" name='itemname[]' required></td>
        <td><input type="text" name='ordernumber[]' required></td>
        <td><input type="date" name='purchasedate[]' required></td>
        <td><input type="text" name='quantity[]' required></td>
        <td><input type="text" class="text-right number" name='price[]' required></td>
        <td><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
      </tr>
  </table>
</div>
<script>
  $('#dtype').change(function(){
      if($(this).prop('checked') == true){
        $('#tbi-field').hide()
      }else{
        $('#tbi-field').show()
      }
  })
    $('[name="price[]"]').keyup(function(){
      calc()
    })
  $('#new_parcel').click(function(){
    var tr = $('#ptr_clone tr').clone()
    $('#parcel-items tbody').append(tr)
    $('[name="price[]"]').keyup(function(){
      calc()
    })
    $('.number').on('input keyup keypress',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9]/, '');
        val = val.replace(/,/g, '');
        val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
        $(this).val(val)
    })

  })
	$('#manage-parcel').submit(function(e){
		e.preventDefault()
		start_load()
    if($('#parcel-items tbody tr').length <= 0){
      alert_toast("Please add atleast 1 parcel information.","error")
      end_load()
      return false;
    }
		$.ajax({
			url:'ajax.php?action=save_parcel',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
			// if(resp){
      //       resp = JSON.parse(resp)
      //       if(resp.status == 1){
      //         alert_toast('Data successfully saved',"success");
      //         end_load()
      //         var nw = window.open('print_pdets.php?ids='+resp.ids,"_blank","height=700,width=900")
      //       }
			// }
        if(resp == 1){
            alert_toast('Data successfully saved',"success");
            setTimeout(function(){
              location.href = 'index.php?page=parcel_list';
            },2000)

        }
			}
		})
	})
  function displayImgCover(input,_this) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#cover').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
  function calc(){

        var total = 0 ;
         $('#parcel-items [name="price[]"]').each(function(){
          var p = $(this).val();
              p =  p.replace(/,/g,'')
              p = p > 0 ? p : 0;
            total = parseFloat(p) + parseFloat(total)
         })
         if($('#tAmount').length > 0)
         $('#tAmount').text(parseFloat(total).toLocaleString('en-US',{style:'decimal',maximumFractionDigits:2,minimumFractionDigits:2}))
  }
</script>