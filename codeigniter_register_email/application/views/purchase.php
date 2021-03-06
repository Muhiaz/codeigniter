  <html>
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
 <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
function handleSelect(elm)
{
  if (elm.value == '<?php echo base_url('user/add_client');?>') {
     window.location = '<?php echo base_url('user/add_client');?>';
}
}
document.getElementById('today').value = Date();
</script>

 <script src="http://code.jquery.com/ui/1.9.1/themes/blitzer/jquery-ui.min.css"></script>
 <script src="<?php echo base_url('js/jquery-ui.min.js');?>"></script>
 <script language="javascript" type="text/javascript">
  function handleSelect(elm)
{
  if (elm.value == '<?php echo base_url('user/add_client');?>') {
     window.location = '<?php echo base_url('user/add_client');?>';
}
}
  function addRow(element) {
      var form = element.form;
      var table = form.getElementsByTagName('table')[0];
      var tbody = table.tBodies[0];
      var num = tbody.rows.length - 1;
      var row = table.rows[1].cloneNode(true);
      var input, inputs = row.getElementsByTagName('input')

      // Update input names
      for (var i=0, iLen=inputs.length; i<iLen; i++) {
        input = inputs[i];
        input.name = input.name.replace(/\d+$/,num);
        input.value = '';
      }
      tbody.insertBefore(row, tbody.rows[tbody.rows.length - 1]);
  }

  function updateRow(element) {
    var form = element.form;
    var num = element.name.replace(/^\D+/,'');
    var value = form['quantity' + num].value * form['rate' + num].value;
    form['amount' + num].value =  (value == 0)? '' : value;
    updateTotal(form);
  }

  function updateTotal(form) {
    var elements = form.elements;
    var name = /^amount/;
    var total = 0;
    var value;
     for (var i=0, iLen=elements.length; i<iLen; i++) {
      if (name.test(elements[i].name)) {
        total += parseFloat(elements[i].value);
      }
    }
    form.total.value = total;
  }
  function handleSelect(elm)
{
  if (elm.value == '<?php echo base_url('user/add_client');?>') {
     window.location = '<?php echo base_url('user/add_client');?>';
}
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
<style type="text/css">
  label,td{
    color: #000;
  }
</style>
<script type="text/javascript">document.getElementById('today').value = Date();</script>
  </head>
  <body>
    
    <button type="button" class="dropbtn1" data-toggle="modal" data-target="#myModal" style="margin-left: 75%;">Change Appearance<i style="margin:10px;" class="fa fa-gear"></i></button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" tabindex="-1" style="width: 50%;height: 100vh;margin-left: 50%;background-color: green">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" style="font-color: #000000" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Invoice</h4>
      </div>
      <div class="modal-body">
        <form style="color: #000;" method="post" action="<?php echo base_url('user/edit_invoice'); ?>">
          <div class="container">
            <div class="col-md-12 form-group">
          <label>Add Prefix for Invoice</label>
          <input type="text" name="invoiceprefix" class="form-control">
          <span class="text-danger"><?php echo form_error("invoiceprefix"); ?></span>
          </div>
          <hr>
          <div class="col-md-12 form-group">
          <a><label><i class="fa fa-plus" style="padding: 3px"></i>Add Input field</label></a>
          </div>
          <hr>
          <div class="col-md-12 form-group">
          <label>Terms</label>
          <textarea type="checkbox" name="" class="form-control"></textarea> 
          </div>
          <hr>
          <div class="col-md-12 form-group">
          <label><i class="fa fa-plus" style="padding: 3px"></i>Optional fields</label>
          </div>
           <div class="col-md-12 form-group">
            <input type="checkbox" name="">
          <label>To</label>
          </div>
          <div class="col-md-12 form-group">
            <input type="checkbox" name="">
          <label>From</label>
          </div>
          <div class="col-md-12 form-group">
            <input type="checkbox" name="">
          <label>Discount</label>
          </div>
          </div>
  <input type="submit" value="Submit"/>
      </form>
      </div>
      <div class="modal-footer">
        <button style="margin-top: 100vh" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <div class="form-row container">
      <h3>Supplier</h3>
       <div class="col-md-4 form-group">
                    <label><b>Email</b></label>
                    <select type="text" name="email" id="email" class="form-control col-md-6" onchange="javascript:handleSelect(this)">
                     <option value="<?php echo base_url('user/add_supplier');?>">New Client
                     </option>
                     <?php
     if($fetch_supplier->num_rows()>0){
      foreach ($fetch_supplier->result() as $value) {
        echo "<option value='" . $value->id . "'>" . $value->email . "</option>";
      }
    }
        ?>
        </select>
                    </div>
                    <div class="col-md-4 form-group">
                    <label><b>Name</label>
                      <select type="text" name="name" id="name" class="form-control col-md-6">
                        <option>Select Supplier</option>
                        <?php
     if($fetch_supplier->num_rows()>0){
      foreach ($fetch_supplier->result() as $row) {
        echo "<option>" . $row->firstname . "</option>";
      }
    }
        ?>
                      </select>
                    </div>
                    <div class="col-md-4 form-group">
                    <label><b>Phone Number</b></label>
                    <select type="text" name="phonenumber" id="phonenumber" class="form-control col-md-6">
                      <option>Select Phone number</option>
                     <?php
     if($fetch_supplier->num_rows()>0){
      foreach ($fetch_supplier->result() as $row) {
        echo "<option >" . $row->phone . "</option>";
      }
    }
        ?>
        </select>
                    </div>
                  </b></label>
                  </div>
                  <div class="container">
                   <div class="form-row">
                  </div>
    
        </div>
        <div class="container" style="width: 100%;">
    <table class="table table-bordered">
      <tr>
        <td>#No</td>
        <td>Product</td>
        <td>Description</td>
        <td>Quantity</td>
        <td>Price</td>
        <td>Total</td>
      </tr>
    </table>
   <form action="submit.php" name="main" method="post" style="margin-top: -20px" >
  <table style="border-collapse: collapse;" border="0" align="center"
   width="50%" id="customersAdd" class="table table-bordered" >
    <tr>
      <td><br>
        <input class="dropbtn text" type="button" 
         align="middle"value="Add Aditional Row" class="form-control input-sm text-right" onclick="addRow(this)" onsubmit="return checkforblank()" id="add_data">
      </td>
    </tr>
    <tr>
       <td>
        <input placeholder="" class="form-control input-sm text-right" name="no" onblur="updateRow(this);" id="no" readonly="true">
      </td>
      <td>
        <select id="edName" placeholder="Product" class="form-control input-sm text-right" type="text" name="description1" id="description" required>
          <option>Select Product</option>
        <?php
     if ($fetch_product->num_rows()>0) {
       foreach ($fetch_product->result() as $row){
            echo "<option value='" .$row->id . "'>" . $row->productname . "</option>"; 
     }
   }
      ?>  
        </select>
      </td>
       <td>
        <input placeholder="" class="form-control input-sm text-right" name="product" id="product" required>
      </td>
      <td>
        <input placeholder="Quantity" class="form-control input-sm text-right" name="quantity1" onblur="updateRow(this);" id="quantity" required>
      </td>
      <td>
        <input placeholder="Rate" name="rate1" class="form-control input-sm text-right" onchange="updateRow(this);" id="unitprice" required>
      </td>
      <td>
        <input placeholder="Amount" class="form-control input-sm text-right" name="amount1" readonly id="amount" required>
      </td>
    </tr>
    <tr>
      <td colspan="5" style="text-align: right" >Subtotal&nbsp;
      <td><input name="total" id="total" readonly>
    </tr>
  </table>
</form>
</div>
<table style="margin-left:70%;margin-top: -20px;border: 0">
  <tr>
      <td colspan="5" style="text-align: right">Amount Paid&nbsp;
      <td><input name="amountpaid" id="amountpaid" >
    </tr>
    <tr>
      <td colspan="5" style="text-align: right">Balance Due&nbsp;
      <td><input name="balancedue"id="balancedue" readonly>
    </tr>
</table>
<div class="form-row container">
                    <div class="col-md-4 form-group">
                    <label><b>Mode of Payment</label>
                      <select class="col-md-6 form-control" name="modeofpayment" id="modeofpayment">
                        <option>Select Mode of payment</option>
                        <option>Cheque</option>
                        <option>Cash</option>
                        <option>M-Pesa</option>
                      </select>
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="email">Date:</label>
            <input type="date" id="today" name="depositdate" class="form-control"></span>
                    </div>
                    <div class="col-md-4 form-group">
                       <label><b>Terms</label>
                      <input type="text" name="terms" id="terms" class="form-control col-md-6">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
      <input type="submit" class="dropbtn1" id="save" value="Save" style="color: #000;font-weight: 800;margin-left:50%;">
      </div>
       </div>
      </div>
    </div>

    </div>
<br>
<div class="container">
  <div class="row">
  <div class="col-md-12">
    <br><br>
  </div>
  </div>
</div>
 </body>
  <script type="text/javascript">
  function handleSelect(elm)
{
  if (elm.value == '<?php echo base_url('user/add_client');?>') {
     window.location = '<?php echo base_url('user/add_client');?>';
}
}
     $(document).ready(function() {
        $('select[name="email"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url('user/myformAjax2/');?>'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="name"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="name"]').append('<option value="'+ value.id +'">'+ value.firstname +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="name"]').empty();
            }
             if(stateID) {
                $.ajax({
                    url: '<?php echo base_url('user/myformAjax2/');?>'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="phonenumber"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="phonenumber"]').append('<option value="'+ value.id +'">'+ value.phone +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="phone"]').empty();
            }
        });
    });
  document.getElementById("edName").required = true;
  $("#unitprice").keyup(function () {
    $('#tax').val(0.16 * $('#unitprice').val());
  });
    $("#amountpaid,#total").keyup(function () {
    $('#balancedue').val($('#total').val() - $('#amountpaid').val());
});
    $(document).ready(function(e){
      $("input").change(function(){
        var sum = 0;
        $("input[name=total]").each(function(){
          sum = sum + parseInt($(this).val());
        })
        $("input[name=subtotal]").val(sum);
      });
      });
