<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <title>WorkSpace</title>
    <script type="text/javascript">//<![CDATA[

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

window.onload=function(){
      
	var big_db = {
		"begin":
		{
			'create':{
				'iteger':{
					'array("enter array name")':['end'], 
					'variable("enter variable name")':['end']
				},
				'decimal':{
					'array("enter array name")':['end'], 
					'variable("enter variable name")':['end']
				},
				'char':{
					'array("enter array name")':['end'],
					'variable("enter variable name")':['end']
				}, 
				'string':{
					'array("enter array name")':['end'], 
					'variable("enter variable name")':['end']
				}, 
				'floating point':{
					'array("enter array name")':['end'], 
					'variable("enter variable name")':['end']
				}, 
				'boolean':{
					'array("enter array name")':['end'], 
					'variable("enter variable name")':['end']
				}, 
				'object("enter object name")':['end']
			}, 
			'delete':{
				'array("enter name of array")':['end'],
				'variable("enter variable name")':['end'], 
				'object("enter object name")':['end']
			}, 
			'calculate':{
				'sum("enter variable name" and "enter variable name")':['end'], 
				'quotient("enter variable name" and "enter variable name")':['end'], 
				'difference("enter variable name" and "enter variable name")':['end'], 
				'product("enter variable name" and "enter variable name")':['end'], 
				'square root("enter variable name")':['end'], 
				'power("enter variable name", "enter degree")':['end']
			}, 
			'change':{
				'variable("enter variable name")':['end'], 
				'element of array("enter element number")':['end'], 
				'field of object("enter field of object name")':['end']
			}, 
			'replace':{
				'elements of array(from "old value" to "new value")':['end'], 
				'letters in string(from "old value" to "new value")':['end']
			}, 
			'fill':{
				'array':{
					'chars("enter char")':['end'], 
					'random values':['end'], 
					'values("enter value")':['end']
				}, 
				'string':{
					'chars("enter char")':['end'], 
					'random values':['end'], 
					'values("enter value")':['end']
				}
			}, 
			'compare':{
				'variables("enter variable name" and "enter variable name")':['end'], 
				'boolean variables("enter variable name" and "enter variable name")':['end']
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
  	
</script>		
</head>
<body>
<header>
	<img src="logo.png">
	<div class="menu">
		<div>
			<a class="menu_item_layer__first" href="#">START WORK</a>
			<a class="menu_item_layer__second" href="#">START WORK</a>
		</div>
		<div>
			<a class="menu_item_layer__first" href="#">NEWS</a>
			<a class="menu_item_layer__second" href="#">NEWS</a>
		</div>
		<div>
			<a class="menu_item_layer__first" href="#">RULES</a>
			<a class="menu_item_layer__second" href="#">RULES</a>
		</div>
		<div>
			<a class="menu_item_layer__first" href="#">HELP</a>
			<a class="menu_item_layer__second" href="#">HELP</a>
		</div>
		<div>
			<a class="menu_item_layer__first" href="#">ABOUT US</a>
			<a class="menu_item_layer__second" href="#">ABOUT US</a>
		</div>
		<div>
			<a class="menu_item_layer__first" href="#">LOG OUT</a>
			<a class="menu_item_layer__second" href="#">LOG OUT</a>
		</div>
	</div>
</header>
<main>
	<form class="main__body" method="POST" action="">
	<article class="main__workspace">
		<div class="options">
			<h2>CODE EDITOR</h2>
			<span>Editor mode:</span>
			<div class="main__radio_btn">
				<input id="basic" type="radio" name="radio" value="basic" checked onchange="mode_select()">
				<label for="basic">Basic mode</label>
			</div>
			<div class="main__radio_btn">
				<input id="advanced" type="radio" name="radio" value="advanced" onchange="mode_select()">
				<label for="advanced">Advanced mode</label>
			</div>
		</div>
		<textarea id="editor" class="main__editor" name="editor"></textarea>
	</article>
	<aside class="main__options">
		<div class="options">
			<h2>OPTIONS</h2>
			<span>Programming language:</span>
			<div class="main__radio_btn">
				<input id="C" type="radio" name="radio_l" value="C" checked>
				<label for="C">C</label>
			</div>
			<div class="main__radio_btn">
				<input id="Cpp" type="radio" name="radio_l" value="Cpp">
				<label for="Cpp">C++</label>
			</div>
			<div class="main__radio_btn">
				<input id="CS" type="radio" name="radio_l" value="CS">
				<label for="CS">C#</label>
			</div>
			<div class="main__radio_btn">
				<input id="php" type="radio" name="radio_l" value="php">
				<label for="php">PHP</label>
			</div>
		</div>
		<div id="helper" class="main__option_help" unselectable="on"></div>
		<input class="main__submit" type="submit" name="s" value="PROCESS">
	</aside>
	</form>
</main>
<footer>
	
</footer>
</body>
</html>