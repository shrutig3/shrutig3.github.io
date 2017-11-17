/*
Javascript : Autocomplete , sorts the table , Sends the filtered images to PHP download script through POST.
*/
var count = 0;
$(document).ready(function(){
    // Initialise Plugin
	var options = {
		additionalFilterTriggers: [$('#query')],
		enableCookies:false
	};
	
	$('#NounsTable').tableFilter(options);
	$('#VerbsTable').tableFilter(options);
	$('#PhrasesTable').tableFilter(options);
	
	$('#DELLIconTable16x16').tableFilter(options);
	$('#DELLIconTable10x10').tableFilter(options);

	// Sort the table columns 
	$("#NounsTable").tablesorter( {sortList: [[0,0]]} );
	$("#VerbsTable").tablesorter( {sortList: [[0,0]]} );    
	$("#PhrasesTable").tablesorter( {sortList: [[0,0]]} );
});

// Calculate the Image loading progress to update the progress bar
function imagesLoaded()
{
	count++;
    var percent = parseInt((count / 1142) * 100) + '%';
	$(".progress-bar span").css('width', percent);
	if(percent == '100%')
	{
		$(".progress-bar").hide();
	}
}

// Prevent the default behavior of Enter on search box
function PreventEnterAction(event)
{
	if (event.keyCode == 13) 
	{
		event.cancelBubble = true;
		event.returnValue = false;
		event.preventDefault();
		return false;
	}
}

// Sends the filtered images to php download script as a string. The Image paths are separated by "|".
function DownloadImages()
{
	  // Get the image path of all visible rows ( Rows returned from autocomplete )
	  var ImageArray = new Array();
	  $('#NounsTable tr:visible').each(function()
	  {
		  if($(this).find('img').length != 0)	// Check if the visible table rows contain any images ( icons ) if not then it means its header row of table (For Noun Table)
		  {
			  var columnValue = $(this).find('img').attr('src');
			  ImageArray.push(columnValue);
		  }
	   });
	   
	  $('#VerbsTable tr:visible').each(function()
	  {
		  if($(this).find('img').length != 0)	// Check if the visible table rows contain any images ( icons ) if not then it means its header row of table (For Verbs Table)
		  {
			  var columnValue = $(this).find('img').attr('src');
			  ImageArray.push(columnValue);
		  }
	   });
	
	  $('#PhrasesTable tr:visible').each(function()
	  {
		  if($(this).find('img').length != 0)	// Check if the visible table rows contain any images ( icons ) if not then it means its header row of table (For Phrases Table)
		  {
			  var columnValue = $(this).find('img').attr('src');
			  ImageArray.push(columnValue);
		  }
	   });


  	  if(ImageArray.length == 0)
	  {
	  	alert('No Images selected to Download');
	  }
	  else
	  {
		  var ImageIds;
		  ImageIds = ImageArray.join("|");
		  
		  $('#image_ids').val(ImageIds);
		  $('#myForm').submit();
	  }
}


