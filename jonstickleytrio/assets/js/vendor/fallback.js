(function($){
    // use local CSS file as fallback if CDN fails
    $(function () {
      if ($('#mFailCheck').is(':visible') === true) {
        $('<link rel="stylesheet" type="text/css" href="css/materialize.css">').insertAfter( "title" );
      }
    });

    $(function () {
      if ($('#bFailCheck').is(':visible') === true) {
        $('<link rel="stylesheet" type="text/css" href="css/bootstrap.css">').insertAfter( "title" );
      }
    });

})(jQuery); // end of jQuery name space