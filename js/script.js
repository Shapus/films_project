$(document).ready(function(){
    //favorites titles
    for (let i = 0; i < $(".favorites__item").length; i++) {       
        $(".favorites__item").eq(i).mouseenter(function(){
            var child = $(".favorites__item").eq(i).children("div");
            child.addClass("favorites__title--focused");
            child.css("height", "max-content");
            var margin_top = $(".favorites__item").eq(i).innerHeight()/2 + child.innerHeight()/2;
            child.css("height", 0);
            child.css("top", -margin_top);
        });  
        $(".favorites__item").eq(i).mouseleave(function(){
            var child = $(".favorites__item").eq(i).children("div");
            $(".favorites__item").eq(i).children("div").removeClass("favorites__title--focused");
        });        
    }
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


});