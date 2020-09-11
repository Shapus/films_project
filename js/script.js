$(document).ready(function(){
    for (let i = 0; i < $(".favorites__item").length; i++) {
        $(".favorites__item").eq(i).mouseenter(function(){
            var child = $(".favorites__item").eq(i).children("div");
            child.addClass("favorites__title--focused");
            //alert(child.innerHeight());
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
});