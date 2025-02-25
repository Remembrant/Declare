function validateStudentNumber() {

    var studentNumber = document.getElementById("studentNumber").value;
    document.getElementById("studentNumber").innerHTML = document.getElementById("studentNumber").innerHTML;
    document.getElementById("studentNumber").style.color = "black";

	if (studentNumber > 0) {
		if (studentNumber.length == 9) {
			document.getElementById("lblStudentNumber").innerHTML = "Student number is correct";
			document.getElementById("studentNumber").style.color = "black";
			document.getElementById("lblStudentNumber").style.color = "green";
			return true;
		} else {
			document.getElementById("lblStudentNumber").innerHTML = "*** Valid Student number must have 9 digits";
			document.getElementById("studentNumber").style.color = "red";
			document.getElementById("lblStudentNumber").style.color = "red";
			return false;
		}
	} else {
		document.getElementById("lblStudentNumber").innerHTML = "*** Valid Student number is required";
		document.getElementById("studentNumber").style.color = "red";
		document.getElementById("lblStudentNumber").style.color = "red";
		return false;
	}
    
}


function validateName() {
    var name = document.getElementById("name").value;
    document.getElementById("name").innerHTML = document.getElementById("name").innerHTML;
    document.getElementById("name").style.color = "black";

    if (name.length < 2) {
        document.getElementById("lblName").innerHTML = "**** Name is required";
        document.getElementById("name").style.color = "red";
        document.getElementById("lblName").style.color = "red";
        return false;
    } else if (name.length > 30) {
        document.getElementById("lblName").innerHTML = "**** Name is too long";
        document.getElementById("lblName").style.color = "red";
        document.getElementById("name").style.color = "red";
        return false;
    } else {
		var re = /[A-Za-z]+$/;
		if (re.test(name)) {
			document.getElementById("lblName").innerHTML = "Ok";
			document.getElementById("lblName").style.color = "green";
			document.getElementById("name").style.color = "black";
			return true;
		} else {
			document.getElementById("lblName").innerHTML = "**** Name contain invalid character";
			document.getElementById("lblName").style.color = "red";
			document.getElementById("name").style.color = "red";
			return false;
		}
		
	}
   

}


function validateCellNO() {
    var phone = document.getElementById("cellNO").value;
    var start = phone.split('');
	var saCode = start[0] + start[1] + start[2];
	var re = /^[0-9]+$/;
    console.log(phone.length);
	if (phone > 0) {
        
		if (re.test(phone) && phone.length == 10) {
			document.getElementById("lblCellNO").innerHTML = "The cell number is correct";
			document.getElementById("lblCellNO").style.color = "green";
			document.getElementById("cellNO").style.color = "black";
			return true;
		} else {
			document.getElementById("lblCellNO").innerHTML = "**** Valid cell number must have 10 digits";
			document.getElementById("lblCellNO").style.color = "red";
			document.getElementById("cellNO").style.color = "red";
			return false;
        }
        
	} else {
        document.getElementById("lblCellNO").innerHTML = "*** Valid cell number is required";
        document.getElementById("cellNO").style.color = "red";
        document.getElementById("lblCellNO").style.color = "red";
        return false;
    }
}


function validateEmail() {
    var email = document.getElementById("email").value;

    if (!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) {
        document.getElementById("lblEmail").innerHTML = "**** Please provide a valid email address format";
        document.getElementById("lblEmail").style.color = "red";
        return false;
    } else {
        document.getElementById("lblEmail").innerHTML = "Email address format is correct";
        document.getElementById("lblEmail").style.color = "green";
    }
}


function validatePassword() {
    var password = document.getElementById("password").value;

    if (password.length < 5) {
        document.getElementById("lblPassword").innerHTML = "**** Password should contain atleast 5 characters";
        document.getElementById("lblPassword").style.color = "red";
        return false;
    }
    if (password.length > 20) {
        document.getElementById("lblPassword").innerHTML = "**** Password should not contain more than 20 characters";
        document.getElementById("lblPassword").style.color = "red";
        return false;
    } else {
        document.getElementById("lblPassword").innerHTML = "**** Ok";
        document.getElementById("lblPassword").style.color = "green";
        return true;
    }
}


function validatePasswordMatch() {
    var password = document.getElementById("uPass").value;
    var confirm = document.getElementById("cPass").value;

    if (confirm == password) {
        document.getElementById("lblCpass").innerHTML = "Password match";
        document.getElementById("lblCpass").style.color = "green";

        return true;
    } else {
        document.getElementById("lblCpass").innerHTML = "**** Passwords do not match";
        document.getElementById("lblCpass").style.color = "red";
        return false;
    }
}