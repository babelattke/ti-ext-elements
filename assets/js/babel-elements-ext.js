$(document).ready(function(){

    $('.element-categories').slick({ 
        "dots":true,
        "slidesToShow":3,
        "slidesToScroll":1,
        "infinite":true,
        "responsive":[
            {
                "breakpoint":991,
                "settings":{
                    "slidesToShow":2,
                    "slidesToScroll":1
                }
            },
            {
                "breakpoint":690,
                "settings":{
                    "slidesToShow":1,
                    "slidesToScroll":1
                }
            }
        ]      
    });

    /* magnificPopup img view */
    $('.popup-image').magnificPopup({
        type: 'image',
        gallery: {
        enabled: true
        }
    });
    

    /* magnificPopup video view */
    $('.popup-video').magnificPopup({
        type: 'iframe'
    });
});


