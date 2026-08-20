function collect_data(){
    let fullname = document.getElementById("fullname").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirm_password = document.getElementById("confirm_password").value.trim();

    let valid = true;
    let message = "";

    if(fullname.length < 5){
        message += "Full name should be at least 5 characters\n";
        valid = false;
    }
    if(email == ""){
        message += "Email cannot be empty\n";
        valid = false;
    }
    if(password.length < 5){
        message += "Password should be at least 5 characters\n";
        valid = false;
    }
    if(confirm_password == ""){
        message += "Confirm password cannot be empty\n";
        valid = false;
    }
    if(password != confirm_password){
        message += "Password and Confirm Password do not match\n";
        valid = false;
    }
    if(!valid){
        alert(message);
    }
    return valid;
}

function validate_complaint()
{
    let title = document.getElementById("title").value.trim();
    let category = document.getElementById("category").value.trim();
    let description = document.getElementById("description").value.trim();

    let valid = true;
    let message = "";

    if(title.length <5)
        {
        message += "Complaint title should be at least 5 characters\n";
        valid = false;
        }
    if(category.length<3)
        {
        message += "Category should be at least 3 characters\n";
        valid = false;
        }
    if(description.length <10)
        {
        message += "Description should be at least 10 characters\n";
        valid = false;
        }
    if(!valid)
        {
        alert(message);
        }
    return valid;
}