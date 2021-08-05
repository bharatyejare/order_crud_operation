<!DOCTYPE html>
<html>
<head>
<script src="<?php echo base_url()?>assets/js/order_items_create.js"></script>
</head>
<body>
<form method="post" action="<?php echo base_url('ordersCreate');?>">
<div class="row">
<div class="col-md-6" id="hidden" style="margin-left:90px;"></div>
<div class="col-md-8 col-md-offset-2">
        <div id="showproduct" style="align:center"></div><br>
            <div class="form-group">
                <label class="col-md-3">Order Name</label>
                <div class="col-md-9">
                    <input type="text" name="orders[order_name]" id="order_name" class="form-control"></input>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Customer Name</label>
                <div class="col-md-9">
                    <textarea name="orders[customer_name]" id="customer_name" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">    
                <div class="col-md-9">
                <div id="show_order_items" ></div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right">
        <button type="button" onclick="add_order_items()">Add Order Items</button>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right">
            <input type="submit" name="Save" class="btn" value="submit" id="submit" style="margin-left:30%;"></input>

        </div>

</div>
</body>
</form>
</html>

