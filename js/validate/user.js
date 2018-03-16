function validateAddUser() {
    var validation = "";
    var username = document.forms["add_user"]["username"].value;
    var usernameRegx = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernameRegx.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["add_user"]["email"].value;
    var emailRegx = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailRegx.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["add_user"]["password"].value;

    var passRegx = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passRegx.test(password)==false){
            validation+="Password format invalid\n"; //10chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        alert("User added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

function validateLogin(){
    var validation = "";
    var email = document.forms["login"]["email"].value;
    var emailRegx = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailRegx.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["login"]["password"].value;
    var passRegx = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passRegx.test(password)==false){
            validation+="Password format invalid\n"; //10chars,1 lowercase, 1 uppercase and a number
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

    function validateEditUser() {
        //check if entered data(username, email, password) is empty or in invalid format.
        //if data is not valid alert user
        //return true or false
        var validation= "";
        var username = document.forms["edit_user"]["username"].value;
        var usernameRegx = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
        if(username!==""){
            if(usernameRegx.test(username)==false){
                validation+="Username format invalid\n";
            }
        }else{
            validation+= "username can't be empty\n";
        }
        var email = document.forms["edit_user"]["email"].value;
        var emailRegx = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
        if(email!==""){
            if(emailRegx.test(email)==false){
                validation+="Email format invalid\n";
            }
        }else{
            validation+= "email can't be empty\n";
        }
        var password = document.forms["edit_user"]["password"].value;
        var passRegx = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
        if(password!==""){
            if(passRegx.test(password)==false){
                validation+="Password format invalid\n"; //10chars,1 lowercase, 1 uppercase and a number
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

}