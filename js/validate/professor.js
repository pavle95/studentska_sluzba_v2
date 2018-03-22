function validateAddProfessor(){
    /**
     * Function validates add_professor form
     * @param - none
     * @return boolean
     */
    var validation="";
    var firstName = document.forms["add_professor"]["firstname"].value;
    if(firstName==""){
        validation+= "first name can't be empty\n";
    }
    var lastName = document.forms["add_professor"]["lastname"].value;
    if(lastName==""){
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
    var username = document.forms["add_professor"]["username"].value;
    var usernamePattern = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernamePattern.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["add_professor"]["email"].value;
    var emailPattern = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailPattern.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["add_professor"]["password"].value;
    var passwordPattern = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passwordPattern.test(password)==false){
            validation+="Password format invalid\n"; //4-12chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
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
    /**
     * Function validates edit_professor form
     * @param - none
     * @return boolean
     */
    var validation="";
    var firstName = document.forms["edit_professor"]["firstname"].value;
    if(firstName==""){
        validation+= "first name can't be empty\n";
    }
    var lastName = document.forms["edit_professor"]["lastname"].value;
    if(lastName==""){
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
    var username = document.forms["edit_professor"]["username"].value;
    var usernamePattern = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernamePattern.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["edit_professor"]["email"].value;
    var emailPattern = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailPattern.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["edit_professor"]["password"].value;
    var passwordPattern = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passwordPattern.test(password)==false){
            validation+="Password format invalid\n"; //4-12chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("Professor added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}