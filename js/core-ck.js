$(document).ready(function() {
    function t(e) {
        e.matches ? $("ul.navbar-nav li").addClass("hovernav") : $("ul.navbar-nav li").removeClass("hovernav");
    }
    var e = window.matchMedia("(min-width: 768px)");
    e.matches ? $("ul.navbar-nav li").addClass("hovernav") : $("ul.navbar-nav li").removeClass("hovernav");
    if (matchMedia) {
        var e = window.matchMedia("(min-width: 768px)");
        e.addListener(t);
        t(e);
    }
});