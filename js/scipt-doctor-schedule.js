$("#addPatient").on("click", function(){
	var patientName = $("#addPatientName").val();
	var patientAge = $("#addPatientAge").val();
	var doctorId = $("#doctor_id").val();

	$.ajax({
        type: 'POST',
        url: './add-patient.php',
        data: {
            patientName: patientName,
            patientAge: patientAge,
			doctorId: doctorId
        },
        success: function (response) {
            var patientsObject = JSON.parse(response);
            displayCirclesUpdated(patientsObject.arrCount);
            document.getElementById('numberOfPatients').innerHTML = patientsObject.arrCount;
           	var pos = 1;
            for (var key in patientsObject.patientsData) {
			    if (patientsObject.patientsData.hasOwnProperty(key)) {
			        updateName(pos, patientsObject.patientsData[key].name, patientsObject.patientsData[key].age);
			        pos++;
			    }
			}
        }
    });     
});

$("#nextPatient").on("click", function(){
	$.ajax({
        type: 'POST',
        url: './remove-patient.php',
        data: {
        },
        success: function (response) {
            var patientsObject = JSON.parse(response);
            displayCirclesUpdated(patientsObject.arrCount);
            document.getElementById('numberOfPatients').innerHTML = patientsObject.arrCount;
            var pos = 1;
            for (var key in patientsObject.patientsData) {
			    if (patientsObject.patientsData.hasOwnProperty(key)) {
			        updateName(pos, patientsObject.patientsData[key].name, patientsObject.patientsData[key].age);
			        pos++;
			    }
			}
			clearName(pos);
        }
    });     
});

function displayCircles(){
	var doctorId = $("#doctor_id").val();
	$.ajax({
        type: 'POST',
        url: './count_patients.php',
        data: {
			doctorId: doctorId
        },
        success: function (response) {
            var patientsObject = JSON.parse(response);
            displayCirclesUpdated(patientsObject.arrCount);
            document.getElementById('numberOfPatients').innerHTML = patientsObject.arrCount;
            var pos = 1;
            for (var key in patientsObject.patientsData) {
			    if (patientsObject.patientsData.hasOwnProperty(key)) {
			        updateName(pos, patientsObject.patientsData[key].name, patientsObject.patientsData[key].age);
			        pos++;
			    }
			}
			clearName(pos);
        }
    });     
}

function clearName(pos){
	for (var i = pos; i <= 12; i++) {
		updateName(i, '', 'delete');
	}
}

function updateName(pos, name, age){	
	switch(pos){
		case 1:		
			if (age == 'delete'){
				document.getElementById('spanOne').innerHTML = name;
			} else {
				document.getElementById('spanOne').innerHTML = name + ' (' + age + ')';
			}			
		break;
		case 2:
			if (age == 'delete'){
				document.getElementById('spanTwo').innerHTML = name;
			} else {
				document.getElementById('spanTwo').innerHTML = name + ' (' + age + ')';
			}	
		break;
		case 3:
			if (age == 'delete'){
				document.getElementById('spanThree').innerHTML = name;
			} else {
				document.getElementById('spanThree').innerHTML = name + ' (' + age + ')';
			}	
		break;
		case 4:
			if (age == 'delete'){
				document.getElementById('spanFour').innerHTML = name;
			} else {
				document.getElementById('spanFour').innerHTML = name + ' (' + age + ')';
			}	
		break;
		case 5:
			if (age == 'delete'){
				document.getElementById('spanFive').innerHTML = name;
			} else {
				document.getElementById('spanFive').innerHTML = name + ' (' + age + ')';
			}	
		break;
		case 6:
			if (age == 'delete'){
				document.getElementById('spanSix').innerHTML = name;
			} else {
				document.getElementById('spanSix').innerHTML = name + ' (' + age + ')';
			}	
		break;
		case 7:
			if (age == 'delete'){
				document.getElementById('spanSeven').innerHTML = name;
			} else {
				document.getElementById('spanSeven').innerHTML = name + ' (' + age + ')';
			}	
		break;
		case 8:
			if (age == 'delete'){
				document.getElementById('spanEight').innerHTML = name;
			} else {
				document.getElementById('spanEight').innerHTML = name + ' (' + age + ')';
			}	
		break;
		case 9:
			if (age == 'delete'){
				document.getElementById('spanNine').innerHTML = name;
			} else {
				document.getElementById('spanNine').innerHTML = name + ' (' + age + ')';
			}	
		break;
		case 10:
			if (age == 'delete'){
				document.getElementById('spanTen').innerHTML = name;
			} else {
				document.getElementById('spanTen').innerHTML = name + ' (' + age + ')';
			}	
		break;
		case 11:
			if (age == 'delete'){
				document.getElementById('spanEleven').innerHTML = name;
			} else {
				document.getElementById('spanEleven').innerHTML = name + ' (' + age + ')';
			}	
		break;
		case 12:
			if (age == 'delete'){
				document.getElementById('spanTwelve').innerHTML = name;
			} else {
				document.getElementById('spanTwelve').innerHTML = name + ' (' + age + ')';
			}	
		break;
	}
}

