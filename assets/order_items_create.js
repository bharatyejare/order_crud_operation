m=0;
function add_order_items() {
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
    document.getElementById("show_order_items").appendChild(label1);
    document.getElementById("show_order_items").appendChild(input1);
    document.getElementById("show_order_items").appendChild(br1);
    document.getElementById("show_order_items").appendChild(button);
    input1.setAttribute("id", "item_name"+m);
    input1.setAttribute("name", "order_items["+m+"][item_name]");
    input1.setAttribute("class", "form-control");
    label1.setAttribute("class","col-md-3");
    input1.setAttribute("style", "margin-left:180px;");
    //h.appendChild(t);
    document.getElementById("show_order_items").appendChild(label2);
    document.getElementById("show_order_items").appendChild(input2);
    document.getElementById("show_order_items").appendChild(br2);
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
    button.onclick = function() {addremoveitem(this.value)};

    input_hiddennew.setAttribute("id", "new_order_items"+m);
    input_hiddennew.setAttribute("type","hidden");
    input_hiddennew.setAttribute("name", "new_order_items["+m+"][delete_order_items]");
    input_hiddennew.setAttribute("class", "form-control");
    input_hiddennew.setAttribute("style", "margin-left:180px;");
    input_hiddennew.setAttribute("value", "");
}

function addremoveitem(order_item_rowid){
    if(order_item_rowid!==''){
    document.getElementById("new_order_items"+order_item_rowid).value = "Deleted";
    document.getElementById("item_name"+order_item_rowid).style.display = "none";
    document.getElementById("newitemlabel"+order_item_rowid).style.display = "none";
    document.getElementById("newquantitylabel"+order_item_rowid).style.display = "none";
    document.getElementById("qty"+order_item_rowid).style.display = "none";
    document.getElementById("newremoveitem"+order_item_rowid).style.display = "none";
    }
}
