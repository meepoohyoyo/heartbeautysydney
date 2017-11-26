$(function(){
    $('#wrapper .nav.navbar-nav.side-nav li').on('click',function(e){
        $("li.active").removeClass("active");
        $(this).addClass("active");
        // alert("Console");
    })

    var currentLocation = window.location.href;
    var currentMenu = currentLocation.split("/")[currentLocation.split("/").length-1];
    console.log(currentMenu)
    if(currentMenu == 'product' || currentMenu == "producttype")
        $("li#products-group").addClass('active');
    else if(currentMenu == 'report' || currentMenu == "report" || currentMenu == "report")
        $("li#statistic-group").addClass('active');
    else
        $('#wrapper .nav.navbar-nav.side-nav li a[href="'+ currentLocation +'"]').parent().addClass("active");
    
});