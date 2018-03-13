function validateAddProfessor(){
    var validation="";
    var firstname = document.forms["add_professor"]["firstname"].value;
    if(firstname==""){
        validation+= "first name can't be empty\n";
    }
    var lastname = document.forms["add_professor"]["lastname"].value;
    if(lastname==""){
        validation+= "last name can't be empty\n";
    }
    var age = document.forms["add_professor"]["age"].value;
    var agePattern = new RegExp("^(2[89]|[3-5][0-9]|6[0-5])$");
    if(age!==""){
        if(agePattern.test(age)==false){
            validation+="age must be between is 28 and 65\n"
        }
    }else{
        validation+= "age can't be empty\n";
    }
    var subject = document.forms["add_professor"]["subject"].value;
    if(subject==""){
        validation+= "subject can't be empty\n";
    }
    if(validation==""){
        //alert("Professor added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

function validateEditProfessor(){
    var validation="";
    var firstname = document.forms["edit_professor"]["firstname"].value;
    if(firstname==""){
        validation+= "first name can't be empty\n";
    }
    var lastname = document.forms["edit_professor"]["lastname"].value;
    if(lastname==""){
        validation+= "last name can't be empty\n";
    }
    var age = document.forms["edit_professor"]["age"].value;
    var agePattern = new RegExp("^(2[89]|[3-5][0-9]|6[0-5])$");
    if(age!==""){
        if(agePattern.test(age)==false){
            validation+="age must be between is 28 and 65\n"
        }
    }else{
        validation+= "age can't be empty\n";
    }
    var subject = document.forms["edit_professor"]["subject"].value;
    if(subject==""){
        validation+= "subject can't be empty\n";
    }
    if(validation==""){
        //alert("Student added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }

}