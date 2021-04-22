/**
 * @author Yushae Raza
 * 2019-3-16
 * Seng300 Project Group4 Iteration 2
 * Loads the html from Menu.html and prepends it as an element with class name nav
 */
$(document).ready(function() {     
      var sendDate = (new Date()).getTime();
     
         $.ajax({
        type:"POST",
        url: '/Seng300/Scripts/files.php',
        data:{Name:"Menu/Menu.html"},
        success:function(data) {   
                $('.navb').prepend(data);
                var receiveDate = (new Date()).getTime();

                var responseTimeMs = receiveDate - sendDate;
                 //alert("server response time " + responseTimeMs);
             //   generate_menu()
   
            }
      
    });

    var buttons=document.getElementsByClassName("dropdown");
        for(var i=0;i<buttons.length;i++){
            
            buttons[i].onclick=function(event){
              $(".dropdown-content").css("display", "none");
            var test =this.childNodes[3];
       
       //console.log(this.childNodes[3])
     
            event.stopPropagation();
            $(test).css("display", "block");
            
            $(test).on("click", function (event) {
                 event.stopPropagation();
            });

            }

        }
        console.log(buttons.length)
        
});
   $(document).on("click", function () {
    $(".dropdown-content").css("display", "none");
})
function generate_menu(){
  $( '.dropdownm' ).click(
            function(){
                $(this).children('.drpm').slideToggle();
                $('.drp1').hide();
                $('.drp2').hide();
                $('.drp3').hide();
                $('.drp2x').hide();
                $('.drp2y').hide();
            }
        );

         $( '.dr1' ).click(
            function(evt){
                evt.stopPropagation();
                $(this).children('.drp1').slideToggle();
                $(this).siblings('.dr3').children('.drp3').hide();
                $(this).siblings('.dr2').children('.drp2').children('.drp2x').hide();
                $(this).siblings('.dr2').children('.drp2').children('.drp2y').hide();
                $(this).siblings('.dr2').children('.drp2').hide();
            }
        );
         
         $( '.dr2' ).click(
            function(evt){
                evt.stopPropagation();
                $(this).children('.drp2').slideToggle();
                $(this).siblings('.dr3').children('.drp3').hide();
                $(this).siblings('.dr1').children('.drp1').hide();
            }
        );

         $( '.dr2x' ).click(
            function(evt){
                evt.stopPropagation();
                $(this).children('.drp2x').slideToggle();
                $(this).siblings('.dr2y').children('.drp2y').hide();
            }
        );

         $( '.dr2y' ).click(
            function(evt){
                evt.stopPropagation();
                $(this).children('.drp2y').slideToggle();
                $(this).siblings('.dr2x').children('.drp2x').hide();
            }
        );

         $( '.dr3' ).click(
            function(evt){
                evt.stopPropagation();
                $(this).children('.drp3').slideToggle();
                $(this).siblings('.dr1').children('.drp1').hide();
                $(this).siblings('.dr2').children('.drp2').children('.drp2x').hide();
                $(this).siblings('.dr2').children('.drp2').children('.drp2y').hide();
                $(this).siblings('.dr2').children('.drp2').hide();
            }
        );
}