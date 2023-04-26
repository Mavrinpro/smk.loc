$(document).ready(function (){
   $('#box').change(
       function(e){
          console.log($(this).is(':checked'))
       }
   )
})

