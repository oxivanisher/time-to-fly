//Optional. If this file exists it is automatically included when the blocks is in add or edit mode. (Note: this file will only be included once per page load.) This can be useful for JavaScript that should run when interacting the block's edit interface.
$.getJSON( "ajax/test.json", function( data ) {
    var items = [];
    $.each( data, function( key, val ) {
      items.push( "<li id='" + key + "'>" + val + "</li>" );
    });

    $( "<ul/>", {
      "class": "my-new-list",
      html: items.join( "" )
    }).appendTo( "body" );
  });
