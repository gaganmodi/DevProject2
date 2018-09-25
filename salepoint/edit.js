

function editCell(e) {
	var ts = e.target.parentElement;
  	var t = e.target.parentElement.parentElement;
  	var trs = t.getElementsByTagName("tr");
	tds = t.getElementsByTagName("td"); 

	var btnSave = document.createElement('button');
  	btnSave.innerHTML = "Save";
  	btnSave.onclick = saveCell;
	ts.appendChild(btnSave);

	var item_name = document.createElement('input');
	item_name.type = "text";
	item_name.value = tds[1].textContent;
	var item_desc = document.createElement('input');
	item_desc.type = "text";
	item_desc.value = tds[2].textContent;
	var item_normalprice = document.createElement('input');
	item_normalprice.type = "text";
	item_normalprice.value = tds[3].textContent;
	var item_currentprice = document.createElement('input');
	item_currentprice.type = "text";
	item_currentprice.value = tds[4].textContent;
	var item_cost = document.createElement('input');
	item_cost.type = "text";
	item_cost.value = tds[5].textContent;
	var item_stock = document.createElement('input');
	item_stock.type = "text";
	item_stock.value = tds[6].textContent;
	var item_stockorder = document.createElement('input');
	item_stockorder.type = "text";
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
    }
    curr = undefined;
  }
}

