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

    $('#kioskMode').change(function(){
        var $saving = $('#saving');
        var $saveImage = $saving.find('img');
        var $saveText = $saving.find('span');
        $saving.show();
        $saveImage.show();

        var status = "disable";

        if ($('#kioskMode').is(':checked')) {
            status = "enable";
        }
        $.get({
            url: '/kiosk/'+status,
            success: function() {
                location.href = location.href.split("?")[0];
            },
            failure: function() {
                $saveText.html('Save unsuccessful.');
            }
        });
    });

    $("[data-enable='expandOnHover']").on('click', function () {
        $(this).attr('disabled', true);
        AdminLTE.pushMenu.expandOnHover();
        if (!$('body').hasClass('sidebar-collapse'))
            $("[data-layout='sidebar-collapse']").click();
    });
});