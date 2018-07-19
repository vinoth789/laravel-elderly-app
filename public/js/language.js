//$(document).ready(function (){

//$("#changeLanguage").change(function (){
function changeLanguage(lang){

    
    var token, url, locale;
    token = $('input[name=_token]').val();

    locale = lang;

    //url = "{{route('change.language')}}";
    url = "/language";

    $.ajax({
        url: url,
        data: {
            _token: token,
            locale: locale
        },
        method: 'POST',
        datatype: 'json',
        success: function (data) {
            
        },
        error: function (data) {
            
        },
        beforeSend: function (data) {
            
        },
        complete: function (data) {
            window.location.reload(true);
        },
    });

}
//}); 
//});