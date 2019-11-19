var emailform = document.getElementById("email");
emailform.addEventListener("change", ValidateEmail);

var unameform = document.getElementById("uname");
unameform.addEventListener("change", ValidateUname);

var pwdform = document.getElementById("password");
pwdform.addEventListener("change", ValidatePword);

var cpwdform = document.getElementById("pswdr");
cpwdform.addEventListener("change", ValidateCpword);

document.getElementById("signup").addEventListener("reset", ResetForm);

document.getElementById("signup").addEventListener("submit", SignUp);

var result = true;


function ValidateEmail(event) {
    var field = event.target;
    
    var pos = field.value.search(/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/);
    
    if (pos != 0) {
        document.getElementById("email_msg").innerHTML = "Email is invalid";
        result = false;
        
    }
    else {
        document.getElementById("email_msg").innerHTML = "";
        result = true;
    }
}

function ValidateUname(event) {
    var field = event.target;
    
    var pos = field.value.search(/^[\S][^\W]+$/);
    
    if (pos != 0) {
        document.getElementById("uname_msg").innerHTML = "Username is invalid";
        result = false;
    }
    else {
        document.getElementById("uname_msg").innerHTML = "";
        result = true;
    }
}

function ValidatePword(event) {
    var field = event.target;
    
    var pos = field.value.search(/^(?=.*\d)[a-zA-Z\d]{8}$/);
    
    if(pos != 0) {
        document.getElementById("pswd_msg").innerHTML = "Password is invalid (8 characters long, at least one digit, no spaces";
        result = false;
    }
    else {
         document.getElementById("pswd_msg").innerHTML = "";
        result = true;
    }
    
    if(cpwdform.value.length > 0) {
        if(field.value != cpwdform.value)
        {
            document.getElementById("pswdr_msg").innerHTML = "Password and confirm password do not match";
            result = false;
        }
        else {
            document.getElementById("pswdr_msg").innerHTML = "";
            result = true;
        }
    }
    
}

function ValidateCpword(event) {
    var field = event.target;
    
    if(field.value != cpwdform.value)
    {
        document.getElementById("pswdr_msg").innerHTML = "Password and confirm password do not match";
        result = false;
    }
    else {
        document.getElementById("pswdr_msg").innerHTML = "";
        result = true;
    }
}

function SignUp(event)
{
    var elements = event.currentTarget;
    
    var a = elements[0].value;
    var b = elements[1].value;
    var c = elements[2].value;
    var d = elements[3].value;
    
      
           // if email is left empty or email format is wrong, error message displays above email field in red color
    if (a==null || a =="")
    {
                
        document.getElementById("email_msg").innerHTML="Email address empty or wrong format. example: username@somewhere.sth";
        result = false;
    }
            
      
    if (b==null || b=="")
    {
        document.getElementById("uname_msg").innerHTML="Please enter the correct format for Username. (No leading or trailing spaces)";
        result = false;
    }
        
        
     
    if (c==null || c=="")
    {
        document.getElementById("pswd_msg").innerHTML="Please enter the password correctly. (8 characters long, at least one non-letter)";
        result = false;
    }
         
    if(result == false)
    {
        event.preventDefault();
    }
                                                                    
}

function ResetForm(event)
{
    document.getElementById("email_msg").innerHTML ="";
    document.getElementById("uname_msg").innerHTML ="";
    document.getElementById("pswd_msg").innerHTML ="";
    document.getElementById("pswdr_msg").innerHTML ="";

        
}



