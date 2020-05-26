function esperar(vari)
{
  document.getElementById(vari).innerHTML="<div class='loading_full'>AGUARDE ENQUANTO O SISTEMA ESTA CARREGANDO</div>";
}
function esperar_mini(vari)
{
  document.getElementById(vari).innerHTML="<div class='loading_mini'></div>";
}
function esperar_justimage(vari)
{
  document.getElementById(vari).innerHTML="<div class='loading_justimage'></div>";
}
function limpiar(vari)
{
  document.getElementById(vari).innerHTML="";
}
function restar()
{
	var total = document.getElementById("total").value - document.getElementById("str").value - document.getElementById("dex").value - document.getElementById("int").value;
	document.getElementById('totaltxt').innerHTML=total;
}

/* get time */
function start(myY, myM, myD, myH, myMins, mySecs, myL)
{
  var d=new Date();      //  Returns the Day (number) so we can set it to default
  currentDay = d.getDate();
  var year = myY;                                             //  '*' for next month, '0' for this month or 1 through 12 for the month
  var month = myM;                                             //  '*' for next month, '0' for this month or 1 through 12 for the month
  var day = myD;                                             //  Offset for day of month day or + day
  var hour = myH;                                             //  0 through 23 for the hours of the day
  var minutes = myMins;                     //  Minutes of the hour to End on
  var seconds = mySecs;                     //  Seconds of the minute to End on
  var tz = -2;                            //  Offset for your timezone in hours from UTC
  var lab = myL;                            //  The id of the page entry where the timezone countdown is to show
  displayTZCountDown(setTZCountDown(year,month,day,hour,minutes,seconds,tz),lab);
}
function setTZCountDown(year,month,day,hour,minutes,seconds,tz)
{
  var toDate = new Date();
  toDate.setYear(year);
  if (month == '*') { toDate.setMonth(toDate.getMonth() + 1); }
  else if (month > 0)
  {
    if (month <= toDate.getMonth())toDate.setYear(toDate.getYear() + 1);
    toDate.setMonth(month-1);
  }
  if (day.substr(0,1) == '+')
  {
    var day1 = parseInt(day.substr(1));
    toDate.setDate(toDate.getDate()+day1);
  }
  else
  {
    toDate.setDate(day);
  }
  toDate.setHours(hour);
  toDate.setMinutes(minutes-(tz*60));
  toDate.setSeconds(seconds);
  var fromDate = new Date();
  fromDate.setMinutes(fromDate.getMinutes() + fromDate.getTimezoneOffset());
  var diffDate = new Date(0);
  diffDate.setMilliseconds(toDate - fromDate);
  return Math.floor(diffDate.valueOf()/1000);
}
function displayTZCountDown(countdown,tzcd) {
  if (countdown < 0)
  document.getElementById(tzcd).innerHTML = "<b>NOW</b>";
  else {var secs = countdown % 60;
  if (secs < 10) secs = '0'+secs;
  var countdown1 = (countdown - secs) / 60;
  var mins = countdown1 % 60;
  if (mins < 10) mins = '0'+mins;
  countdown1 = (countdown1 - mins) / 60;
  var hours = countdown1 % 24;
  var days = (countdown1 - hours) / 24;
  if (hours < 10) {
    var hours = "0" + hours;
  }
  if (hours > 1) {
    var desc = " hours";
  }
  if (hours < 1) {
    var desc = " mins";
  }
    document.getElementById(tzcd).innerHTML = hours + ':' + mins + ':' + secs + desc;
    setTimeout('displayTZCountDown('+(countdown-1)+',\''+tzcd+'\');',1000);
  }
}
/* END get time */

/* server time */
function jsClockTimeZone()
{
  var TimezoneOffset = -2
  var currenttime = '<?php print date("H:i:s", time())?>'
  var serverdate=new Date(currenttime)
  var localTime = new Date()
  var ms = localTime.getTime()
             + (localTime.getTimezoneOffset() * 60000)
             + TimezoneOffset * 3600000
  var time =  new Date(ms)
  var hour = time.getHours()
  var minute = time.getMinutes()
  var second = time.getSeconds()
  var temp = "" + ((hour < 10) ? "0" : "") + hour
  temp += ((minute < 10) ? ":0" : ":") + minute
  temp += ((second < 10) ? ":0" : ":") + second
  document.getElementById("timeserver").innerHTML = temp
  setTimeout("jsClockTimeZone()",1000)
}
var myshow;
Event.observe(window, "load", function() {
  $('myshow1') && $('myshow1').protoShow({
    interval: 3000,
    transitionType: "fade",
    captions: false
  });
});
/* END server time */