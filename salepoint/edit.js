function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

function editCell(e) {
	var tss;
	var ts = e.target.parentElement;
  	var t = e.target.parentElement.parentElement;
  	var trs = t.getElementsByTagName("tr");
	tds = t.getElementsByTagName("td"); 

	var btnSave = document.createElement('input');
	btnSave.type = "submit";
	btnSave.name = "saving";
  	btnSave.value = "Save";
  	btnSave.onclick = saveCell;
	tds[8].appendChild(btnSave);
	var hidden = document.createElement('input');
	hidden.type = "hidden";
	hidden.name = "item_id";
	hidden.value = tds[0].value;
	tds[8].appendChild(hidden);

	var item_name = document.createElement('input');
	item_name.type = "text";
	item_name.name = "item_name";
	item_name.value = tds[1].textContent;
	var item_desc = document.createElement('input');
	item_desc.type = "text";
	item_desc.name = "item_desc";
	item_desc.value = tds[2].textContent;
	var item_normalprice = document.createElement('input');
	item_normalprice.type = "text";
	item_normalprice.name = "item_normalprice"
	item_normalprice.value = tds[3].textContent;
	var item_currentprice = document.createElement('input');
	item_currentprice.type = "text";
	item_currentprice.name = "item_currentprice";
	item_currentprice.value = tds[4].textContent;
	var item_cost = document.createElement('input');
	item_cost.type = "text";
	item_cost.name = "item_cost";
	item_cost.value = tds[5].textContent;
	var item_stock = document.createElement('input');
	item_stock.type = "text";
	item_stock.name = "item_stock";
	item_stock.value = tds[6].textContent;
	var item_stockorder = document.createElement('input');
	item_stockorder.type = "text";
	item_stockorder.name = "item_stockorder";
	item_stockorder.value = tds[7].textContent;
  
  tds[1].appendChild(item_name);  
  
  tds[2].appendChild(item_desc);  
  
  tds[3].appendChild(item_normalprice);  

  tds[4].appendChild(item_currentprice);  
  
  tds[5].appendChild(item_cost);  
  
  tds[6].appendChild(item_stock);  
  
  tds[7].appendChild(item_stockorder); 

  curr = t;
}

function saveCell() { 

  if(curr != undefined)
  {
    var inputs = curr.getElementsByTagName("td");
    for(var i = 1; i < inputs.length - 1; i++)
    {
      currInput = inputs[i].getElementsByTagName("input");
      currInput[0].parentElement.innerHTML = currInput[0].value;
      //tf is equal to input value
    }
    for(var i = 8; i < inputs.length; i++)
    {
      currInput = inputs[i].getElementsByTagName("input");
      currInput[0].parentElement.innerHTML = "<button onclick='editCell(event)'>Edit</button>";
      //tf is equal to input value
    }
    curr = undefined;
    var item_id = inputs[0].innerText;
    var item_name = inputs[1].innerText;
    var item_desc = inputs[2].innerText;
    var item_normalprice = inputs[3].innerText;
    var item_currentprice = inputs[4].innerText;
    var item_cost = inputs[5].innerText;
    var item_stock = inputs[6].innerText;
    var item_stockorder = inputs[7].innerText;
    window.location.href = "edit.php?item_id=" + item_id + "&item_name=" + item_name + "&item_desc=" + item_desc + "&item_normalprice=" + item_normalprice + "&item_currentprice=" + item_currentprice + "&item_cost=" + item_cost + "&item_stock=" + item_stock + "&item_stockorder=" + item_stockorder;
  }
}

