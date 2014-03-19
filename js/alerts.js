var Alerts = function(){
	
	this.box = document.getElementById('alertsContainer');//create Mesage box var

	this.setErrors = function (err){
		for (var i = 0; i < err.length; i++) {
			this.error(err[i]);
		};

	}


	this.setMessages = function(msg){
		for (var i = 0; i < msg.length; i++) {
			this.message(msg[i]);
		};

	}

	this.setWarnings = function(warn){
		for (var i = 0; i < warn.length; i++) {
			this.warning(warn[i]);
		};

	}

	this.add = function(message, type){
		type = type || 'M';
		box = this.box;
		var li = document.createElement('li');
		switch(type){
			case 'W':
				li.className = "alert warning";
				break;
			case 'E':
				li.className = "alert error";
				break;
			default:
				li.className = "alert success";
				break;
		}
		li.appendChild(document.createTextNode(message));
		li.ondblclick = function(){
			document.getElementById('alertsContainer').removeChild(li);
		}
		document.getElementById('alertsContainer').appendChild(li);//Add message to messagebox.

		window.setTimeout(function(){
			document.getElementById('alertsContainer').removeChild(li);//remove message from message box.
		}, 5000);
	}


	this.message = function(msg){
		this.add(msg, 'M');
	}
	
	this.warning = function(msg){
		this.add(msg, 'W');
	}
	
	this.error = function(msg){
		this.add(msg, 'E');
	}


}