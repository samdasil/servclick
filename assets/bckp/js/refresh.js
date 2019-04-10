$(document).ready(function() {
$.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
setInterval(function() {
$('refreshMe').load('../../manage/man-contti/index.php');
}, 3000); // the "3000" here refers to the time to refresh the div.  it is in milliseconds. 
});