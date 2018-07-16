//Password Validation
function checkPassword()
{
    //Store the password field objects into variables ...
    var pass1 = $('#pass1');
    var pass2 = $('#pass2');

    //Compare the values in the password field and the confirmation field
    if(pass1.value == pass2.value){
        return true;
    }else{
        return false;
    }
}

//Phone number Validation
function validatephone()
{
    var phone = $("#phone");
    var numval = phone.val();

    phone.val(phone.val().replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g, ''));

    if (numval.length == 10) {
      return true;
    } else {
      return false;
    }
}

// validates firstname
function ValidateFirstName(firstname) {
    firstname.value = firstname.value.replace(/[^a-zA-Z\n\r]+/g, '');
}

// validates lastname
function ValidateLastName(lastname) {
    lastname.value = lastname.value.replace(/[^a-zA-Z\n\r]+/g, '');
}

// validate email
function email_validate(email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if(regMail.test(email) == false)
    {
      return false;
    }
    else
    {
      return true;
    }
}
