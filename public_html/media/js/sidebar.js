$(function() {
    
    $(".span3 .dropdown-menu li a").bind("click", function(){               
        $('.btn.dropddown-toggle').html($(this).html());        
    });
    
    $(".span3 .nav.nav-list li").bind("click", function(){               
        $(".span3 .nav.nav-list li.active").removeClass('active');
        $(this).addClass('active');      
    });
    
});