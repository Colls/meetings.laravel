/**
 * Created by Colls on 29.08.15.
 */
$(document).ready(function(){
    /**
     * image viewer
     */
    $('.thumbnail').click(function(){
        $('.modal-body').empty();
//        var title = $(this).parent('a').attr("title");
//        $('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#myModal').modal({show:true});
    });
    /**
     * open all outer links in new window
     */
    $('a').each(function() {
        var a = new RegExp('/' + window.location.host + '/');
        if(!a.test(this.href)) {
            $(this).click(function(event) {
                event.preventDefault();
                event.stopPropagation();
                window.open(this.href, '_blank');
            });
        }
    });
    /**
     * confirm of deleting selected elements
     */
    if ($('#action_flag').text() === 'Удалить' ) {
        $('input[type=submit]').click(function(e) {
            if (!confirm('Вы действительно хотите удалить выбранные элементы?')) {
                e.preventDefault();
            }
        });
    }
    $( "#birth_date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });

    $('.dialog').hover(function() {
        $(this).find('a:nth-of-type(3)').removeClass('hidden');
    }, function()
    {
        $(this).find('a:nth-of-type(3)').addClass('hidden');
    });
});
