$('.owl-carousel').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
    items: 4,
    autoplay:true,
    autoplayTimeout:1500,
    autoplayHoverPause:true,
    responsive:{
        0:{
             items:1
         },
         574:{
             items:2
         },
         600:{
             items:2
         },
         800:{
             items:3
         },
         1000:{
             items:4
         },
      
     }
    
})