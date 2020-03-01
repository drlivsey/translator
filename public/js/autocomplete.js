//<![CDATA[

    var keys = ['begin'];
    var mode = 0;

    function mode_select()
    {
    	if(basic.checked)
    		mode = 0;
    	else if(advanced.checked)
    	{
    		mode = 1;
    		helper.innerHTML = "";
    	}
    }

    function modal_close()
    {
    	modal.style.visibility = 'hidden';
    }

window.onload=function(){
    /*< и > в <array_name> это не больше и меньше! при добавлении копировать отсюда!*/  
	var big_db = {
		"begin":
		{
			'create':{
				'integer':{
					'array<array_name>':['end'], 
					'variable<variable_name>':['end']
				},
				'decimal':{
					'array<array_name>':['end'], 
					'variable<variable_name>':['end']
				},
				'char':{
					'array<array_name>':['end'],
					'variable<variable_name>':['end']
				}, 
				'string':{
					'array<array_name>':['end'], 
					'variable<variable_name>':['end']
				}, 
				'floating point':{
					'array<array_name>':['end'], 
					'variable<variable_name>':['end']
				}, 
				'boolean':{
					'array<array_name>':['end'], 
					'variable<variable_name>':['end']
				}, 
				'object<object_name>':['end']
			}, 
			'delete':{
				'array<array_name>':['end'],
				'variable<variable_name>':['end'], 
				'object<object_name>':['end']
			}, 
			'calculate':{
				'sum(<variable_name> and <variable_name>':['end'], 
				'quotient(<variable_name> and <variable_name>)':['end'], 
				'difference(<variable_name> and <variable_name>)':['end'], 
				'product(<variable_name> and <variable_name>)':['end'], 
				'square root(<variable_name>)':['end'], 
				'power(<variable_name>, degree)':['end']
			}, 
			'change':{
				'variable(<variable_name>)':['end'], 
				'element of array[element number]':['end'], 
				'field of object(<field_name>)':['end']
			}, 
			'replace':{
				'elements of array(from [old_value] to [new value])':['end'], 
				'letters in string(from [old_value] to [new_value])':['end']
			}, 
			'fill':{
				'array':{
					'chars("char")':['end'], 
					'random values':['end'], 
					'values("value")':['end']
				}, 
				'string':{
					'chars("char")':['end'], 
					'random values':['end'], 
					'values("value")':['end']
				}
			}, 
			'compare':{
				'variables(<variable_name> and <variable_name>)':['end'], 
				'boolean variables(<variable_name> and <variable_name>)':['end']
			}, 
			'sort':{
				'array':{
					'ascending':['end'], 
					'descending':['end']
				}, 
				'string':{
					'alphabetically':['end']
				}
			}
		}
	};

	function popupClearAndHide() 
	{
		helper.innerHTML = "";
	}

	function updPopup() 
	{
		if(mode == 1)
		{
			popupClearAndHide(); 
			return;
		}
	    var v = editor.value.split(',');
	    if(v.length > 1 && (v[v.length - 1] == "" || v[v.length - 1] == " "))
	    {
	    	keys = ['begin'];
	    }
	    var w = v[v.length - 1].split(' ');
  		var a = new RegExp("^" + w[w.length - 1], "i");
  		db = big_db;
    	for(var iter = 0; iter < keys.length; iter++)
    	{
    		db = db[keys[iter]];
    	}
    	if(db === undefined || db[0] === 'end')
    	{
    		helper.innerHTML = "";
    		editor.value = editor.value.trim();
    		editor.value += ", "
    		keys = ['begin'];
    		return;
    	}
    	b = document.createDocumentFragment(); 
    	c = false;
  		for(key in db) 
  		{
    		if(a.test(key)) 
    		{
      			c = true;
      			var d = document.createElement("span");
      			d.innerText = key+"; ";
      			var complete = key.substr(w[w.length - 1].length);
     			d.setAttribute("onclick", "editor.value+=\'"+complete+"\';helper.innerHTML='';");
      			b.appendChild(d);
    		}
    		if(key === w[w.length - 1])
    		{
    			keys.push(key);
    		}
  		}
		if(c == true) 
		{
		    helper.innerHTML = "";
		    helper.appendChild(b);
    		return;
  		}
		popupClearAndHide();
	}

		editor.addEventListener("keyup", updPopup);
		editor.addEventListener("change", updPopup);
		editor.addEventListener("focus", updPopup);
}

  //]]>