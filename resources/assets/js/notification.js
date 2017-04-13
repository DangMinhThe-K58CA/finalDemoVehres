$(document).on('click', 'a[name="notifications"]', function (event) {
    var notiId = $(event.currentTarget).closest('li').data('notif-id');
    var token = $('meta[name="csrf-token"]').attr('content');
    var numberNoti = $('.number').text();
    numberNoti = parseInt(numberNoti) - 1;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.post('/', function () {
        console.log('abc');
    });

    // $.ajax({
    //     url: laroute.action('App\Http\Controllers\NotificationController@update', {'notification' : notiId}),
    //     method: 'POST',
    //     data: {
    //         '_method': 'PUT'
    //     }
    // });
});
