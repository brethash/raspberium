$(function(){
    $('.button-box button').click(function(e){
        e.preventDefault();
        $this = $(this);
        $.get({
            url: '/relay/' + $this.data('device') + '/' + $this.data('state'),
            success: function(data){
                alert(data);
            },
            failure: function(data){
                alert('failure');
            }
        });
    });
});