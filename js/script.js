$(document).ready(function(){
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
    
    for(let i = 0;i < $(".menu__dropbox").length;i++){
        $(".menu__dropbox").eq(i).mouseenter(function(){           
            var drop_content = $(".menu__dropbox").eq(i).children(".menu__drop-content");
            var childs_count = drop_content.children(".menu__item").length;
            var childs_h = drop_content.children(".menu__item").innerHeight();
            drop_content.css("height",childs_count*childs_h);
        }); 
         
        $(".menu__dropbox").eq(i).mouseleave(function(){           
            var drop_content = $(".menu__dropbox").eq(i).children(".menu__drop-content");
            drop_content.css("height","0");
        });           
    }
});