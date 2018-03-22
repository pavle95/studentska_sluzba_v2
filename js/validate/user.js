function validateAddUser() {
    /*
     * Function validates add_user form
     * @param - none
     * @return boolean
     */
    var validation = "";
    var username = document.forms["add_user"]["username"].value;
    var usernamePattern = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernamePattern.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["add_user"]["email"].value;
    var emailPattern = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailPattern.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["add_user"]["password"].value;
    var passwordPattern = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passwordPattern.test(password)==false){
            validation+="Password format invalid\n"; //4-12 chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("User added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

function validateEditUser() {
    /*
     * Function validates edit_user form
     * @param - none
     * @return boolean
     */
    var validation= "";
    var username = document.forms["edit_user"]["username"].value;
    var usernamePattern= new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernamePattern.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["edit_user"]["email"].value;
    var emailPattern = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailPattern.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["edit_user"]["password"].value;
    var passwordPattern = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passwordPattern.test(password)==false){
            validation+="Password format invalid\n"; //4-12chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("User edited successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

function validateLogin(){
    /*
     * Function validates login form
     * @param - none
     * @return boolean
     */
    var validation = "";
    var email = document.forms["login"]["email"].value;
    var emailPattern = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailPattern.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["login"]["password"].value;
    var passwordPattern = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passwordPattern.test(password)==false){
            validation+="Password format invalid\n"; //4-12chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("Login successful");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

