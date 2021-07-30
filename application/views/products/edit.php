<html>
    <head>
</head>
<body onload="myFunction()">
<form method="post" action="<?php echo base_url('products/update/'.$product->orderid);?>">
<div class="col-md-12">
                <div class="col-md-6" id="hidden" style="margin-left:90px;">
                
            </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Order Name</label>
                <div class="col-md-9">
                    <input type="text" name="ordername" class="form-control" value="<?php echo $product->ordername; ?>">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Customer Name</label>
                <div class="col-md-9">
                    <textarea name="customername" class="form-control"><?php echo $product->customername; ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-12">
                <div class="col-md-6" id="show" style="margin-left:90px;">
                
            </div>
            
            
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">    
                <div class="col-md-9">
                <div id="addnewitem" ></div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8 col-md-offset-2 pull-right">
        <button type="button" onclick="additem()">Add Item</button>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right">
            <input type="submit" name="Save" class="btn">
        </div>
    </div>
    
</form>
</body>
</html>

<script>
    b=0;
function myFunction() {
   
    var count='<?php echo count($order_item); ?>';
    var item='<?php echo json_encode($order_item); ?>';
    var order_data = JSON.parse(item);

    //console.log(order_data[1]['orderid']);
    //return false;
  for(var i=0;i<count;i++){
    b++;
      //console.log(i);
   // console.log(order_data[i]['orderid']);
  var label1 = document.createElement("label");
  var br1 = document.createElement("br");
  var input1 = document.createElement("input");
  var button = document.createElement("button");
  label1.innerHTML = "Item ";
  button.innerHTML = "Remove Item";

  var label2 = document.createElement("label");
  var br2 = document.createElement("br");
  var input2 = document.createElement("input");
  label2.innerHTML = "Quantity";
  var input_hidden = document.createElement("input");
  //h.appendChild(t);
  document.getElementById("show").appendChild(label1);
  document.getElementById("show").appendChild(input1);
  document.getElementById("hidden").appendChild(input_hidden);
  document.getElementById("show").appendChild(button);

  label1.setAttribute("id", "newitem_label"+b);
  label2.setAttribute("id", "newquantity_label"+b);
  input1.setAttribute("id", "itemname"+b);
  input1.setAttribute("name", "itemname[]");
  input1.setAttribute("class", "form-control");
  label1.setAttribute("class","col-md-3");
  input1.setAttribute("style", "margin-left:180px;");
  input1.setAttribute("value", order_data[i]['item_name']);
  //h.appendChild(t);
  document.getElementById("show").appendChild(label2);
  document.getElementById("show").appendChild(input2);
  //document.getElementById("show").appendChild(br2);
  
  input2.setAttribute("id", "quantity"+b);
  input2.setAttribute("name", "quantity[]");
  input2.setAttribute("class", "form-control");
  label2.setAttribute("class","col-md-3");
  input2.setAttribute("style", "margin-left:172px;");
  input2.setAttribute("value", order_data[i]['quantity']);
  button.setAttribute("id", "removeitem"+b);
  button.setAttribute("type", "button");
  button.setAttribute("name", "removeitem");
  button.setAttribute("value", order_data[i]['item_id']);
  button.setAttribute("style", "margin-left:81%;");

  input_hidden.setAttribute("id", "hiddenelement"+b);
  input_hidden.setAttribute("type","hidden");
  input_hidden.setAttribute("name", "hiddenelement[]");
  input_hidden.setAttribute("class", "form-control");
  input_hidden.setAttribute("style", "margin-left:180px;");
  input_hidden.setAttribute("value", "");
  //button.setAttribute('onclick','removeitem();'); // for FF
  button.onclick = function() {removeitem();}; // for IE

  //document.getElementById('removeitem').onclick = removeitem();

  //document.getElementById('removeitem').setAttribute('onclick','removeitem()')

}

}
m=0;
function additem() {
    m++;
    //alert(m);
   // document.getElementById('inc').value = i;
  var label1 = document.createElement("label");
  var br1 = document.createElement("br");
  var input1 = document.createElement("input");
  label1.innerHTML = "Item ";

  var label2 = document.createElement("label");
  var br2 = document.createElement("br");
  var input2 = document.createElement("input");
  label2.innerHTML = "Quantity";
  var button = document.createElement("button");
  button.innerHTML = "Remove Item";
  document.getElementById("show").appendChild(label1);
  document.getElementById("show").appendChild(input1);
  document.getElementById("show").appendChild(br1);
  document.getElementById("show").appendChild(label2);
  document.getElementById("show").appendChild(input2);
  document.getElementById("show").appendChild(br2);
  document.getElementById("show").appendChild(button);
   
  label1.setAttribute("id", "newitemlabel"+m);
  label2.setAttribute("id", "newquantitylabel"+m);

  input1.setAttribute("id", "newitemname"+m);
  input1.setAttribute("name", "itemname[]");
  input1.setAttribute("class", "form-control");
  label1.setAttribute("class","col-md-3");
  input1.setAttribute("style", "margin-left:180px;");

  input2.setAttribute("id", "newquantity"+m);
  input2.setAttribute("name", "quantity[]");
  input2.setAttribute("class", "form-control");
  label2.setAttribute("class","col-md-3");
  input2.setAttribute("style", "margin-left:172px;");

  button.setAttribute("id", "newremoveitem"+m);
  button.setAttribute("type", "button");
  button.setAttribute("name", "removeitem");
  button.setAttribute("value", "Remove Item");
  button.setAttribute("style", "margin-left:81%;");
  button.onclick = function() {addremoveitem();}; // for IE
 // document.getElementById('itemname').onclick = removeitem();
}
n=0;
function removeitem(){
    n++;
    
    //console.log(order_data[1]['orderid']);
    //return false;
    
    //alert(document.getElementById("removeitem"+n).value);
     document.getElementById("hiddenelement"+n).value = document.getElementById("removeitem"+n).value;
    document.getElementById("itemname"+n).style.display = "none";
    document.getElementById("quantity"+n).style.display = "none";
    document.getElementById("removeitem"+n).style.display = "none";
    document.getElementById("newitem_label"+n).style.display = "none";
    document.getElementById("newquantity_label"+n).style.display = "none";
}

a=0;
function addremoveitem(){
    a++;
    document.getElementById("newitemname"+a).style.display = "none";
    document.getElementById("newitemlabel"+a).style.display = "none";
    document.getElementById("newquantitylabel"+a).style.display = "none";
    document.getElementById("newquantity"+a).style.display = "none";
    document.getElementById("newremoveitem"+a).style.display = "none";
}

</script>