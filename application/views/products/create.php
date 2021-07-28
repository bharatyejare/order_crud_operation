<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<form method="post" action="<?php echo base_url('productsCreate');?>">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div id="showproduct" style="align:center"></div><br>
            <div class="form-group">
                <label class="col-md-3">Order Name</label>
                <div class="col-md-9">
                    <input type="text" name="ordername" id="ordername" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Customer Name</label>
                <div class="col-md-9">
                    <textarea name="customername" id="customername" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right">
            <input type="button" name="Save" class="btn" value="submit" id="submit" onclick="create_order()">
        </div>
    </div>
    
</form>
</body>
</html>
<script>
function create_order(){
var ordername=$("#ordername").val();
var customername=$("#customername").val();
var submit=$("#submit").val();
$.ajax({
  method: "POST",
  url: "store",
  data: { ordername: ordername,customername:customername,submit:submit }
})
  .done(function( msg ) {
	if(msg=='success'){
        $("#showproduct").html("Products Added Successfully");
		window.location.href="<?php echo base_url() ?>/products";
	}else if(msg=='error'){
        $("#showproduct").html("Something went wrong");
		window.location.href="<?php echo base_url() ?>products/create";
    }else if(msg=='empty'){
        $("#showproduct").html("Please Fill All Details");
    }
	});
}
</script>
