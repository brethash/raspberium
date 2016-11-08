"use strict";

$(function(){
    // Right sidebar
    $('form#configuration input').change(function(){
        var $saving = $('#saving');
        var $saveImage = $saving.find('img');
        var $saveText = $saving.find('span');
        $saving.show();
        $saveImage.show();

        $.get({
            url: '/configuration/update',
            data: $('form#configuration').serialize(),
            success: function() {
                $saveText.html('Saved.');
            },
            failure: function() {
                $saveText.html('Save unsuccessful.');
            }
        });

        $saveText.show();

        setTimeout(function(){
            $saveText.hide();
            $saveImage.hide();
        },3000);
    });

    // System commands
    $('.system-command').click(function(e){
        e.preventDefault();
        $.get({
            url: '/system/command/' + $(this).data('command'),
            success: function(data){
                alert(data);
            },
            failure: function(){
                alert('System did not respond. Bummer.');
            }
        });
    });
});