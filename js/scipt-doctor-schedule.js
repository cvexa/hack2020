$("#addPatient").on("click", function(){
	var patientName = $("#addPatientName").val();
	var patientAge = $("#addPatientAge").val();

	$.ajax({
        type: 'POST',
        url: './add-patient.php',
        data: {
            patientName: patientName,
            patientAge: patientAge
        },
        success: function (response) {
            var patientsObject = JSON.parse(response);
            displayCirclesUpdated(patientsObject.arrCount);
            document.getElementById('numberOfPatients').innerHTML = patientsObject.arrCount;
           	var pos = 1;
            for (var key in patientsObject.patientsData) {
			    if (patientsObject.patientsData.hasOwnProperty(key)) {
			        updateName(pos, patientsObject.patientsData[key].name);
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
			        updateName(pos, patientsObject.patientsData[key].name);
			        pos++;
			    }
			}
			clearName(pos);
        }
    });     
});

function displayCircles(){
	$.ajax({
        type: 'POST',
        url: './count_patients.php',
        data: {
        },
        success: function (response) {
            var patientsObject = JSON.parse(response);
            displayCirclesUpdated(patientsObject.arrCount);
            document.getElementById('numberOfPatients').innerHTML = patientsObject.arrCount;
            var pos = 1;
            for (var key in patientsObject.patientsData) {
			    if (patientsObject.patientsData.hasOwnProperty(key)) {
			        updateName(pos, patientsObject.patientsData[key].name);
			        pos++;
			    }
			}
			clearName(pos);
        }
    });     
}

function clearName(pos){
	for (var i = pos; i <= 11; i++) {
		updateName(i, '');
	}
}

function updateName(pos, name){
	switch(pos){
		case 1:
			document.getElementById('spanOne').innerHTML = name;
		break;
		case 2:
			document.getElementById('spanTwo').innerHTML = name;
		break;
		case 3:
			document.getElementById('spanThree').innerHTML = name;
		break;
		case 4:
			document.getElementById('spanFour').innerHTML = name;
		break;
		case 5:
			document.getElementById('spanFive').innerHTML = name;
		break;
		case 6:
			document.getElementById('spanSix').innerHTML = name;
		break;
		case 7:
			document.getElementById('spanSeven').innerHTML = name;
		break;
		case 8:
			document.getElementById('spanEight').innerHTML = name;
		break;
		case 9:
			document.getElementById('spanNine').innerHTML = name;
		break;
		case 10:
			document.getElementById('spanTen').innerHTML = name;
		break;
		case 11:
			document.getElementById('spanEleven').innerHTML = name;
		break;
	}
}

