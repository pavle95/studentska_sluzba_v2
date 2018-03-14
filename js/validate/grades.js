function validateSubjectGrade() {
    var points = document.forms["student_subject"]["points"].value;
    var grade = "";
    switch(true){
        case(points>=1 && points<51):grade="F";break;
        case(points>=51 && points<60):grade="E";break;
        case(points>=60 && points<70):grade="D";break;
        case(points>=70 && points<80):grade="C";break;
        case(points>=80 && points<90):grade="B";break;
        case(points>=90 && points<=100):grade="A";break;
        default:alert("points must be between 1 and 100");break;
    }
    if(grade==""){
        return false;
    }else{
        return true;
    }
}
