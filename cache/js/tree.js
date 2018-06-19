function tree(id, url) {
	var element = document.getElementById(id)
	var ids = id;
	function hasClass(elem, className) {
		return new RegExp("(^|\\s)"+className+"(\\s|$)").test(elem.className)
	}

	function toggleNode(node) {
		var newClass = hasClass(node, 'ExpandOpen') ? 'ExpandClosed' : 'ExpandOpen'
		var re =  /(^|\s)(ExpandOpen|ExpandClosed)(\s|$)/
		node.className = node.className.replace(re, '$1'+newClass+'$3')
	}

	function load(node) {

		function showLoading(on) {
			var expand = node.getElementsByTagName('div')[0]
			expand.className = on ? 'ExpandLoading' : 'Expand'
		}


		function onSuccess(data) {
			if (!data.errcode) {
				onLoaded(data)
				showLoading(false)
			} else {
				showLoading(false)
				onLoadError(data)
			}
		}


		function onAjaxError(xhr, status){
			showLoading(false)
			var errinfo = { errcode: status }
			if (xhr.status != 200) {
				errinfo.message = xhr.statusText
			} else {
				errinfo.message = 'Некорректные данные с сервера'
			}
			onLoadError(errinfo)
		}


		function onLoaded(data) {
			for(var i=0; i<data.length; i++) {
				var child = data[i]
				var li = document.createElement('li')
				li.id = child.id
				child.isFolder = child.isFolder*1;
				li.className = "Node Expand" + (child.isFolder ? 'Closed' : 'Leaf')
				if (i == data.length-1) li.className += ' IsLast'
				innerHTMLval = '<div class="Expand"></div><div class="Content"><a ';
				innerHTMLval = innerHTMLval + '">'+child.name+' ('+child.type+') </a></div>';
				li.innerHTML = innerHTMLval;
				if (child.isFolder) {
					li.innerHTML += '<ul class="Container"></ul>'
				}
				node.getElementsByTagName('ul')[0].appendChild(li)
			}

			node.isLoaded = true
			toggleNode(node)
		}

		function onLoadError(error) {
			var msg = "Ошибка "+error.errcode
			if (error.message) msg = msg + ' :'+error.message
			alert(msg)
		}


		showLoading(true)


		$.ajax({
			url: url,
			data: "id=" + node.id,
			dataType: "json",
			success: onSuccess,
			error: onAjaxError,
			type: "post",
			cache: false
		})
	}

	element.onclick = function(event) {
		event = event || window.event
		var clickedElem = event.target || event.srcElement

		if (!hasClass(clickedElem, 'Expand')) {
			return 
		}

		var node = clickedElem.parentNode
		if (hasClass(node, 'ExpandLeaf')) {
			return 
		}

		if (node.isLoaded || node.getElementsByTagName('li').length) {
			toggleNode(node)
			return
		}


		if (node.getElementsByTagName('li').length) {
			toggleNode(node)
			return
		}
		load(node)
	}

}
