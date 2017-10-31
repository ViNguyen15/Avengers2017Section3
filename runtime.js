window.onload = function() {
        Refresh();
    }
	function go(val){
        
        switch(val) {
            case 1:
                direction = "move_y";
                value = 1;
                break;
            case 2:
                direction = "move_x";
                value = 1;
                break;
            case 3:
                direction = "move_y";
                value = -1;
                break;
            case 4:
                direction = "move_x";
                value = -1;
                break;
        }

        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 Refresh();
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func="+direction+"&id="+value, true);
        xmlhttp.send();
    }
    function Controller(func,id){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 Refresh();
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func="+func+"&id="+id, true);
        xmlhttp.send();
	}
    function RefreshPlayer(){
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("draw").setAttribute("style",this.responseText);
            }
        };
        xmlhttp.open("GET", "function/draw.php", true);
        xmlhttp.send();
    }
    function RefreshInventory(){
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("playerinfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func=displayPlayerInfo", true);
        xmlhttp.send();
    }
    function RefreshRoom(){
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("room").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func=displayRoom", true);
        xmlhttp.send();
    }
    function Refresh(){
        RefreshRoom();
        RefreshInventory();
        RefreshPlayer();
    }

	document.onkeydown = function myFunction() {
		switch (event.keyCode) {
		case 38:
            event.preventDefault();
			console.log("Up key is pressed");
			go(1)
			break;
		case 40:
            event.preventDefault();
			console.log("Down key is pressed");
			go(3)
			break;
		case 39:
            event.preventDefault();
			console.log("Right key is pressed");
			go(2)
			break;
		case 37:
            event.preventDefault();
			console.log("left key is pressed");
			go(4)
			break;
		}
	}
    
    /*
    * This script makes a description appear and disappear when you hover over the image of the item. 
    */
    function displayDescription(x) {
        document.getElementById("desc").innerHTML = x.getElementsByTagName("description")[0].innerHTML; 
    }

    function removeDescription(x) {
        document.getElementById("desc").innerHTML = " "; 
    }