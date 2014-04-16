$(function() {
    
    //copies add selectbox
    $( "#addcopies" ).change(function() {
        var copies=parseInt($('#copies').attr('default'));
        var add=parseInt(this.value);
        $('#copies').val(copies+add);
    });
    ///////////////////////////////////////////
        
        
    //multiple selectBoxes
    $( "#categoriesSelect" )
    .change(function () {
        var str = " | ";
        var str2=""
        $( "#categoriesSelect option:selected" ).each(function() {
            str += $( this ).html() + " | ";
            str2 += $(this).val()+", ";
        });
        $("#categoriesDiv").html(str);
        $('#categories').val(str2.slice(0,-2));
    })
    .change();        
        
    $( "#actorsSelect" )
    .change(function () {
        var str = " | ";
        var str2="";
        $( "#actorsSelect option:selected" ).each(function() {
            str += $(this).html()+" | ";
            str2 += $(this).val()+", ";
        });
        $("#actorsDiv").html(str);
        $('#actors').val(str2.slice(0,-2));
    })
    .change();        
    / ////////////////////////////////////////////////////////////
 
 
    //changeid  select
    $('#listMovies').on('change', function() {
 
        $('#changeidForm').find('#newid').val(this.value);
        $('#changeidForm').find('#changeid').click();
    }); 
////////////////////////////////////////////////////////////////////////


        
});