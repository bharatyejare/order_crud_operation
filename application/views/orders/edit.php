<html>
    <head>
    <script language="javascript">
    var order_items_count='<?php echo count($order_items) ?>';
    var order_items_obj='<?php echo json_encode($order_items) ?>';
    var order_items= JSON.parse(order_items_obj);
    </script>
    <script src="<?php echo base_url()?>assets/order_items_edit.js"></script>
</head>
<body onload="get_order_items(order_items_count,order_items)">
<form method="post" action="<?php echo base_url('orders/update/'.$orders->order_id);?>">
<div class="col-md-12">
                <div class="col-md-6" id="hidden" style="margin-left:90px;">
                </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group" >
                <label class="col-md-3" style="margin-right:45%;">Order Name</label>
                <div class="col-md-9">
                    <input type="text" name="orders[order_name]" class="form-control" value="<?php echo $orders->order_name; ?>" ></input>

                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3" style="margin-right:45%;">Customer Name</label>
                <div class="col-md-9">
                    <textarea name="orders[customer_name]" class="form-control"><?php echo $orders->customer_name; ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group" style="margin-right:26%;">
                <div class="col-md-12" id="show_order_items" >  
            </div>  
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">    
                <div class="col-md-9">
                <!-- <div id="addnewitem" ></div>
                </div> -->
            </div>
        </div>
        
        <div class="col-md-8 col-md-offset-2 pull-right" >
        <button type="button" onclick="additem()" style="margin-left:43%;">Add Item</button>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right">
            <input type="submit" name="Save" class="btn" style="margin-left:6%;"></input>

        </div>
    </div>
    
</form>
</body>
</html>

