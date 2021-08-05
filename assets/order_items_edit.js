
function get_order_items(order_items_count,order_items) {

for(var i=0;i<order_items_count;i++){
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
    document.getElementById("show_order_items").appendChild(label1);
    document.getElementById("show_order_items").appendChild(input1);
    document.getElementById("hidden").appendChild(input_hidden);
    document.getElementById("show_order_items").appendChild(button);
    document.getElementById("show_order_items").appendChild(label2);
    document.getElementById("show_order_items").appendChild(input2);

    label1.setAttribute("id", "newitem_label"+order_items[i]['item_id']);
    label2.setAttribute("id", "newquantity_label"+order_items[i]['item_id']);
    input1.setAttribute("id", "item_name"+order_items[i]['item_id']);
    input1.setAttribute("name", "order_items["+i+"][item_name]");
    input1.setAttribute("class", "form-control");
    label1.setAttribute("style","margin-left:3%;margin:bottom:20%;");
    input1.setAttribute("style", "margin-left:5px;");
    input1.setAttribute("value", order_items[i]['item_name']);


    input2.setAttribute("id", "qty"+order_items[i]['item_id']);
    input2.setAttribute("name", "order_items["+i+"][qty]");
    input2.setAttribute("class", "form-control");
    label2.setAttribute("style","margin-left:0.5%;");
    input2.setAttribute("style", "margin-left:0.5%;");
    input2.setAttribute("value", order_items[i]['qty']);
    button.setAttribute("id", "removeitem"+order_items[i]['item_id']);
    button.setAttribute("type", "button");
    button.setAttribute("name", "removeitem");
    button.setAttribute("value", order_items[i]['item_id']);
    button.setAttribute("style", "margin-left:90%;");

    input_hidden.setAttribute("id", "delete_hidden_order_item"+order_items[i]['item_id']);
    input_hidden.setAttribute("type","hidden");
    input_hidden.setAttribute("name", "delete_hidden_order_item[]");
    input_hidden.setAttribute("class", "form-control");
    input_hidden.setAttribute("style", "margin-left:180px;");
    input_hidden.setAttribute("value", "");
    button.onclick = function() {removeitem(this.value);}; 

}

}
m=0;
function additem() {
    m++;
    var item_name_label = document.createElement("label");
    //var br1 = document.createElement("br");
    var item_name = document.createElement("input");
    item_name_label.innerHTML = "Item ";
    var qty_label = document.createElement("label");
    var br2 = document.createElement("br");
    var qty = document.createElement("input");
    qty_label.innerHTML = "Quantity";
    var order_item_delete = document.createElement("button");
    order_item_delete.innerHTML = "Delete";
    var new_order_item = document.createElement("input");
    document.getElementById("show_order_items").appendChild(item_name_label);
    document.getElementById("show_order_items").appendChild(item_name);
    //document.getElementById("show_order_items").appendChild(br1);
    document.getElementById("show_order_items").appendChild(qty_label);
    document.getElementById("show_order_items").appendChild(qty);
    //document.getElementById("show_order_items").appendChild(br2);
    document.getElementById("show_order_items").appendChild(order_item_delete);
    document.getElementById("hidden").appendChild(new_order_item);

    item_name_label.setAttribute("id", "item_name_label"+m);
    qty_label.setAttribute("id", "qty_label"+m);

    item_name.setAttribute("id", "newitem"+m);
    item_name.setAttribute("name", "new_item_name[]");
    item_name.setAttribute("class", "form-control");
    item_name.setAttribute("style","margin-left:3%;margin:bottom:20%;");
    item_name.setAttribute("style", "margin-left:5px;");

    qty.setAttribute("id", "newquantity"+m);
    qty.setAttribute("name", "new_qty[]");
    qty.setAttribute("class", "form-control");
    qty.setAttribute("style","margin-left:3%;margin:bottom:20%;");
    qty.setAttribute("style", "margin-left:5px;");

    order_item_delete.setAttribute("id", "newremoveitem"+m);
    order_item_delete.setAttribute("type", "button");
    order_item_delete.setAttribute("name", "removeitem");
    order_item_delete.setAttribute("value", m);
    order_item_delete.setAttribute("style", "margin-left:90%;");

    new_order_item.setAttribute("id", "delete_order_item"+m);
    new_order_item.setAttribute("type","hidden");
    new_order_item.setAttribute("name", "delete_order_item[]");
    new_order_item.setAttribute("class", "form-control");
    new_order_item.setAttribute("style", "margin-left:180px;");
    new_order_item.setAttribute("value", 1);
    order_item_delete.onclick = function() {addremoveitem(this.value);};
}

function removeitem(item_id){
    document.getElementById("delete_hidden_order_item"+item_id).value = item_id;
    if(item_id!==''){
    document.getElementById("item_name"+item_id).style.display = "none";
    document.getElementById("qty"+item_id).style.display = "none";
    document.getElementById("removeitem"+item_id).style.display = "none";
    document.getElementById("newitem_label"+item_id).style.display = "none";
    document.getElementById("newquantity_label"+item_id).style.display = "none";
    }
}

function addremoveitem(order_item_rowid){
    if(order_item_rowid!==''){
    document.getElementById("delete_order_item"+order_item_rowid).value = "Deleted";
    document.getElementById("newitem"+order_item_rowid).style.display = "none";
    document.getElementById("item_name_label"+order_item_rowid).style.display = "none";
    document.getElementById("qty_label"+order_item_rowid).style.display = "none";
    document.getElementById("newquantity"+order_item_rowid).style.display = "none";
    document.getElementById("newremoveitem"+order_item_rowid).style.display = "none";
    }
}
