$(document).ready(function() {
  
  var animating = false,
      submitPhase1 = 1100,
      submitPhase2 = 400,
      logoutPhase1 = 800,
      $login = $(".login"),
      $app = $(".app");
  
  function ripple(elem, e) {
    $(".ripple").remove();
    var elTop = elem.offset().top,
        elLeft = elem.offset().left,
        x = e.pageX - elLeft,
        y = e.pageY - elTop;
    var $ripple = $("<div class='ripple'></div>");
    $ripple.css({top: y, left: x});
    elem.append($ripple);
  };
  
  $(document).on("click", ".login__submit", function(e) {
    //if (animating) return;
    animating = true;
    var that = this;
    ripple($(that), e);
    var emailid 	= $.trim($('#EmailId').val());
    var password 	= $.trim($('#Password').val());
	var invalid = '';
	
	if(emailid=='' )
	{
		invalid = 1;
		$('#EmailId').css('border','1px solid red');
	}
	else
		$('#EmailId').css('border','');
	if(password=='')
	{
		invalid = 1;
		$('#Password').css('border','1px solid red');
	}
	else
		$('#Password').css('border','');
	if(invalid == '')
	{
		$(that).addClass("processing");
		 $.ajax({
			method:'POST',
			url:"",
			data:{'Type':'Login','UserName':emailid,'password':password},
			beforesend:function(){
				//Empty for now
			},
			complete:function(){
				$(that).removeClass("processing");
			},
			success:function(data){
				if(data == 1)
					window.location.href = base_url+'Manageinstallations';
				else
					alert('Invalid User details');
			}
		 });
		 
	}
  });
  
  $(document).on("click", ".app__logout", function(e) {
    if (animating) return;
    $(".ripple").remove();
    animating = true;
    var that = this;
    $(that).addClass("clicked");
    setTimeout(function() {
      $app.removeClass("active");
      $login.show();
      $login.css("top");
      $login.removeClass("inactive");
    }, logoutPhase1 - 120);
    setTimeout(function() {
      $app.hide();
      animating = false;
      $(that).removeClass("clicked");
    }, logoutPhase1);
  });
  
});