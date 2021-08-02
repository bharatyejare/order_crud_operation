<html>
    <head>
</head>
<body onload="myFunction()">
<form method="post" action="<?php echo base_url('orders/update/'.$orders->order_id);?>">
<div class="col-md-12">
                <div class="col-md-6" id="hidden" style="margin-left:90px;">
                </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group" >
                <label class="col-md-3" style="margin-right:45%;">Order Name</label>
                <div class="col-md-9">
                    <input type="text" name="ordername" class="form-control" value="<?php echo $orders->order_name; ?>" >
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3" style="margin-right:45%;">Customer Name</label>
                <div class="col-md-9">
                    <textarea name="customername" class="form-control"><?php echo $orders->customer_name; ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group" style="margin-right:26%;">
                <div class="col-md-12" id="show" >  
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
            <input type="submit" name="Save" class="btn" style="margin-left:6%;">
        </div>
    </div>
    
</form>
</body>
</html>

<script>
   
function myFunction() {
var count='<?php echo count($order_items); ?>';
var item='<?php echo json_encode($order_items); ?>';
var order_data = JSON.parse(item);

for(var i=0;i<count;i++){
  
  var label1 = document.createElement("label");
  var br1 = document.createElement("br");
  var input1 = document.createElement("input");
  var button = document.createElement("button");
  label1.innerHTML = "Item ";
  button.innerHTML = "Delete";

  var label2 = document.createElement("label");
  var br2 = document.createElement("br");
  var input2 = document.createElement("input");
  label2.innerHTML = "Quantity";
  var input_hidden = document.createElement("input");
  document.getElementById("show").appendChild(label1);
  document.getElementById("show").appendChild(input1);
  document.getElementById("hidden").appendChild(input_hidden);
  document.getElementById("show").appendChild(button);
  document.getElementById("show").appendChild(label2);
  document.getElementById("show").appendChild(input2);

  label1.setAttribute("id", "newitem_label"+order_data[i]['item_id']);
  label2.setAttribute("id", "newquantity_label"+order_data[i]['item_id']);
  input1.setAttribute("id", "itemname"+order_data[i]['item_id']);
  input1.setAttribute("name", "itemname[]");
  input1.setAttribute("class", "form-control");
  label1.setAttribute("style","margin-left:3%;margin:bottom:20%;");
  input1.setAttribute("style", "margin-left:5px;");
  input1.setAttribute("value", order_data[i]['items_name']);
  
  
  input2.setAttribute("id", "quantity"+order_data[i]['item_id']);
  input2.setAttribute("name", "quantity[]");
  input2.setAttribute("class", "form-control");
  label2.setAttribute("style","margin-left:0.5%;");
  input2.setAttribute("style", "margin-left:0.5%;");
  input2.setAttribute("value", order_data[i]['quantity']);
  button.setAttribute("id", "removeitem"+order_data[i]['item_id']);
  button.setAttribute("type", "button");
  button.setAttribute("name", "removeitem");
  button.setAttribute("value", order_data[i]['item_id']);
  button.setAttribute("style", "margin-left:90%;");

  input_hidden.setAttribute("id", "hiddenelement"+order_data[i]['item_id']);
  input_hidden.setAttribute("type","hidden");
  input_hidden.setAttribute("name", "hiddenelement[]");
  input_hidden.setAttribute("class", "form-control");
  input_hidden.setAttribute("style", "margin-left:180px;");
  input_hidden.setAttribute("value", "");
  button.onclick = function() {removeitem(this.value);}; 

}

}
m=0;
function additem() {
  m++;
  var label1 = document.createElement("label");
  var br1 = document.createElement("br");
  var input1 = document.createElement("input");
  label1.innerHTML = "Item ";

  var label2 = document.createElement("label");
  var br2 = document.createElement("br");
  var input2 = document.createElement("input");
  label2.innerHTML = "Quantity";
  var button = document.createElement("button");
  button.innerHTML = "Delete";
  var input_hiddennew = document.createElement("input");
  document.getElementById("show").appendChild(label1);
  document.getElementById("show").appendChild(input1);
  document.getElementById("show").appendChild(br1);
  document.getElementById("show").appendChild(label2);
  document.getElementById("show").appendChild(input2);
  document.getElementById("show").appendChild(br2);
  document.getElementById("show").appendChild(button);
  document.getElementById("hidden").appendChild(input_hiddennew);

  label1.setAttribute("id", "newitemlabel"+m);
  label2.setAttribute("id", "newquantitylabel"+m);

  input1.setAttribute("id", "newitem"+m);
  input1.setAttribute("name", "itemname[]");
  input1.setAttribute("class", "form-control");
  label1.setAttribute("style","margin-left:3%;margin:bottom:20%;");
  input1.setAttribute("style", "margin-left:5px;");

  input2.setAttribute("id", "newquantity"+m);
  input2.setAttribute("name", "quantity[]");
  input2.setAttribute("class", "form-control");
  label2.setAttribute("class","margin-left:3%;margin:bottom:20%;");
  input2.setAttribute("style", "margin-left:5px;");

  button.setAttribute("id", "newremoveitem"+m);
  button.setAttribute("type", "button");
  button.setAttribute("name", "removeitem");
  button.setAttribute("value", m);
  button.setAttribute("style", "margin-left:90%;");
  
  input_hiddennew.setAttribute("id", "newhiddenelement"+m);
  input_hiddennew.setAttribute("type","hidden");
  input_hiddennew.setAttribute("name", "newhiddenelement[]");
  input_hiddennew.setAttribute("class", "form-control");
  input_hiddennew.setAttribute("style", "margin-left:180px;");
  input_hiddennew.setAttribute("value", 1);


  button.onclick = function() {addremoveitem(this.value);};
}

function removeitem(item_id){
    document.getElementById("hiddenelement"+item_id).value = item_id;
    if(item_id!==''){
        document.getElementById("itemname"+item_id).style.display = "none";
        document.getElementById("quantity"+item_id).style.display = "none";
        document.getElementById("removeitem"+item_id).style.display = "none";
        document.getElementById("newitem_label"+item_id).style.display = "none";
        document.getElementById("newquantity_label"+item_id).style.display = "none";
    }
}

function addremoveitem(rowid){
    //alert(rowid);
    if(rowid!==''){
        document.getElementById("newhiddenelement"+rowid).value = "Deleted";
        document.getElementById("newitem"+rowid).style.display = "none";
        document.getElementById("newitemlabel"+rowid).style.display = "none";
        document.getElementById("newquantitylabel"+rowid).style.display = "none";
        document.getElementById("newquantity"+rowid).style.display = "none";
        document.getElementById("newremoveitem"+rowid).style.display = "none";
    }
}

</script>