function validateAddStudent() {
    var validation="";
    var firstname = document.forms["add_student"]["firstname"].value;
    if(firstname==""){
        validation+= "first name can't be empty\n";
    }
    var lastname = document.forms["add_student"]["lastname"].value;
    if(lastname==""){
        validation+= "last name can't be empty\n";
    }
    var index = document.forms["add_student"]["index"].value;
    var indexPattern = new RegExp("^\\d{2,3}-\\d{2}$");
    if(index!==""){
        if(indexPattern.test(index)==false){
            validation+="index format is not correct\n"
        }
    }else{
        validation+= "index can't be empty\n";
    }
    var birthdate = document.forms["add_student"]["birth_date"].value;
    var bdPattern = new RegExp("^([12]\\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\\d|3[01]))")
    if(birthdate!==""){
        if(bdPattern.test(birthdate)==false){
            validation+="birthdate format is not correct\n"
        }
    }else{
        validation+= "birthdate can't be empty\n";
    }
    var course = document.forms["add_student"]["course"].value;
    if(course==""){
        validation+= "course can't be empty\n";
    }
    if(validation==""){
        alert("Student added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }

}

function validateEditStudent() {
    var validation="";
    var firstname = document.forms["edit_student"]["firstname"].value;
    if(firstname==""){
        validation+= "first name can't be empty\n";
    }
    var lastname = document.forms["edit_student"]["lastname"].value;
    if(lastname==""){
        validation+= "last name can't be empty\n";
    }
    var index = document.forms["edit_student"]["index"].value;
    var indexPattern = new RegExp("^\\d{2,3}-\\d{2}$");
    if(index!==""){
        if(indexPattern.test(index)==false){
            validation+="index format is not correct\n"
        }
    }else{
        validation+= "index can't be empty\n";
    }
    var birthdate = document.forms["edit_student"]["birth_date"].value;
    if(birthdate==""){
        validation+= "birthdate can't be empty\n";
    }
    var course = document.forms["edit_student"]["course"].value;
    if(course==""){
        validation+= "course can't be empty\n";
    }
    if(validation==""){
        //alert("Student added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}