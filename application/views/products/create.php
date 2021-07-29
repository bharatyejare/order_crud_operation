<!DOCTYPE html>
<html>
<head>
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
            <input type="submit" name="Save" class="btn" value="submit" id="submit">
        </div>

</div>
</body>
</form>
</html>
<script>
function myFunction() {
  var label1 = document.createElement("label");
  var br1 = document.createElement("br");
  var input1 = document.createElement("input");
  label1.innerHTML = "Item ";
  var label2 = document.createElement("label");
  var br2 = document.createElement("br");
  var input2 = document.createElement("input");
  label2.innerHTML = "Quantity";
  //h.appendChild(t);
  document.getElementById("show").appendChild(label1);
  document.getElementById("show").appendChild(input1);
  document.getElementById("show").appendChild(br1);
  input1.setAttribute("id", "itemname");
  input1.setAttribute("name", "itemname[]");
  input1.setAttribute("class", "form-control");
  label1.setAttribute("class","col-md-3");
  input1.setAttribute("style", "margin-left:180px;");
  //h.appendChild(t);
  document.getElementById("show").appendChild(label2);
  document.getElementById("show").appendChild(input2);
  document.getElementById("show").appendChild(br2);
  input2.setAttribute("id", "quantity");
  input2.setAttribute("name", "quantity[]");
  input2.setAttribute("class", "form-control");
  label2.setAttribute("class","col-md-3");
  input2.setAttribute("style", "margin-left:172px;");
}
</script>
