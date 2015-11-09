/**
 * Created by Colls on 29.08.15.
 */
$(document).ready(function(){
    /**
     * finds hidden elements for deleting dialogs
     */
    $('.dialog').hover(function() {
        $(this).find('a:nth-of-type(3)').removeClass('hidden');
    }, function()
    {
        $(this).find('a:nth-of-type(3)').addClass('hidden');
    });
});