function displayCirclesUpdated(ready){
	switch(ready){
		case 0:
			document.getElementById("imageOne").className = "opClass";
			document.getElementById("imageTwo").className = "opClass";
			document.getElementById("imageThree").className = "opClass";
			document.getElementById("imageFour").className = "opClass";
			document.getElementById("imageFive").className = "opClass";
			document.getElementById("imageSix").className = "opClass";
			document.getElementById("imageSeven").className = "opClass";
			document.getElementById("imageEight").className = "opClass";
			document.getElementById("imageNine").className = "opClass";
			document.getElementById("imageTen").className = "opClass";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 1:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "opClass";
			document.getElementById("imageThree").className = "opClass";
			document.getElementById("imageFour").className = "opClass";
			document.getElementById("imageFive").className = "opClass";
			document.getElementById("imageSix").className = "opClass";
			document.getElementById("imageSeven").className = "opClass";
			document.getElementById("imageEight").className = "opClass";
			document.getElementById("imageNine").className = "opClass";
			document.getElementById("imageTen").className = "opClass";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 2:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "opClass";
			document.getElementById("imageFour").className = "opClass";
			document.getElementById("imageFive").className = "opClass";
			document.getElementById("imageSix").className = "opClass";
			document.getElementById("imageSeven").className = "opClass";
			document.getElementById("imageEight").className = "opClass";
			document.getElementById("imageNine").className = "opClass";
			document.getElementById("imageTen").className = "opClass";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 3:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "opClass";
			document.getElementById("imageFive").className = "opClass";
			document.getElementById("imageSix").className = "opClass";
			document.getElementById("imageSeven").className = "opClass";
			document.getElementById("imageEight").className = "opClass";
			document.getElementById("imageNine").className = "opClass";
			document.getElementById("imageTen").className = "opClass";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 4:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "responsive";
			document.getElementById("imageFive").className = "opClass";
			document.getElementById("imageSix").className = "opClass";
			document.getElementById("imageSeven").className = "opClass";
			document.getElementById("imageEight").className = "opClass";
			document.getElementById("imageNine").className = "opClass";
			document.getElementById("imageTen").className = "opClass";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 5:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "responsive";
			document.getElementById("imageFive").className = "responsive";
			document.getElementById("imageSix").className = "opClass";
			document.getElementById("imageSeven").className = "opClass";
			document.getElementById("imageEight").className = "opClass";
			document.getElementById("imageNine").className = "opClass";
			document.getElementById("imageTen").className = "opClass";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 6:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "responsive";
			document.getElementById("imageFive").className = "responsive";
			document.getElementById("imageSix").className = "responsive";
			document.getElementById("imageSeven").className = "opClass";
			document.getElementById("imageEight").className = "opClass";
			document.getElementById("imageNine").className = "opClass";
			document.getElementById("imageTen").className = "opClass";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 7:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "responsive";
			document.getElementById("imageFive").className = "responsive";
			document.getElementById("imageSix").className = "responsive";
			document.getElementById("imageSeven").className = "responsive";
			document.getElementById("imageEight").className = "opClass";
			document.getElementById("imageNine").className = "opClass";
			document.getElementById("imageTen").className = "opClass";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 8:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "responsive";
			document.getElementById("imageFive").className = "responsive";
			document.getElementById("imageSix").className = "responsive";
			document.getElementById("imageSeven").className = "responsive";
			document.getElementById("imageEight").className = "responsive";
			document.getElementById("imageNine").className = "opClass";
			document.getElementById("imageTen").className = "opClass";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 9:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "responsive";
			document.getElementById("imageFive").className = "responsive";
			document.getElementById("imageSix").className = "responsive";
			document.getElementById("imageSeven").className = "responsive";
			document.getElementById("imageEight").className = "responsive";
			document.getElementById("imageNine").className = "responsive";
			document.getElementById("imageTen").className = "opClass";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 10:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "responsive";
			document.getElementById("imageFive").className = "responsive";
			document.getElementById("imageSix").className = "responsive";
			document.getElementById("imageSeven").className = "responsive";
			document.getElementById("imageEight").className = "responsive";
			document.getElementById("imageNine").className = "responsive";
			document.getElementById("imageTen").className = "responsive";
			document.getElementById("imageEleven").className = "opClass";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 11:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "responsive";
			document.getElementById("imageFive").className = "responsive";
			document.getElementById("imageSix").className = "responsive";
			document.getElementById("imageSeven").className = "responsive";
			document.getElementById("imageEight").className = "responsive";
			document.getElementById("imageNine").className = "responsive";
			document.getElementById("imageTen").className = "responsive";
			document.getElementById("imageEleven").className = "responsive";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		case 11:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "responsive";
			document.getElementById("imageFive").className = "responsive";
			document.getElementById("imageSix").className = "responsive";
			document.getElementById("imageSeven").className = "responsive";
			document.getElementById("imageEight").className = "responsive";
			document.getElementById("imageNine").className = "responsive";
			document.getElementById("imageTen").className = "responsive";
			document.getElementById("imageEleven").className = "responsive";
			document.getElementById("imageTwelve").className = "opClass";
		break;
		default:
			document.getElementById("imageOne").className = "responsive";
			document.getElementById("imageTwo").className = "responsive";
			document.getElementById("imageThree").className = "responsive";
			document.getElementById("imageFour").className = "responsive";
			document.getElementById("imageFive").className = "responsive";
			document.getElementById("imageSix").className = "responsive";
			document.getElementById("imageSeven").className = "responsive";
			document.getElementById("imageEight").className = "responsive";
			document.getElementById("imageNine").className = "responsive";
			document.getElementById("imageTen").className = "responsive";
			document.getElementById("imageEleven").className = "responsive";
			document.getElementById("imageTwelve").className = "responsive";
		break;
	}
}