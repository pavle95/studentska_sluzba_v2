function validateSubjectGrade() {
     /*
      * Function validates subject grade
      * @param - none
      * @return boolean
      */
    var points = document.forms["student_subject"]["points"].value;
    if(points>=1 && points<=100){
        return true;
    }else{
        alert("points must be between 1 and 100");
        return false;
    }
}
