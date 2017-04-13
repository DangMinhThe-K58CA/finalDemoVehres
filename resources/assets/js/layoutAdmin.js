require('./bootstrap');

$(document).ready(function () {
    $('#side-menu').metisMenu();
    //Loads the correct sidebar on window load,
    //collapses the sidebar on window resize.
    // Sets the min-height of #page-wrapper to window size
    $(function() {
        $(window).bind("load resize", function() {
            topOffset = 50;
            width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
            if (width < 768) {
                $('div.navbar-collapse').addClass('collapse');
                topOffset = 100; // 2-row-menu
            } else {
                $('div.navbar-collapse').removeClass('collapse');
            }

            height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
            height = height - topOffset;
            if (height < 1) height = 1;
            if (height > topOffset) {
                $("#page-wrapper").css("min-height", (height) + "px");
            }
        });

        var url = window.location;
        var element = $('ul.nav a').filter(function() {
            return this.href == url || url.href.indexOf(this.href) == 0;
        }).addClass('active').parent().parent().addClass('in').parent();
        if (element.is('li')) {
            element.addClass('active');
        }
    });

    // show activated garage
    $('a[name="showGarageButton"]').click(function(event) {
        var garageId = $(event.currentTarget).data('garage-id');
        $.get('/admin/garages/'+ garageId, function(response) {
            $('#show_activated_garage').html(response);
        });
    });


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
        $.ajax({
            url: laroute.action('App\Http\Controllers\NotificationController@update', {'notification' : notiId}),
            method: 'POST',
            data: {
                '_method': 'PUT'
            }
        });
    });
});


//markasread notification
// $(document).on('click', 'a[name="notifications"]', function (event) {
//     var notiId = $(event.currentTarget).closest('li').data('notif-id');
//     var token = $('meta[name="csrf-token"]').attr('content');
//     var numberNoti = $('.number').text();
//     numberNoti = parseInt(numberNoti) - 1;
//     alert(laroute.action('App\Http\Controllers\NotificationController@update', {'notification' : notiId}));
//     $.ajax({
//         url: laroute.action('NotificationController@update', {'notification' : notiId}),
//         method: 'POST',
//         data: {
//             '_token': token,
//             '_method': 'PUT'
//         },
//     });
// });
