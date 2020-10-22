$(document).ready(function(){
    //menu dropboxes
    for(let i = 0;i < $(".menu__dropbox").length;i++){
        $(".menu__dropbox").eq(i).mouseenter(function(){                    
            var drop_content = $(this).children(".menu__drop-content");
            var childs_count = drop_content.children(".menu__item").length;
            var childs_h = drop_content.children(".menu__item").innerHeight();
            drop_content.css("height",childs_count*childs_h);
            $(this).children(".menu__dropbtn-box").addClass("menu__dropbtn-box--focused");   
            
        }); 
         
        $(".menu__dropbox").eq(i).mouseleave(function(){           
            var drop_content = $(this).children(".menu__drop-content");
            drop_content.css("height","0");
            $(this).children(".menu__dropbtn-box").removeClass("menu__dropbtn-box--focused");  
        });           
    }

    // Set a cookie that holds the scroll position.
    $("input[name = 'favoriteStar']").click(function() {
            sessionStorage.setItem("scrollX", $(window).scrollLeft());
            sessionStorage.setItem("scrollY", $(window).scrollTop());

    });
});