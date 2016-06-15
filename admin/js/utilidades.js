/**
 * Created by Eduardo Ribeiro on 12/04/2016.
 */
function randomString() {
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
    var string_length = 8;
    var randomstring = '';
    for (var i=0; i<string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum,rnum+1);
    }
    document.usuarios.senha.value = randomstring;
}

function usarEmail(){
    var email = $('#email').val();
    $('#login').val(email);
}
