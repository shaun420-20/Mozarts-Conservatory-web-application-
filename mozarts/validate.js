function validateForm(){
        var n = document.form1.Name;
        var email = document.form1.username;
        var addr = document.form1.Address;
        var mobn = document.form1.mobno;
        var p1 = document.form1.pass1;
        var p2 = document.form1.pass2;
        var alphabets = /^[A-Za-z][A-Za-z ]+$/;
        var alphanum = /^[A-Za-z0-9)(,/. ]+$/;
        var num = /^[0-9]+$/;
        if (n.value == "")
        {
            window.alert("Please enter your name.");
            n.focus();
            return false;
        }
        if(!(n.value.match(alphabets)))
            {alert("Use alphabets in name"); n.focus; return false;}
        if (email.value == "" || email.value == null)
        {
            window.alert("Please enter a valid e-mail address.");
            email.focus();
            return false;
        }

        if (email.value.indexOf("@", 0) < 0)
        {
            window.alert("Please enter a valid e-mail address.");
            email.focus();
            return false;
        }

        if (email.value.indexOf(".", 0) < 0)
        {
            window.alert("Please enter a valid e-mail address.");
            email.focus();
            return false;
        }
		function validateForm() {
    var x = document.forms["myForm"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}
        if (addr.value == ""){window.alert("Provide address"); return false;}
        if (!(addr.value.match(alphanum)))
            {
                alert("Provide valid Address"); addr.focus; return false;
            }
        if (mobn.value == ""){alert("Provide Phone number");return false;}
        if (!(mobn.value.match(num))){alert("Mobile number must be numeric"); return false;}
        if (mobn.value.length != 10){alert("Mobile number must be 10 digit"); return false;}
        if(p1.value.length<6){
            alert("Passwprd lenght must be at least 6"); return false;
        }
        if (p1.value != p2.value){
            alert("Psswords not matching"); return false;
        }
    var a = Math.floor(Math.random() * 5) + 1 ;
    var b = Math.floor(Math.random() * 5) + 1 ;
    var rcheck = prompt("Please Give right Answer  "+a+"+"+b+"=");
    if(rcheck!=(a+b)){alert("Wrong answer"); return false;}
        
    }

function confirmit(){

    var ch = confirm("Do you want to reset?");
    if(ch == false){return false;}
    else{return true;}
}