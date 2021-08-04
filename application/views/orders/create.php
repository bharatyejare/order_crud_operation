<!DOCTYPE html>
<html>
<head>
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
                <div id="show" ></div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right">
        <button type="button" onclick="myFunction()">Add Item</button>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right">
            <input type="submit" name="Save" class="btn" value="submit" id="submit" style="margin-left:30%;"></input>

        </div>

</div>
</body>
</form>
</html>
<script>
    m=0;
function myFunction() {
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
  //h.appendChild(t);
  document.getElementById("show").appendChild(label1);
  document.getElementById("show").appendChild(input1);
  document.getElementById("show").appendChild(br1);
  document.getElementById("show").appendChild(button);
  input1.setAttribute("id", "item_name"+m);
  input1.setAttribute("name", "order_items["+m+"][item_name]");
  input1.setAttribute("class", "form-control");
  label1.setAttribute("class","col-md-3");
  input1.setAttribute("style", "margin-left:180px;");
  //h.appendChild(t);
  document.getElementById("show").appendChild(label2);
  document.getElementById("show").appendChild(input2);
  document.getElementById("show").appendChild(br2);
  document.getElementById("hidden").appendChild(input_hiddennew);
  input2.setAttribute("id", "qty"+m);
  input2.setAttribute("name", "order_items["+m+"][qty]");
  input2.setAttribute("class", "form-control");
  label2.setAttribute("class","col-md-3");
  input2.setAttribute("style", "margin-left:172px;");

  label1.setAttribute("id", "newitemlabel"+m);
  label2.setAttribute("id", "newquantitylabel"+m);

  button.setAttribute("id", "newremoveitem"+m);
  button.setAttribute("type", "button");
  button.setAttribute("name", "removeitem");
  button.setAttribute("value", m);
  button.setAttribute("style", "margin-left:650px;");
  button.onclick = function() {addremoveitem(this.value);};

  input_hiddennew.setAttribute("id", "newhiddenelement"+m);
  input_hiddennew.setAttribute("type","hidden");
  input_hiddennew.setAttribute("name", "new_item_name["+m+"][newhiddenelement]");
  input_hiddennew.setAttribute("class", "form-control");
  input_hiddennew.setAttribute("style", "margin-left:180px;");
  input_hiddennew.setAttribute("value", );
}

function addremoveitem(rowid){
    //alert(rowid);
    if(rowid!==''){
        document.getElementById("newhiddenelement"+rowid).value = "Deleted";
        document.getElementById("item_name"+rowid).style.display = "none";
        document.getElementById("newitemlabel"+rowid).style.display = "none";
        document.getElementById("newquantitylabel"+rowid).style.display = "none";
        document.getElementById("qty"+rowid).style.display = "none";
        document.getElementById("newremoveitem"+rowid).style.display = "none";
    }
}
</script>
