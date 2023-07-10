
function check(){

	var question1 = document.quiz.question1.value;
	var question2 = document.quiz.question2.value;
	var question3 = document.quiz.question3.value;
	var correct = 0;


	if (question1 == "Damascus") {
		correct++;
}
	if (question2 == "Cairo") {
		correct++;
}	
	if (question3 == "Bagdad") {
		correct++;
	}
	
	
	

	if (correct == 0) {
		document.getElementById("picture").src = "img/false.jpg" ;
		document.getElementById("number_correct").innerHTML = "You got " + correct + " correct";
	}

	else if (correct > 0 && correct < 3) {
		document.getElementById("picture").src = "img/photp.jpg" ;
		document.getElementById("number_correct").innerHTML = "You got " + correct + " correct";
	}

	else if (correct == 3) {
		document.getElementById("picture").src = "img/true" ; 
		document.getElementById("number_correct").innerHTML = "You got " + correct + " correct";
	}

	document.getElementById("after_submit").style.visibility = "visible";	
	
	
	}
	
