<!DOCTYPE html>  
<html lang="en">  
  <head>  
    <!-- Below is the initialization snippet for my Firebase project. It will vary for each project -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-firestore.js"></script>
    <script>
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
      firebase.initializeApp(firebaseConfig);
    </script>
  </head>
  <body>
    <script>
      function getQueryStringValue (key) { 
        return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
      }

      function checkOrInsertUser(userId, userPno) {
          if (userId != null) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
            $.ajax({
              type: 'POST',
              url: 'checkUser.php',
              data: {
                'userId': userId,
                'userPno': userPno
              },
              success: function(msg){
                //Redirect user to where he started the login process
                var urlQuery = getQueryStringValue("userTo");

                //Submit cart's cookie data to database
                var productsInCart=[];
                if (typeof $.cookie('cartProductsCookie') === 'undefined'){
                 //no cookie
                } else {
                 //have cookie
                 productsInCart = JSON.parse($.cookie('cartProductsCookie'));
                }

                if (productsInCart.length>0) {
                  $.post("formsProcess.php", {cookie_to_cart: "true", 'productsInCart': JSON.stringify(productsInCart)}, function(result) {
                      alert(result);
                  })
                  .always(function(){
                    // Redirect user once finished
                    window.location.href = urlQuery;
                  });
                }else{
                    window.location.href = urlQuery;
                }
              }
            });
          } else {
            //else the userid is null
            
          }
      }
      // Track the UID of the current user.  
      var currentUid = null;  
      firebase.auth().onAuthStateChanged(function(user) {  
      if (user && user.uid != currentUid) {  
        currentUid = user.uid;
        //currentPno = user.phoneNumber;
        checkOrInsertUser(user.uid, user.phoneNumber);
      } else {  
          // Sign out operation. Reset the current user UID.
          currentUid = null;
      }
      });
    </script>
  </body>
</html>