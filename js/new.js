function check()
{
    var nam = document.f1.names.value
    var regno = document.f1.regno.value
    var email = document.f1.email.value
    var pass = document.f1.password.value
    var pass2 = document.f1.chepassword.value
    var passcheck = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})")
    var emcheck = new RegExp("^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$")
    var passbul = passcheck.test(pass)
    var embul = emcheck.test(email)
    if(embul==false)
    {
        alert("Invalid Email");
        document.getElementById('email').value='';
    }
    if(pass!=pass2)
    {
        alert("Passwords didn't Match");
        document.getElementById('password').value='';
        document.getElementById('chepassword').value='';
    }
    if(embul==true && pass==pass2)
    {
        return true;
    }
    else
    {
        return false;
    }
}