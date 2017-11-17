<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Searchable Web Archive</title>

	<!-- Javascripts and CSS -->
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/picnet.table.filter.min.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="js/MyAutoSearch.js"></script>

	<link rel = "stylesheet" type = "text/css" href = "css/styles.css"></link>

</head>

<body>
<div id = "Main">
	<div id = "Heading">
    <h1>Visual Language of DB  Icons</h1>
    <h2>DB App Icons - Clear & Consistent meaning through visual language</h2>
<!--		<img src = "Images/Additional/Heading.png"/>-->
<form id = "myForm" action = "Download.php" method = "post">
            <input type = "text" id = "query" onkeypress = "PreventEnterAction(event)" value ="" />
   			<!--<label id = "singleimage">Click Image/Link to download specific image</label>-->
			<input type = 'hidden' name = 'image_ids' value = '' id = 'image_ids' >
			<img src = "Images/Additional/download.png" name="downloadimages" width="48" height="60" id = "downloadimages" title = "Download ALL Icons or Filtered Icons. Click icon link to download individual icon. Includes PNG, BMP, ICO." onclick = "DownloadImages()"/>
	  </form>
            <p class="Disclaimer">Note: These icons are created by multiple designers at Dell + purchased &amp; licensed icons.</p>
   		<div class="progress-bar green stripes glow">
			<span style="width:"></span>
		</div>
    </div>
	<?php 

	define("DIR_NOUNS", "Images/Language/Nouns/");
	define("DIR_VERBS", "Images/Language/Verbs/");
	define("DIR_PHRASES", "Images/Language/Phrases/");

	$filesNouns = glob(DIR_NOUNS."*.png");
	$filesVerbs = glob(DIR_VERBS."*.png");
	$filesPhrases = glob(DIR_PHRASES."*.png");
	
	if(count($filesNouns) == 0 || count($filesVerbs) == 0 || count($filesPhrases) == 0)
		echo "Error in parsing the files! No Image files found!";

	echo '<div id = "containerTable">';
	// Code for displaying Phrases.
	echo '<table id = "PhrasesTable" summary= "Table for listing Phrases" class = "icontables" cellspacing="5" cellpadding="0" border="0">';
	echo '<thead><tr><th colspan ="2" filter="false"><img src = "Images/Additional/Phrases.png" align="left"/></th><th filter="false"></th></tr></thead>';
	echo '<tbody>';
	// For each image create a row for icon and name 

	for ($i = 0; $i < count($filesPhrases); $i++) 
	{
	    // Take out the relative path to get the name of the image and the put it in the table.
		$ImagePath = basename($filesPhrases[$i]);
		
		echo  '<tr><td>';
		echo '<a href="download.php?file='.$filesPhrases[$i].'"><img " src = "'.$filesPhrases[$i].'" onLoad = "imagesLoaded()"/></a>';
		echo '</td>';
		echo '<td><a href="download.php?file='.$filesPhrases[$i].'">';
		echo $ImagePath;	
		echo '</a></td>';
	}
	echo '</tbody></table>';

	// Code for displaying nouns. Create a table of icons and names and provide auto-complete feature for it.
	echo '<table id = "NounsTable" summary= "Table for listing Nouns" class = "icontables" cellspacing="5" cellpadding="0" border="0">';
	echo '<thead><tr><th colspan ="2" filter="false"><img src = "Images/Additional/Nouns.png" align="left"/></th><th filter="false"></th></tr></thead>';
	echo '<tbody>';

	// For each image create a row for icon and name 
	for ($i = 0; $i < count($filesNouns); $i++) 
	{
	    // Take out the relative path to get the name of the image and the put it in the table.
		$ImagePath = basename($filesNouns[$i]);
		
		echo  '<tr><td>';
		echo '<a href="download.php?file='.$filesNouns[$i].'"><img " src = "'.$filesNouns[$i].'" onLoad = "imagesLoaded()"/></a>';
		echo '</td>';
		echo '<td><a href="download.php?file='.$filesNouns[$i].'">';
		echo $ImagePath;	
		echo '</a></td>';
	}
	echo '</tbody></table>';

	// Code for displaying verbs.
	echo '<table id = "VerbsTable" summary= "Table for listing Verbs" class = "icontables" cellspacing="5" cellpadding="0" border="0">';
	echo '<thead><tr><th colspan ="2" filter="false"><img src = "Images/Additional/Verbs.png" align="left"/></th><th filter="false"></th></tr></thead>';
	echo '<tbody>';

	// For each image create a row for icon and name 

	for ($i = 0; $i < count($filesVerbs); $i++) 
	{
	    // Take out the relative path to get the name of the image and the put it in the table.
		$ImagePath = basename($filesVerbs[$i]);
		
		echo  '<tr><td>';
		echo '<a href="download.php?file='.$filesVerbs[$i].'"><img " src = "'.$filesVerbs[$i].'" onLoad = "imagesLoaded()"/></a>';
		echo '</td>';
		echo '<td><a href="download.php?file='.$filesVerbs[$i].'">';
		echo $ImagePath;	
		echo '</a></td>';
	}
	echo '</tbody></table>';
	echo '</div>';
	
	echo '<div id = "containerTable_DELLIcons">';
	define("DIR_DELLICONS_10x10", "Images/DELLIcons/10x10/");
	define("DIR_DELLICONS_16x16", "Images/DELLIcons/16x16/");
	
	$filesDELLIcons16x16 = glob(DIR_DELLICONS_16x16."*.png");
	$filesDELLIcons10x10 = glob(DIR_DELLICONS_10x10."*.png");
	
	// Display DELL 16x16 Icons

	echo '<table id = "DELLIconTable16x16" summary= "Table for listing DELL Icons" class = "icontables" cellspacing="5" cellpadding="0" border="0">';
	echo '<thead><tr><th colspan ="2" filter="false" id="DellImage"><img src = "Images/Additional/DellPictograms.png" align="left"/></th><th filter="false"></th></tr></thead>';

/*	echo '<thead><tr><th colspan ="2" filter="false" class = "DELLTitle">DELL Pictograms</th><th filter="false"></th></tr></thead>';*/
	echo '<tbody>';

	for ($i = 0; $i < count($filesDELLIcons16x16); $i++) 
	{
		$ImagePath = basename($filesDELLIcons16x16[$i]);

		echo  '<tr><td>';
		echo '<img " src = "'.$filesDELLIcons16x16[$i].'" onLoad = "imagesLoaded()" />';
		echo '</td>';
		echo '<td>';
		echo $ImagePath;	
		echo '</td>';
	}
	echo '</tbody></table>';

	// Display DELL 10x10 icons
	
	echo '<table id = "DELLIconTable10x10" summary= "Table for listing DELL Icons" class = "icontables" cellspacing="5" cellpadding="0" border="0">';
	echo '<thead><tr><th colspan ="2" filter="false" class = "DELLColumn" ></th><th filter="false"></th></tr></thead>';
	echo '<tbody>';

	for ($i = 0; $i < count($filesDELLIcons10x10); $i++) 
	{
		$ImagePath = basename($filesDELLIcons10x10[$i]);

		echo  '<tr><td>';
		echo '<img " src = "'.$filesDELLIcons10x10[$i].' " onLoad = "imagesLoaded()" />';
		echo '</td>';
		echo '<td>';
		echo $ImagePath;	
		echo '</td>';
	}
	echo '</tbody></table>';
	echo '</div>';
	?>
</div>
</body>
</html>
