const url = 'ws://192.168.137.100:8080';
const connection = new WebSocket(url);

connection.onopen = function (evt) {
    connection.send('opening client');

    registerCheckbox("lamp_lamp");
    registerCheckbox("deur_deur");
    registerCheckbox("stoel_triller");
    registerCheckbox("bed_lamp");
    registerCheckbox("koelkast_koeler");
    registerCheckbox("zuil_alarm");
    registerCheckbox("raam_raam");
};

connection.onmessage = function (event) {
	console.log("msg recieved from server: "+ event.data);
	let dataJSON = JSON.parse(event.data);
    if (dataJSON !== null && dataJSON !== undefined) {
        console.log("recieved a JSON");

        let full_id = dataJSON.object_id + "_" + dataJSON.object_part;
        let status_text = document.getElementById(full_id + "_status");
	let checkbox_object = document.getElementById(full_id + "_checkbox");
	
        if (status_text !== undefined && status_text !== null ) {

            	if (dataJSON.value == 0){
                	status_text.innerHTML = "Uit";
                	if(checkbox_object != undefined)
	                	checkbox_object.checked = false;
            	}
            	else if (dataJSON.value === 1){
                	status_text.innerHTML = "Aan";
	               	if(checkbox_object != undefined)
	                	checkbox_object.checked = true;
                }
            	else{
                	status_text.innerHTML = dataJSON.value;
	               	//if(checkbox_object != undefined)
				
        	} else {
            		console.log("undefined element: " + full_id);
        	}
    	}
    	else {
        	console.log("recieved text, couldnt convert to JSON");
    	}
};

connection.onerror = function (error) {
    console.log(`WebSocket error: ${error}`);
    alert("error: " + error);
};

function registerCheckbox(_objId) {

	let checkboxString = _objId + "_checkbox";
    	let checkbox = document.getElementById(checkboxString);
	if(checkbox != null && checkbox != undefined){
		checkbox.addEventListener("change", function () {
        		let notificationMsg = _objId + " "+  Number(this.checked).toString(10);
        		connection.send(notificationMsg);
    		});
	}else
	console.log("checkbox was left undefined: "+ checkboxString);
};
