$(document).ready(function(){
    $("body").on('click', '.pagination > li > a', function(){
        var page = $(this).attr('href').split('page=')[1];
        getUsers(page);
        return false;
    });
});

function getUsers(page)
{
    $.ajax({
//        url: window.location.pathname,
//        data: 'page=' + page,
        url : '?page=' + page,
        dataType: 'json',
        success: function(data)
        {
            $('.people').html(data);
            window.location.hash = page;
        },
        error: function()
        {
            alert('Some error during request');
        }
    });
}