require('./bootstrap');

import Echo from "laravel-echo";
window.Pusher = require('pusher-js');

window.Vue = require('vue');
var timeago = require("timeago.js");

Vue.component('example', require('./components/Example.vue'));
Vue.component('rincian-pemesanan', require('./components/RincianPemesanan.vue'));

const app = new Vue({
    el: '#app'
});

var notifications = [];

const NOTIFICATION_TYPES = {
    newOrder: 'App\\Notifications\\NewOrder' ,
    barangRunOut : 'App\\Notifications\\BarangRunOut'
};

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '382e97a4644ecbfeafd6',
    cluster: 'ap1',
    encrypted: true
});

$(document).ready(function() {
    // check if there's a logged in user
    if(Laravel.userId) {	
    	Pusher.logToConsole = true;
        $.get('/notifications', function (data) {
            addNotifications(data, "#notifications");
        });
        // listen to notifications from pusher
        window.Echo.private(`App.User.${Laravel.userId}`)
            .notification((notification) => {
                addNotifications([notification], '#notifications');

            });
    }
});

function addNotifications(newNotifications, target) {
    notifications = _.concat(notifications, newNotifications);
    // show only last 5 notifications
    notifications.slice(0, 5);
    showNotifications(notifications, target);
}

function showNotifications(notifications, target) {
    if(notifications.length) {
        var htmlElements = notifications.map(function (notification) {
            return makeNotification(notification);
        });
        $(target + 'Menu').html(htmlElements.join(''));
        $(target).addClass('has-notifications');
    } else {
        $(target + 'Menu').html('<li class="dropdown-header">No notifications</li>');
        $(target).removeClass('has-notifications');
    }
}

// Make a single notification string
function makeNotification(notification) {
    var to = routeNotification(notification);
    var notificationText = makeNotificationText(notification);
    alertify.success(notificationText);
    return '<li><a href="' + to + '">' + notificationText + '</a></li>';
}

// get the notification route based on it's type
function routeNotification(notification) {
    var to = `?read=${notification.id}`;
    if(notification.type === NOTIFICATION_TYPES.barangRunOut) {
        to = '/admin/barang' + to;
    } else if(notification.type === NOTIFICATION_TYPES.newOrder) {
        const postId = notification.data.id;
        to = `admin/pemesanan/${postId}` + to;
    }
    return '/' + to;
}

// get the notification text based on it's type
function makeNotificationText(notification) {
    var text = '';
    if(notification.type === NOTIFICATION_TYPES.barangRunOut) {
        const name = notification.data.barang;
        const date = timeago().format(notification.created_at, 'id_ID');
        text += `Perhatikan Stok <strong>${name}</strong> (${date}) `;
    } else if(notification.type === NOTIFICATION_TYPES.newOrder) {
        const name = notification.data.cabang;
        const date = timeago().format(notification.created_at, 'id_ID');

        text += `<strong>${name}</strong> membuat pesanan baru (${date})` ;
    }
    return text;
}