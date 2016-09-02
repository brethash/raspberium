$(function(){
    // Right sidebar
    $('form#configuration input').change(function(){
        $('#saving').show();
        setTimeout(function(){
            $('#saving').hide();
        }, 3000)
    })
});