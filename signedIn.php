<!DOCTYPE html>  
<html lang="en">  
  <head>  
    <title>EasyAuth</title>
    <meta charset="UTF-8">  
    <!-- Below is the initialization snippet for my Firebase project. It will vary for each project -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-firestore.js"></script>
    <script>
      // Your web app's Firebase configuration
      var firebaseConfig = {
        apiKey: "AIzaSyDpIJtUUar3xD1y8en641vQx988l4O1VPs",
        authDomain: "muskgreen-d2fc5.firebaseapp.com",
        databaseURL: "https://muskgreen-d2fc5.firebaseio.com",
        projectId: "muskgreen-d2fc5",
        storageBucket: "muskgreen-d2fc5.appspot.com",
        messagingSenderId: "890786383867",
        appId: "1:890786383867:web:be3ab88ff67c08c9b56d5e",
        measurementId: "G-F4CV93K6YZ"
      };

      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript" src="js/buttonActions.js"></script>
  </head>  
  <body>  
    <!-- A simple example script to add text to the page that displays the user's Display Name and Email -->  
    <script>  
      // Track the UID of the current user.  
      var currentUid = null;  
      firebase.auth().onAuthStateChanged(function(user) {  
      if (user && user.uid != currentUid) {  
       currentUid = user.uid;
       document.body.innerHTML = '<h1> Congrats ' + user.uid + ', you are done! </h1> <h2 id="domLoads"> Now get back to what you love building. </h2> <h2> Need to verify your email address or reset your password? Firebase can handle all of that for you using the phone you provided: ' + user.phoneNumber + '. </h2>';
      } else {  
          // Sign out operation. Reset the current user UID.
          currentUid = null;
          console.log("no user signed in");
      }
      });
    </script>
    <h1>Congrats you're done! Now get back to what you love building.</h1>
    <script type="text/javascript">
        // Check if the page has loaded completely  
        function getQueryStringValue (key) { 
          return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));  
        }                                    
        $(document).ready( function() {
            var urlQuery = getQueryStringValue("userTo");
            window.location.href = urlQuery;
        }); 
    </script>
  </body>
</html>