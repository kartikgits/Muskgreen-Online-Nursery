//for toggling color of topBar
if (screen.width > 768){
    $(window).scroll(function(){
	       $('.topBar').toggleClass('scrolled', $(this).scrollTop() > 50);
            
            //changing logo
            if ($(this).scrollTop() > 49.99) { 
                $('.navbar .navbar-brand img').attr('src','extras/musklogowhite224.png');
            }
            if ($(this).scrollTop() < 50) { 
                $('.navbar .navbar-brand img').attr('src','extras/musklogo224.png');
            }
    });
}