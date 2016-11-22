$(function(){
    $('.button-box button').click(function(e){
        e.preventDefault();
        $this = $(this);
        $alertMessage = $('.alert-box h2');
        $.get({
            url: '/relay/' + $this.data('device') + '/' + $this.data('state'),
            success: function(data){
                $alertMessage.addClass('success').removeClass('failure').slideDown(500).html(data);
                $this.parent('.btn-group').children().each(function(){
                    console.log($(this).attr('id'))
                    $(this).removeClass('btn-primary');
                });
                $this.addClass('btn-primary');
            },
            failure: function(data){
                $alertMessage.addClass('failure').removeClass('success').slideDown(500).html(data);
            }
        });

        setTimeout(function(){
            $alertMessage.slideUp(500);
        },3000);
    });
});