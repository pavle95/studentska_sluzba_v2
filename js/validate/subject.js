function validateAddSubject() {
    /*
     * Function validates add_subject form
     * @param - none
     * @return boolean
     */
    var validation = "";
    var name = document.forms["add_subject"]["name"].value;
    if(name==""){
        validation+= "name can't be empty.\n";
    }
    var ecdl = document.forms["add_subject"]["ecdl"].value;
    if(ecdl!==""){
        if(ecdl<2 || ecdl>20){
            validation+= "ecdl must be between 2 and 20.\n";
        }
    }else{
        validation+= "ecdl can't be empty.\n";
    }

    var description = document.forms["add_subject"]["description"].value;
    if(description==""){
        validation+= "description can't be empty.\n";
    }
    if(validation==""){
        //alert("Subject added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

function validateEditSubject() {
    /*
     * Function validates edit_subject form
     * @param - none
     * @return boolean
     */
    var validation = "";
    var name = document.forms["edit_subject"]["name"].value;
    if(name==""){
        validation+= "name can't be empty.\n";
    }
    var ecdl = document.forms["edit_subject"]["ecdl"].value;
    if(ecdl!==""){
        if(ecdl<2 || ecdl>20){
            validation+= "ecdl must be between 2 and 20.\n";
        }
    }else{
        validation+= "ecdl can't be empty.\n";
    }
    var description = document.forms["edit_subject"]["description"].value;
    if(description==""){
        validation+= "description can't be empty.\n";
    }
    if(validation==""){
        //alert("Subject added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}