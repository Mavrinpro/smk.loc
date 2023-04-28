$(document).ready(function (){
   $('#box').change(
       function(e){
          console.log($(this).is(':checked'));
           if ($(this).is(':checked') == true){
               toastr.info('Можно редактировать и удалять материалы.', 'Пользователь стал администратором!', {
                   timeOut: 5000,
                   closeButton: true,
                   progressBar: true
               })
           }else{
               toastr.error('Редактирование и удаление запрещено.', 'Права администратора отменены!', {
                   timeOut: 5000,
                   closeButton: true,
                   progressBar: true
               })
           }
       }
   )
})

$("#TooltipDemo").click(function() {

    toastr.info('We do have the Kapua suite available.', 'Turtle Bay Resort', {
        timeOut: 5000,
        closeButton: true,
        progressBar: true
    })
});


// t(".show-toastr-example").click("(function()"{
//     "n.a.options="{
//         "closeButton":!0,
//             "debug":!1,
//             "newestOnTop":!0,
//             "progressBar":!0,
//             "positionClass":"toast-bottom-center",
//             "preventDuplicates":!1,
//             "onclick":null,
//             "showDuration":"300",
//             "hideDuration":"1000",
//             "timeOut":"5000",
//             "extendedTimeOut":"1000",
//             "showEasing":"swing",
//             "hideEasing":"linear",
//             "showMethod":"fadeIn",
//             "hideMethod":"fadeOut"
//     }
