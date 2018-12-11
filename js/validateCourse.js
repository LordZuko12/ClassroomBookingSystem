var valid =true;
var validDept =true;
var validCourse = true;

function checkCourseName(course) {
    var xhttp;
    if(dept.length === 0){
        document.getElementById("courseSpan").innerHTML = "";
        valid = false;
        return;
    }
    if(!isValidName(dept)){
        document.getElementById("courseSpan").innerHTML = "Please Enter a Valid Name";
        valid = false;
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("courseSpan").innerHTML = this.responseText;
        }
    };
    valid = true;
    xhttp.open("GET", "controller/courseExist?dept="+course, true);
    xhttp.send();
}


function isValidName(name){
    if(/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/.test(name)){
        return true;
    }
    else{
        return false;
    }
}
function  validateFormCourse() {

    var dept = document.getElementById("dept");
    var deptSpan = document.getElementById("deptSpan");
    var course = document.getElementById("course");
    var courseSpan = document.getElementById("courseSpan");


    if(dept.value =="select"){

        validDept = false;
        deptSpan.innerText = "Please Select a Department Name";
    }else{

        validDept = true;
        deptSpan.innerText = " ";
    }


    if(course.value.length===0) {
        validCourse = false;
        courseSpan.innerText = "Please Enter a Course Name";

    }else{

        if(!isValidName(course.value.toString())){
            validCourse = false;
            courseSpan.innerText = "Please Enter a Valid Name";
        }else{
            validCourse = true;
            courseSpan.innerText = " ";
        }
    }

    if(!validCourse || !validDept){

        valid = false;
    }else{

        valid = true;
    }

    return valid;
}