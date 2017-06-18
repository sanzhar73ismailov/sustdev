function CheckPassword(form){

    var pass1 = form.password;
    var pass2 = form.password2;
    if (pass1.value == '') {

        alert("Вы не ввели пароль!");
        pass1.focus();
        pass1.select();
        return false;
    }


    if (pass1.value != pass2.value){
        alert("Введенные пароли не совпадают\nОба написания пароля должны совпадать - это исключает ошибки в дальнейшем.");
        pass1.focus();
        pass1.select();
        return false;
    }

    var bad = false;
    var pass = pass1.value;




    if (pass.length < 6) bad = true;
    if (pass == form.userName.value) bad = true;
    if (!bad){
        var chars = new Array();
        var i;
        for (i = 0; i < pass.length; i++){
            var c = pass.charAt(i);
            var j;
            for (j = 0; j < chars.length; j++){
                if (chars[j] == c) break;
            }
            if (j >= chars.length) chars[chars.length] = c;
        }
        if (chars.length < 3) bad = true;
    }
    if (bad){
        if (confirm("Вы указали очень простой пароль, который не может гарантировать безопасность.\nИспользовать его?")) return true;
        pass1.focus();
        pass1.select();
        return false;
    }
    return true;
}

function checkForm(form){
    var regExp1 = /(\d{2})-(\d{2})-(\d{4}$)/;
    //var regExp2 = /^([a-z0-9]+)([a-z0-9\.-_]+)@([a-z0-9\.-_]+)\.([a-z0-9])?/;
	var regExp2=/^[\w\-\.]+@\w+\.\w+$/;
	//var regExp2 = /^([\w\-]+)@([\w\-]+)\.([a-z0-9])?/;
	//var regExp2 = /^([a-z0-9]+)([a-z0-9\.-\-]+)([a-z0-9\.-_]+)@([a-z0-9\.-_]+)\.([a-z0-9])?/;
	//var regExp2 = /^([\.-_]{1})$/;
    var mail = form.email;
    var resultEmail = mail.value.match(regExp2);
    var radioSex = form.sex.value;


    if(!form.sex[0].checked & !form.sex[1].checked){
        alert("Вы забыли выбрать пол!");
        return false;
    }

    else{
        if(resultEmail == null){
            alert("Пожалуйста, введите свой настоящий e-mail");
            mail.value = "";
            return false;
        }

        else{
            return CheckPassword(form);
        //form.submit();
        }

    }
}

