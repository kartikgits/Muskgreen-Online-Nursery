<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >

    <title>MuskGreen - Digital Nursery and Organic Products Store - Login or SignUp</title>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js"></script>

    <!-- https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-analytics.js"></script>

    <!-- Firebase auth -->
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
      firebase.analytics();
    </script>

    <script src="https://cdn.firebase.com/libs/firebaseui/4.2.0/firebaseui.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/4.2.0/firebaseui.css" />

    <script type="text/javascript">
    var urlQuery = window.location.search;
    urlQuery = urlQuery.replace("?", '');
    var uiConfig = {  
       signInSuccessUrl: 'signedIn.php?'+urlQuery,  
       signInOptions: [
      {
        provider: firebase.auth.PhoneAuthProvider.PROVIDER_ID,
        recaptchaParameters: {
          type: 'image', // 'audio'
          size: 'invisible', // 'invisible' or 'compact'
          badge: 'inline' //' bottomright' or 'inline' applies to invisible.
        },
        defaultCountry: 'IN'
      }
      ],  
       // Terms of service url can be specified and will show up in the widget.  
       tosUrl: '<your-tos-url>'  
      };  
      // Initialize the FirebaseUI Widget using Firebase.  
      var ui = new firebaseui.auth.AuthUI(firebase.auth());  
      // The start method will wait until the DOM is loaded.  
      ui.start('#firebaseui-auth-container', uiConfig);  
    </script>

    <!-- Our CSS -->
    <style type="text/css">
      html,
      body {
        margin: 0;
        padding: 0;
		background: -webkit-linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
        background: linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
      }

      .background {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        z-index: 0;
      }
    </style>

    <script type="text/javascript">
      window.onload = function() {
        Particles.init({
          selector: '.background'
        });
      };
    </script>
    

  </head>
  <body>
    <!-- The surrounding HTML is left untouched by FirebaseUI.
         Your app may use that space for branding, controls and other customizations.-->
    <div style="display: inline; color: #fff;" class="container align-middle text-center">
      <h3>
        MuskGreen.live <small style="color: #fff !important;" class="text-muted">Login or SignUp</small>
      </h3>
      <div id="firebaseui-auth-container"></div>
    </div>
    <canvas class="background"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js"></script>
    <script type="text/javascript">
      var particles = Particles.init({
        // normal options
          selector: 
        '.background'
        ,
          maxParticles: 
        60
        ,
          connectParticles:
        true
        ,
          color:
        "#ffffff"
        ,
          
        // options for breakpoints
          responsive: [
            {
              breakpoint: 
        768
        ,
              options: {
                maxParticles: 
        40
        ,
                color: 
        '#48F2E3'
        ,
                connectParticles: 
        false
              }
            }, {
              breakpoint: 
        425
        ,
              options: {
                maxParticles: 
        20
        ,
                connectParticles: 
        true
              }
            }, {
              breakpoint: 
        320
        ,
              options: {
                maxParticles: 
        10
         
        // disables particles.js
              }
            }
          ]
      });
    </script>
  </body>
</html>