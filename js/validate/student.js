function validateAddStudent() {
    /*
     * Function validates add_student form
     * @param - none
     * @return boolean
     */
    var validation="";
    var firstName = document.forms["add_student"]["firstname"].value;
    if(firstName==""){
        validation+= "first name can't be empty\n";
    }
    var lastName = document.forms["add_student"]["lastname"].value;
    if(lastName==""){
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
    var birthDate = document.forms["add_student"]["birth_date"].value;
    var birthDatePattern = new RegExp("^([12]\\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\\d|3[01]))")
    if(birthDate!==""){
        if(birthDatePattern.test(birthDate)==false){
            validation+="birthdate format is not correct\n"
        }
    }else{
        validation+= "birthdate can't be empty\n";
    }
    var course = document.forms["add_student"]["course"].value;
    if(course==""){
        validation+= "course can't be empty\n";
    }
    var username = document.forms["add_student"]["username"].value;
    var usernamePattern = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernamePattern.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["add_student"]["email"].value;
    var emailPattern = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailPattern.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["add_student"]["password"].value;
    var passwordPattern = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passwordPattern.test(password)==false){
            validation+="Password format invalid\n"; //4-12chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("Student added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }

}

function validateEditStudent() {
    /*
     * Function validates edit_student form
     * @param - none
     * @return boolean
     */
    var validation="";
    var firstName = document.forms["edit_student"]["firstname"].value;
    if(firstName==""){
        validation+= "first name can't be empty\n";
    }
    var lastName = document.forms["edit_student"]["lastname"].value;
    if(lastName==""){
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
    var birthDate = document.forms["edit_student"]["birth_date"].value;
    if(birthDate==""){
        validation+= "birthdate can't be empty\n";
    }
    var course = document.forms["edit_student"]["course"].value;
    if(course==""){
        validation+= "course can't be empty\n";
    }
    var username = document.forms["edit_student"]["username"].value;
    var usernamePattern = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernamePattern.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["edit_student"]["email"].value;
    var emailPattern = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailPattern.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["edit_student"]["password"].value;

    var passwordPattern = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passwordPattern.test(password)==false){
            validation+="Password format invalid\n"; //4-12chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("Student added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}