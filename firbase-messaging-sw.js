//This file add on your web hosting Root path
//Add Example: C:/xampp/htdocs/firbase-messaging-sw.js OR Real Domain Path https://example.com/firbase-messaging-sw.js

importScripts('https://www.gstatic.com/firebasejs/9.19.1/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.19.1/firebase-messaging-compat.js');

const firebaseConfig = {
    apiKey: "xxxxxxxxxxxxx",
    authDomain: "unitycodes-xxxxx.firebaseapp.com",
    databaseURL: "https://unitycodes-xxxxx-default-rtdb.firebaseio.com",
    projectId: "unitycodes-xxxxx",
    storageBucket: "unitycodes-xxxx.appspot.com",
    messagingSenderId: "xxxxxxxxxxxxx",
    appId: "1:xxxxxxxxxxxxx:web:xxxxxxxxxxxxx",
    measurementId: "x-xxxxxxxxxxx"
};

firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

messaging.onBackgroundMessage(function (payload) {

    console.log('Received background message ', payload);

    const notificationTitle = payload.notification.title || payload.data.title;
    const notificationOptions = {
        body: payload.notification.body || payload.data.body,
        icon: payload.notification.icon || payload.data.icon,
        image: payload.notification.image || payload.data.image,
    };

    self.registration.showNotification(notificationTitle, notificationOptions);

    self.addEventListener('notificationclick', function (event) {
        const clickedNotification = event.notification;
        clickedNotification.close();
        const url = payload.notification.click_action || payload.data.click_action;
        event.waitUntil(
            clients.openWindow(url)
        );
    });

});
