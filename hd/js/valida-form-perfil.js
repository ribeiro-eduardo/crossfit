$('#salvar').click(function () {
    console.log("oi");
    var nome = $('#nome').val();
    var email = $('#email').val();
    console.log(email);
    var data_nascimento = $("#data_nascimento").val();

    if (nome == "" && email == "" && data_nascimento == "") {
        $('#nome-obrig').show();
        $('#email-obrig').show();
        $('#data_nascimento-obrig').show();
        $('#nome').focus();
        return false;
    }
    else if (nome == "" && email == "" && data_nascimento == "") {
        $('#nome-obrig').show();
        $('#email-obrig').show();
        $('#data_nascimento-obrig').show();
        $('#nome').focus();
        return false;
    }
    else if (email == "" && data_nascimento == "") {
        $('#email-obrig').show();
        $('#data_nascimento-obrig').show();
        $('#email').focus();
        return false;
    }
    else if (nome == "" && email == "") {
        $('#nome-obrig').show();
        $('#email-obrig').show();
        $('#nome').focus();
        return false;
    }
    else if (data_nascimento == "" && email == "") {
        $('#data_nascimento-obrig').show();
        $('#email-obrig').show();
        $('#email').focus();
        return false;
    }
    else if (peso == "" && email == "") {
        $('#peso-obrig').show();
        $('#email-obrig').show();
        $('#email').focus();
        return false;
    }
    else if (nome == "" && data_nascimento == "") {
        $('#nome-obrig').show();
        $('#data_nascimento-obrig').show();
        $('#nome').focus();
        return false;
    }
    else if (nome == "") {
        $('#nome-obrig').show();
        $('#peso-obrig').show();
        $('#nome').focus();
        return false;
    }
    else if (data_nascimento == "") {
        $('#data_nascimento-obrig').show();
        $('#peso-obrig').show();
        $('#data_nascimento').focus();
        return false;
    }
    else if (nome == "") {
        $('#nome-obrig').show();
        $('#nome').focus();
        return false;
    }
    else if (email == "") {
        $('#email-obrig').show();
        $('#email').focus();
        return false;
    }
    else if (data_nascimento == "") {
        $('#data_nascimento-obrig').show();
        $('#data_nascimento').focus();
        return false;
    }
    else if (peso == "") {
        $('#peso-obrig').show();
        $('#peso').focus();
        return false;
    }
});