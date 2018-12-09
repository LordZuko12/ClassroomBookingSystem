function showTime(type) {

    if(type.value==="lab"){
        document.getElementById("lb").style.display = "block";
        document.getElementById("th1").style.display = "none";
        document.getElementById("th2").style.display = "none";
    }else if(type.value==="theory1"){

        document.getElementById("th1").style.display = "block";
        document.getElementById("lb").style.display = "none";
        document.getElementById("th2").style.display = "none";
    }else if(type.value==="theory2"){

        document.getElementById("th2").style.display = "block";
        document.getElementById("th1").style.display = "none";
        document.getElementById("lb").style.display = "none";
    }

}

function validateBooking() {

    var validClass = true;
    var validCourse = true;
    var validTime = true;
    var valid = true;

    var isClass = document.getElementById("classType");
    var isCourse = document.getElementById("course");

    var th11 = document.getElementById("th11");
    var th12 = document.getElementById("th12");
    var th13 = document.getElementById("th13");
    var th14 = document.getElementById("th14");
    var th15 = document.getElementById("th15");
    var th16 = document.getElementById("th16");

    var th21 = document.getElementById("th21");
    var th22 = document.getElementById("th22");
    var th23 = document.getElementById("th23");
    var th24 = document.getElementById("th24");
    var th25 = document.getElementById("th25");

    var lb1 = document.getElementById("lb1");
    var lb2 = document.getElementById("lb2");
    var lb3 = document.getElementById("lb3");

    if(isClass.value == "classType"){

        document.getElementById("classSpan").innerText = "Please Select a Class Type!";
        validClass = false;

    }else{

        document.getElementById("classSpan").innerText = "";
        validClass = true;
    }

    console.log("here");
    if(isCourse.value == "course"){

        document.getElementById("courseSpan").innerText = "Please Select a Course Name!";
        validCourse = false;
    }else{

        document.getElementById("courseSpan").innerText = "";
        validCourse = true;
    }

    if(isClass.value =="theory1" && (!th11.checked && !th12.checked && !th13.checked && !th14.checked && !th15.checked && !th16.checked)){

        document.getElementById("timeSpan").innerText = "Please Select a Time!";
        validTime = false;
    }else{

        document.getElementById("timeSpan").innerText = "";
        validTime = true;
    }

    if(isClass.value =="theory2" && (!th21.checked && !th22.checked && !th23.checked && !th24.checked && !th25.checked)){

        document.getElementById("timeSpan").innerText = "Please Select a Time!";
        validTime = false;
    }else{

        document.getElementById("timeSpan").innerText = "";
        validTime = true;
    }

    if(isClass.value =="lab" && (!lb1.checked && !lb2.checked && !lb3.checked)){

        document.getElementById("timeSpan").innerText = "Please Select a Time!";
        validTime = false;
    }else{

        document.getElementById("timeSpan").innerText = "";
        validTime = true;

    }

    if(!validTime || !validClass || !validCourse){

        valid = false;
    }else{

        valid = true;
    }

    return valid;

}

var confirm = true;
function checkRoom() {

    var classRoom = document.getElementById("class");

    if(!classRoom.checked){

        document.getElementById("roomNumSpan").innerText = "Please Select a Room!!";
        confirm = false;
    }else{

        document.getElementById("roomNumSpan").innerText = "";
        confirm = true;
    }

    return confirm;
}