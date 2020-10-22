if(sessionStorage.getItem("scrollX") !== null && sessionStorage.getItem("scrollY") !== null){
	$(window).scrollLeft(sessionStorage.getItem("scrollX"));
	$(window).scrollTop(sessionStorage.getItem("scrollY"));
	sessionStorage.setItem("scrollX", 0);
    sessionStorage.setItem("scrollY", 0);
}
if(sessionStorage.getItem("scrollX--static") !== null && sessionStorage.getItem("scrollY--static") !== null){
	$(window).scrollLeft(sessionStorage.getItem("scrollX--static"));
	$(window).scrollTop(sessionStorage.getItem("scrollY--static"));
}