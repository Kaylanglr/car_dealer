let count = 0;

$("#add").click( function () {
   if (count <= 8) {
       $( ".inputs" ).append( "<input type=\"file\" required>" );
       count++;
   }
});