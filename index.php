<!DOCTYPE html>
<html>
<head>
    <title>Firebase Web Popup Notification</title>
    <script src="https://www.gstatic.com/firebasejs/9.19.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.19.1/firebase-messaging-compat.js"></script>
</head>
<body>


    <div class="container">
        <div>Notification data will be received here if the app is open and focused.</div>
        <div class="message" style="min-height: 80px;"></div>
        <div>Device Token: <span id="device-token"></span></div>
    </div>


    <script type="text/javascript">
        // Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
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

        // Initialize Firebase
        const app = firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();


        //Get the device token
        messaging.getToken({ vapidKey: "BIVyqy3-F88n55runVlCyJOIg3rSPt0blFmsWUfnO6r2R6VmbL7MCNffxAyrPJJhSPjFmO_YUa26TvQaOCOv3Uw" })
            .then((currentToken) => {
                if (currentToken) {
                    console.log('Device token:', currentToken);
                    document.getElementById('device-token').textContent = currentToken;
                    sendTokenToServer(currentToken);
                } else {
                    setTokenSentToServer(false);
                    console.log('No registration token available. Request permission to generate one.');
                }
            })
            .catch((err) => {
                console.log('An error occurred while retrieving token. ', err);
                sendTokenToServer(false);
            });


        // incoming messages
        messaging.onMessage((payload) => {
            console.log('Message received ', payload);
            const messagesElement = document.querySelector('.message');
            const dataHeaderElement = document.createElement('h5');
            const dataElement = document.createElement('pre');
            dataElement.style = "overflow-x: hidden;";
            dataHeaderElement.textContent = "Message Received:";
            dataElement.textContent = JSON.stringify(payload, null, 2);
            messagesElement.appendChild(dataHeaderElement);
            messagesElement.appendChild(dataElement);
        });

        function sendTokenToServer(currentToken) {
            if (!isTokenSentToServer()) {
                console.log('Sending token to server...');
                setTokenSentToServer(true);
            }else {
                console.log('Token already sent to server so skipping.');
            }
        }

        function isTokenSentToServer() {
            return window.localStorage.getItem('sentToServer') === '1';
        }

        function setTokenSentToServer(sentToServer) {
            window.localStorage.setItem('sentToServer', sentToServer ? '1' : '0');
        }
    </script>


</body>
</html>
