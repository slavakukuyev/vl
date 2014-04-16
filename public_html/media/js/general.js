$(function() {
    
    $("a[name='actorsLink']").on("click", function(){
        $('#actorForm').find('input[name="actorid"]').val($(this).attr('actorid'));
        $('#actorForm').find('#actorsubmit').click();
    });
    
    $("a[name='fireUploadForm']").on("click", function(){        
        $('#uploadForm').find('#uploadsubmit').click();
    });
          
    
});