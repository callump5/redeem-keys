jQuery('a#logout').click(function(event){
    event.preventDefault();
    jQuery('#logout-form').submit();
});
