function bannerRotator(selector, scrollTime, pauseTime, nav){
  
  $(selector+" li:first").css("display", "block"); //show the first list item
  var count = $(selector+" li").size(); //get total number of list items
  if(count > 1){ //dont do anything if there is only one list item.  
	
	  if(scrollTime == null){ var scrollTime=500; } //default scroll time (length of transition)
    if(pauseTime== null){ var pauseTime=5000; } //default pause time (how long to hold the image between transitions)
    
    $(selector+" li").each(function( intIndex ){ $(this).attr('rel', (intIndex+1)); }); //add the list position to the each of the items

    if(nav != null){
      var i = 1;
      $(selector).append("<div id='bannerNav'></div>"); //create navigation buttons
      while(i <= count){
	      if(i == $(selector+" li:visible").attr('rel')){  //if its the nav item that belongs to the visible image, mark it as the active nav item
          $('#bannerNav').append("<a class='active' rel='"+i+"' href='#'></a> ");
	      } 
	      else{
	        $('#bannerNav').append("<a rel='"+i+"' href='#'></a> ");
	      }
	      i++;
   	  }
      $('#bannerNav').append("<span class='pause'></span> "); //pause button
      $('#bannerNav').append("<span href='#' class='play' style='display:none;'></span> "); //play button

      $("#bannerNav a").click(function () { //handle navigation by clicking nav items
        $("#bannerNav a.active").removeClass('active');									
	      $(this).addClass('active'); //move the active nav item to this item
	      var currentClassName = $(selector+" li:visible").attr('rel');
	      var nextClassName = $(this).attr('rel');
	      var storedTimeoutID = $("#bannerNav").attr('timeoutID');

	      clearTimeout(storedTimeoutID);//stop the images from looping when a nav button is pressed
	      $("span.pause").hide();
	      $("span.play").show();
	
	      if( nextClassName != currentClassName ){ //only change images if they clicked on a new item (not the one they are viewing)
		    $(selector+" li:visible").fadeOut(scrollTime);
	        $(selector+" li[rel="+nextClassName+"]").fadeIn(scrollTime);
	      }
	      return false;
      });
    
      $("span.pause").click(function () { //stop the images looping on pause click
        var storedTimeoutID = $("#bannerNav").attr('timeoutID');
	      clearTimeout(storedTimeoutID);
	      $("span.pause").hide();
	      $("span.play").show();
      });
    
      $("span.play").click(function () { //start the images looping on play click
        scrollImages(count, selector, scrollTime, pauseTime);
	      $("span.play").hide();
	      $("span.pause").show();
      });
    }
    
    var timeout = setTimeout(function(){ 
      scrollImages(count, selector, scrollTime, pauseTime);
    }, pauseTime);
    
    $("#bannerNav").attr('timeoutID', timeout); //save the timeout id so we can cancel the loop later if a nav button is pressed
  }
}

function scrollImages(count, selector, scrollTime, pauseTime){
  currentClass = $(selector+" li:visible").attr('rel'); //get the list position of the current image
  nextClass = $(selector+" li:visible").attr('rel'); //open a new variable for the next class
  if (currentClass == count ){ nextClass=1; } //if you've reached the end of the images... start from number 1 again
  else{ nextClass++; } //if not just add one to the last number
    
  $(selector+" li[rel="+currentClass+"]").fadeOut(scrollTime); //fade out old image
  $("#bannerNav a.active").removeClass('active'); //remove active class from our nav
	
  $(selector+" li[rel="+nextClass+"]").fadeIn(scrollTime); //fade in new image
  $("#bannerNav a[rel="+nextClass+"]").addClass('active'); //add new active class to the next nav item
  
  var timeout = setTimeout(function(){ scrollImages(count, selector, scrollTime, pauseTime); }, pauseTime); //scroll the banners again after waiting for pauseTime  
  $("#bannerNav").attr('timeoutID', timeout); //save the timeout id so we can cancel the loop later if a nav button is pressed
}
