
function handleBtnClick(event) {
  toggleButton(event.target);
}

function toggleButton(element) {

  var pressed = (element.getAttribute("aria-pressed") === "true");
  element.setAttribute("aria-pressed", !pressed);
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


function initiateFollow() {  
      // $("a.unfollow").bind("mouseover",function(){
       // $(this).children("span").text(" Unfollow");
	    // $(this).children("i").removeClass("fa-check-circle");
       // $(this).children("i").addClass("fa-times-circle");
      // });

      // $("a.unfollow").bind("mouseout",function(){
       // $(this).children("span").text(" Following");
       // $(this).children("i").addClass("fa-check-circle");
       // $(this).children("i").removeClass("fa-bell-o");
      // }); 
		
      $("a.unfollow").bind("click",function(){     
		$(this).children("a.unfollow span").text(" Follow");
		$(this).children("i").removeClass("fa-times-circle");
		$(this).children("i").addClass("fa-bell-o");
        $(this).removeClass("unfollow");
        $(this).addClass("follow");
        $(this).unbind();
        initiateFollow();
      });
      
      $("a.follow").bind("click",function(){
        $(this).children("span").text(" Unfollow");
        $(this).removeClass("follow");
        $(this).addClass("unfollow");
        $(this).unbind();
        initiateFollow();
      });
}
