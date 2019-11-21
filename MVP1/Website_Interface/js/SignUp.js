function SignUpForm(event)
{

    var elements = event.currentTarget;

    //declare variable
    var a = elements[0].value;  //Email
    var b = elements[1].value;  //Username
    var c = elements[2].value;  //Password
    var d = elements[3].value;  //Confirm Password
    var result = true;  //Default result

    //variable equation
    var email_v = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    var Uname_v = /^[a-zA-Z0-9_-]+$/;
    var pswd_v = /^(\S*)?\d+(\S*)?$/;

    //default err_msg is empty
    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("uname_msg").innerHTML = "";
    document.getElementById("pswd_msg").innerHTML = "";
    document.getElementById("pswdr_msg").innerHTML = "";

    //Email address should not be empty or wrong format
    if (a == null || a == "" || !email_v.test(a)) {
        document.getElementById("email_msg").innerHTML = "Email is empty or invalid(example: ense374@uregina.ca)";
        result = false;
    }

    //Username should not be empty or wrong format
    if (b == null || b == "" || !Uname_v.test(b)) {
        document.getElementById("uname_msg").innerHTML = "Username is empty or invalid";
        result = false;
    }

    //Password should not be empty or less than 8 characters
    if (c == null || c == "" || c.length <= 8 || !pswd_v.test(c)) {
        document.getElementById("pswd_msg").innerHTML = "Invalid password format (8 characters long and at least one non-letter)";
        result = false;
    }

    //Confirm Password shoule be exactly same with Password
    if (d == null || d == "" || d != c) {
        document.getElementById("pswdr_msg").innerHTML = "Confirm password should be exactly same with Password";
        result = false;
    }

    // Something went wrong
    if (result == false) {
        event.preventDefault();
    }

    //All Correct
    if (result == true) {
        window.alert("Successful Sign up!");
        location.href = "../html/sign_in.html";
    }

}

function ResetForm(event)
{
    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("uname_msg").innerHTML = "";
    document.getElementById("pswd_msg").innerHTML = "";
    document.getElementById("pswdr_msg").innerHTML = "";
}
