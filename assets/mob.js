$(window).bind("load resize", function () {
    if ($(this).width() < 768) {
        $(".sidebar-collapse").addClass("collapse");
        $("#navbrand").remove();
    } else {
        $(".sidebar-collapse").removeClass("collapse");
        $(".sidebar-collapse").removeAttr("style");
        $("#navbrand").add();
    }
})