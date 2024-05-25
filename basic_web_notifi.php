<html>
    <title>Basic Web Notification</title>
    <body>
        <h2>Hello friends this is basic web notification.</h2>
        <!--Do you can add model or Dialog Or Web Alert here-->
        <button id="retryButton" style="display: none;">Retry Permission Request</button>
    </body>

    <script type="text/javascript">
         requestNotificationPermission();
        function requestNotificationPermission() {
            /*Check if the browser supports notifications*/
            if ('Notification' in window) {
                /*Request permission to show notifications*/
                Notification.requestPermission().then(function(permission) {
                    if (permission === 'granted') {
                        /*Permission granted, show a notification*/
                        document.getElementById('retryButton').style.display = 'none';

                        var notification = new Notification('Notification Permission Granted This Title', {
                            body: 'Thank you for allowing notifications! This Body',
                            icon: 'https://avatars.githubusercontent.com/u/73414070?v=4', // optional icon
                            image: 'https://avatars.githubusercontent.com/u/73414070?v=4', // optional image
                            /*Specify the click action here*/
                            data:{
                                url: 'https://github.com/AkalankaKaushalya' // Example URL to open when the notification is clicked
                             }
                        });

                         //click event on the notification
                         notification.addEventListener('click', function(event) {
                             // Access the URL from the data attribute
                             var url = event.target.data.url;
                             window.open(url);
                         });

                    } else if (permission === 'denied') {
                        // Permission denied, show retry button
                        document.getElementById('retryButton').style.display = 'inline';
                        alert('Notification permission denied.');
                    } else {
                        document.getElementById('retryButton').style.display = 'inline';
                        alert('Notification permission dismissed.');
                    }
                }).catch(function(error) {
                    document.getElementById('retryButton').style.display = 'inline';
                    console.error('Notification permission request error:', error);
                });
            } else {
                document.getElementById('retryButton').style.display = 'inline';
                alert('This browser does not support notifications.');
            }
        }

        document.getElementById('retryButton').addEventListener('click', requestNotificationPermission);
    </script>
</html>
