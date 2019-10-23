function getCartVariables(){
   $.post( "formsProcess.php", { get_cart_subtotal: "true" }, function(result){
      var subTotal=+parseFloat(result).toFixed(2);
      var total=0;
      if (subTotal < 1) {
         $("#cartSubtotal").html("&#8377;"+subTotal);
         $("#cartDeliveryCharges").html("&#8377;"+0.00);
         total=subTotal+0.0;
      }
      else if (subTotal<=599) {
         $("#cartSubtotal").html("&#8377;"+subTotal);
         $("#cartDeliveryCharges").html("&#8377;"+40.00);
         total=subTotal+40.0;
      }else{
         $("#cartSubtotal").html("&#8377;"+subTotal);
         $("#cartDeliveryCharges").html("<span style=\"color: #509534;\">FREE</span>");
         total=subTotal;
      }
      $('#totalCartCharges').html("&#8377;"+total);
   });
}

function deleteProduct(productId) {
   $.post("formsProcess.php", {delete_cart_product:"true", product_id: productId}).done(function(){
      window.location.reload();
   });
}

function triggerQuantityChange(productId, selectedQuantity) {
   var selectedQuantityValue = selectedQuantity.value;
   $.post("formsProcess.php", {quantity_change:"true", product_id: productId, selected_quantity: selectedQuantityValue});
   getCartVariables();
}

$(document).ready(function() {
   $('.table-responsive-stack').find("th").each(function (i) {
      $('.table-responsive-stack td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">'+ $(this).text() + ':</span> ');
      $('.table-responsive-stack-thead').hide();
   });
   
   $( '.table-responsive-stack' ).each(function() {
     var thCount = $(this).find("th").length; 
      var rowGrow = 100 / thCount + '%';
      //console.log(rowGrow);
      $(this).find("th, td").css('flex-basis', rowGrow);   
   });
   
   function flexTable(){
      if ($(window).width() < 768) {
      $(".table-responsive-stack").each(function (i) {
         $(this).find(".table-responsive-stack-thead").show();
         $(this).find('thead').hide();
      });
      // window is less than 768px   
      } else {
      $(".table-responsive-stack").each(function (i) {
         $(this).find(".table-responsive-stack-thead").hide();
         $(this).find('thead').show();
      });
      }
   // flextable   
   }      
    
   flexTable(); 
   window.onresize = function(event) {
       flexTable();
   };

   getCartVariables();

   function getNonLoggedCart() {
      var rslt="";
      var productsInCart=[];
      if (typeof $.cookie('cartProductsCookie') === 'undefined'){
       //no cookie
       // set empty cart
       rslt="";
       document.getElementById("nonLoggedUserCart").innerHTML = rslt;
      } else {
       //have cookie
       productsInCart = JSON.parse($.cookie('cartProductsCookie'));
       if (productsInCart.length>0) {
         $.post("formsProcess.php", {cookie_get_cart: "true", 'productsGetCart': JSON.stringify(productsInCart)}, function(result){
            rslt=result;
         })
         .done(function(){
           // update div box
           document.getElementById("nonLoggedUserCart").innerHTML = rslt;
         });
       } else{
         rslt="";
         document.getElementById("nonLoggedUserCart").innerHTML = rslt;
       }
      }
   }

   getNonLoggedCart();
});