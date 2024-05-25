//This file add on your web hosting Root path
//Add Example: C:/xampp/htdocs/firbase-messaging-sw.js OR Real Domain Path https://example.com/firbase-messaging-sw.js

importScripts('https://www.gstatic.com/firebasejs/9.19.1/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.19.1/firebase-messaging-compat.js');

const firebaseConfig = {
    apiKey: "AIzaSyCgHUckyiJJ5j4veZtMKwTgxe1zRioiJaQ",
    authDomain: "unitycodes-6cb70.firebaseapp.com",
    databaseURL: "https://unitycodes-6cb70-default-rtdb.firebaseio.com",
    projectId: "unitycodes-6cb70",
    storageBucket: "unitycodes-6cb70.appspot.com",
    messagingSenderId: "634847251234",
    appId: "1:634847251234:web:0758f197b0a3de532e737b",
    measurementId: "G-V24PKP0RLV"
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
