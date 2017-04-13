
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */


/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

// window.Vue = require('vue');
// require('vue-resource');

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

// Vue.http.interceptors.push((request, next) => {
//     request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
//
//     next();
// });

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo";

window.Pusher = require('pusher-js');

Pusher.logToConsole = true;
function diffForHumans(unixTime, ms) {
    // Adjust for milliseconds
    ms = ms || false;
    unixTime = (ms) ? unixTime * 1000 : unixTime;

    var d = new Date();
    var diff = Math.abs(d.getTime() - unixTime);
    var intervals = {
        y: diff / (365 * 24 * 60 * 60 * 1 * 1000),
        m: diff / (30.5 * 24 * 60 * 60 * 1 * 1000),
        d: diff / (24 * 60 * 60 * 1 * 1000),
        h: diff / (60 * 60 * 1 * 1000),
        i: diff / (60 * 1 * 1000),
        s: diff / (1 * 1000),
    }

    Object.keys(intervals).map(function(value, index) {
        return intervals[value] = Math.floor(intervals[value]);
    })

    var unit;
    var count;

    switch (true) {
        case intervals.y > 0:
            count = intervals.y;
            unit = 'year';
            break;
        case intervals.m > 0:
            count = intervals.m;
            unit = 'month';
            break;
        case intervals.d > 0:
            count = intervals.d;
            unit = 'day';
            break;
        case intervals.h > 0:
            count = intervals.h;
            unit = 'hour';
            break;
        case intervals.i > 0:
            count = intervals.i;
            unit = 'minute';
            break;
        default:
            count = intervals.s;
            unit = 'second';
            break;
    }

    if(count > 1) {
        unit = unit + 's';
    }

    if(count === 0) {
        return 'now';
    }

    return count + ' ' + unit + ((unixTime > d.getTime()) ? ' from now' : ' ago');
}

var pusher = new Pusher('ef66395c1b8129f91e7b', {
    cluster: 'ap1',
    encrypted: false
});

var channel = pusher.subscribe('notification');
channel.bind('App\\Events\\EditGarageEvent', function(data) {
    var current_user_id = $('.current_user_id').val();
    if(data.user.id == current_user_id)
    {
        var numberNoti = $('.number').text();
        numberNoti = parseInt(numberNoti) + 1;
        $('.number').text(numberNoti);
        var html = "<li class='list-group-item' style='background-color: #D1F4E6;' data-notif-id='" + data.notiId + "'><a href='"+data.url+"' name='notifications'><div class='user-new'><p>"+data.message+"</p>";
        html += "<span>"+diffForHumans(new Date(data.created_at.date).getTime())+"</span>";
        html += "</div><div class='user-new-left'>"
        html += "<i class='fa fa-info'></i></div>"
        html += "<div class='clearfix'></div></a></li>"
        $(".menu1").prepend(html);
    }
});

var channel = pusher.subscribe('partner-notification');
channel.bind('App\\Events\\UnActiveGarageEvent', function(data) {
    var current_user_id = $('.current_user_id').val();
    if(data.user.id == current_user_id)
    {
        var numberNoti = $('.number').text();
        numberNoti = parseInt(numberNoti) + 1;
        $('.number').text(numberNoti);
        var html = "<li class='list-group-item' style='background-color: #D1F4E6;' data-notif-id='" + data.notiId + "'><a href='"+data.url+"' name='notifications'><div class='user-new'><p>"+data.message+"</p>";
        html += "<span>"+diffForHumans(new Date(data.created_at.date).getTime())+"</span>";
        html += "</div><div class='user-new-left'>"
        html += "<i class='fa fa-info'></i></div>"
        html += "<div class='clearfix'></div></a></li>"
        $(".menu1").prepend(html);
    }
});