function displayCirclesUpdated(ready){
	switch(ready){
		case 0:
			document.getElementById('imageOne').src='images/black.png';
			document.getElementById('imageTwo').src='images/black.png';
			document.getElementById('imageThree').src='images/black.png';
			document.getElementById('imageFour').src='images/black.png';
			document.getElementById('imageFive').src='images/black.png';
			document.getElementById('imageSix').src='images/black.png';
			document.getElementById('imageSeven').src='images/black.png';
			document.getElementById('imageEight').src='images/black.png';
			document.getElementById('imageNine').src='images/black.png';
			document.getElementById('imageTen').src='images/black.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 1:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/black.png';
			document.getElementById('imageThree').src='images/black.png';
			document.getElementById('imageFour').src='images/black.png';
			document.getElementById('imageFive').src='images/black.png';
			document.getElementById('imageSix').src='images/black.png';
			document.getElementById('imageSeven').src='images/black.png';
			document.getElementById('imageEight').src='images/black.png';
			document.getElementById('imageNine').src='images/black.png';
			document.getElementById('imageTen').src='images/black.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 2:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/black.png';
			document.getElementById('imageFour').src='images/black.png';
			document.getElementById('imageFive').src='images/black.png';
			document.getElementById('imageSix').src='images/black.png';
			document.getElementById('imageSeven').src='images/black.png';
			document.getElementById('imageEight').src='images/black.png';
			document.getElementById('imageNine').src='images/black.png';
			document.getElementById('imageTen').src='images/black.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 3:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/yellow.png';
			document.getElementById('imageFour').src='images/black.png';
			document.getElementById('imageFive').src='images/black.png';
			document.getElementById('imageSix').src='images/black.png';
			document.getElementById('imageSeven').src='images/black.png';
			document.getElementById('imageEight').src='images/black.png';
			document.getElementById('imageNine').src='images/black.png';
			document.getElementById('imageTen').src='images/black.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 4:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/yellow.png';
			document.getElementById('imageFour').src='images/yellow.png';
			document.getElementById('imageFive').src='images/black.png';
			document.getElementById('imageSix').src='images/black.png';
			document.getElementById('imageSeven').src='images/black.png';
			document.getElementById('imageEight').src='images/black.png';
			document.getElementById('imageNine').src='images/black.png';
			document.getElementById('imageTen').src='images/black.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 5:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/yellow.png';
			document.getElementById('imageFour').src='images/yellow.png';
			document.getElementById('imageFive').src='images/yellow.png';
			document.getElementById('imageSix').src='images/black.png';
			document.getElementById('imageSeven').src='images/black.png';
			document.getElementById('imageEight').src='images/black.png';
			document.getElementById('imageNine').src='images/black.png';
			document.getElementById('imageTen').src='images/black.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 6:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/yellow.png';
			document.getElementById('imageFour').src='images/yellow.png';
			document.getElementById('imageFive').src='images/yellow.png';
			document.getElementById('imageSix').src='images/yellow.png';
			document.getElementById('imageSeven').src='images/black.png';
			document.getElementById('imageEight').src='images/black.png';
			document.getElementById('imageNine').src='images/black.png';
			document.getElementById('imageTen').src='images/black.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 7:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/yellow.png';
			document.getElementById('imageFour').src='images/yellow.png';
			document.getElementById('imageFive').src='images/yellow.png';
			document.getElementById('imageSix').src='images/yellow.png';
			document.getElementById('imageSeven').src='images/yellow.png';
			document.getElementById('imageEight').src='images/black.png';
			document.getElementById('imageNine').src='images/black.png';
			document.getElementById('imageTen').src='images/black.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 8:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/yellow.png';
			document.getElementById('imageFour').src='images/yellow.png';
			document.getElementById('imageFive').src='images/yellow.png';
			document.getElementById('imageSix').src='images/yellow.png';
			document.getElementById('imageSeven').src='images/yellow.png';
			document.getElementById('imageEight').src='images/yellow.png';
			document.getElementById('imageNine').src='images/black.png';
			document.getElementById('imageTen').src='images/black.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 9:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/yellow.png';
			document.getElementById('imageFour').src='images/yellow.png';
			document.getElementById('imageFive').src='images/yellow.png';
			document.getElementById('imageSix').src='images/yellow.png';
			document.getElementById('imageSeven').src='images/yellow.png';
			document.getElementById('imageEight').src='images/yellow.png';
			document.getElementById('imageNine').src='images/yellow.png';
			document.getElementById('imageTen').src='images/black.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 10:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/yellow.png';
			document.getElementById('imageFour').src='images/yellow.png';
			document.getElementById('imageFive').src='images/yellow.png';
			document.getElementById('imageSix').src='images/yellow.png';
			document.getElementById('imageSeven').src='images/yellow.png';
			document.getElementById('imageEight').src='images/yellow.png';
			document.getElementById('imageNine').src='images/yellow.png';
			document.getElementById('imageTen').src='images/yellow.png';
			document.getElementById('imageEleven').src='images/black.png';
		break;
		case 11:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/yellow.png';
			document.getElementById('imageFour').src='images/yellow.png';
			document.getElementById('imageFive').src='images/yellow.png';
			document.getElementById('imageSix').src='images/yellow.png';
			document.getElementById('imageSeven').src='images/yellow.png';
			document.getElementById('imageEight').src='images/yellow.png';
			document.getElementById('imageNine').src='images/yellow.png';
			document.getElementById('imageTen').src='images/yellow.png';
			document.getElementById('imageEleven').src='images/yellow.png';
		break;
		default:
			document.getElementById('imageOne').src='images/red.png';
			document.getElementById('imageTwo').src='images/yellow.png';
			document.getElementById('imageThree').src='images/yellow.png';
			document.getElementById('imageFour').src='images/yellow.png';
			document.getElementById('imageFive').src='images/yellow.png';
			document.getElementById('imageSix').src='images/yellow.png';
			document.getElementById('imageSeven').src='images/yellow.png';
			document.getElementById('imageEight').src='images/yellow.png';
			document.getElementById('imageNine').src='images/yellow.png';
			document.getElementById('imageTen').src='images/yellow.png';
			document.getElementById('imageEleven').src='images/yellow.png';
		break;
	}
}