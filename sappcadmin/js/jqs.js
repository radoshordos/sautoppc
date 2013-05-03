$(document).ready(function() {

    $('#checkAllAuto').click(function(){
        $("INPUT[type='checkbox']").attr('checked', $('#checkAllAuto').is(':checked'));
    })

    $("title").append(" | ")
    $("title").append($("h3").text());
    
    $("#part-x2").append($("h3").text());    

    $("#effect").hide();

    $("#login").hide();
    $("#login").show("slow");

    jQuery('ul.navigation li a').mouseover(function () {
        jQuery(this).animate({
            paddingLeft: "7px"
        }, 100 );
    });

    jQuery('ul.navigation li a').mouseout(function () {
        jQuery(this).animate({
            paddingLeft: "4px"
        }, 100 );
    });

    $(function() {
        $("#tabs").tabs({
            collapsible: true
        });
    });
    
    $(function() {
        $( "#radio" ).buttonset();
    });
    /*

    $(function() {
        $( "table a").button()
        .click(function( event ) {
            event.preventDefault();
        });
    });
*/
});



$(function() {
    // run the currently selected effect
    function runEffect() {
        // get effect type from
        var selectedEffect = $( "#effectTypes" ).val();

        // most effect types need no options passed by default
        var options = {};
        // some effects have required parameters
        if ( selectedEffect === "scale" ) {
            options = {
                percent: 0
            };
        } else if ( selectedEffect === "size" ) {
            options = {
                to: {
                    width: 200,
                    height: 60
                }
            };
        }

        $( "#effect" ).toggle( selectedEffect, options, 500 );
    };

    // set effect from select menu value
    $( "#button" ).click(function() {
        runEffect();
        return false;
    });

});


window.addEvent('domready', function(){
    $$('.gallery a.ceraBox').cerabox();
});