$(function(){
var set_number = function(){
  var table_len = $('#customersAdd tbody').length;
  $('#no').val(table_len);
}
set_number();
$('#add_data').click(function(){
var product = $('#product').val();
var description = $('#description').val();
var quantity = $('#quantity').val();
var unitprice = $('#unitprice').val();
var amount = $('#amount').val();

//call the function to set new number
set_number();
});
$('#save').click(function(){
  var table_data = [];
//use .each to get all the data
$('#customersAdd').each(function(row,tr){
//create an array to store all the data in a row


//get only the data with value
var sub = {
  'no':$('#no').val(),
  'product':$('#product').val(),
  'name':$('#name').val(),
  'phonenumber':$('#phonenumber').val(),
  'email':$('#email').val(),
  'description':$('#description').val(),
  'total':$('#amount').val(),
  'amountpaid': $('#amountpaid').val(),
  'balancedue':$('#balancedue').val(),
  'quantity' : $('#quantity').val(),
  'unitprice' : $('#unitprice').val(),
  'amount' : $('#amount').val(),
  'terms' : $('#terms').val(),
  'modeofpayment' : $('#modeofpayment').val(),
};
table_data.push(sub);


});
//check data via console
console.log(table_data);
//using ajax to insert the data to database
// import Swal from 'sweetalert2';
swal({
  title : 'Save data',
  text : '',
  type : '',
    preConfirm: function() {
    return new Promise(function(resolve) {
      setTimeout(function() {
        resolve()
      }, 4000)
    })
  },
  showLoaderOnConfirm : true,
  showCancelButton : true,
  confirmButtonText : 'Yes'
    }).then(function() {
      var data = {'data_table':table_data};
  $.ajax({
    data : data,
    type : 'POST',
    url : '<?php echo base_url('user/save_purchase');?>',
    crossOrigin : false,
    dataType:'json',
    success : function(result){
      if(result.invoice == "success"){
        swal('Successfully Saved','','success');
        window.location.href = '<?php echo base_url("user/allpurchases");?>';
      }else{
        swal('Error Saving','','warning');
      }
    }
  });
});
});
});

</script>
</html>