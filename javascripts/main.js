$( document ).ready(function() {	
  $('[data-toggle="popover"]').popover();

  $('.original .chunk').each(function(){
  	//console.log(this);
  });

  function displayChunk(thisChunk){

  		var popover = $('<div>');
  			popover.attr('id', 'chunk-popover');
  			popover.attr('class', 'popover right');

  		var popoverTitle = $('<h3>');
  			popoverTitle.attr('class', 'popover-title chunk-title');

  		var popoverContent = $('<div>');
  			popoverContent.attr('class', 'popover-content');



	  	var chunkText = $(thisChunk).text();
	  	var chunkDefinition = $(thisChunk).attr('data-definition');
	  	var chunkFunction = $(thisChunk).attr('data-function');
			var chunkForm = $(thisChunk).attr('data-form');
	  	//console.log(chunkText);
	  	//console.log(chunkDefinition);
	  	//console.log(chunkFunction);

	  	$('#chunk-popover .chunk-title').text(chunkText);
	  	$('#chunk-popover .chunk-definition').text(chunkDefinition).append(' <a href="glossary-entry.php" class="btn btn-xs btn-default">More ›</a>');
	  	$('#chunk-popover .chunk-function').text(chunkFunction);
			$('#chunk-popover .chunk-form').text(chunkForm);

	  	$(thisChunk).children('.word').each(function(){
	  		var listItem = $('<li>');
	  		var glossaryLink = $('<a>');
	  			//hardcoded link for now. 
	  			glossaryLink.attr('href', 'glossary-entry.php');
	  		var wordText = $(this).text();
	  		//console.log(wordText);
	  		glossaryLink.text(wordText);
	  		listItem.append(glossaryLink);
	  		$('.chunk-words').append(listItem);
	  	});

	  	var popover = $('#chunk-popover');
	  	popover.remove();
	  	$(thisChunk).append(popover);
	  	popover.show();
	// Option 2
		// display a selection menu, choose to view info about the chunk, or each of the words. 
	// Option 3
		// Display infa about chunk, and then menu items that expose the info about words. (would be better with large chunks.)
  }
  	var toggleCount = 0;
	function toggleAccordion(){
	  $('#accordion .panel-collapse').each(function(){
	  	if (toggleCount == 0) {
			if ( $(this).attr('class').search('in') == -1 ){
		  		 $(this).collapse('toggle');
		  	}

	  	} else {
	  		 $(this).collapse('toggle');
	  	}
	  });
	  toggleCount++; 	
	}


	$('.toggleAll').on('click', function(){
		toggleAccordion();
	});
	
	var isOpen = false;


	$('.chunk').on('click', function(){
		if (isOpen == false){
			console.log('false...')
			var status = $(this).attr('class');
			//console.log(status.search('active'));
			if (status.search('active') > -1 ){
				console.log('active');
				$(this).removeClass('active');
				$('#chunk-popover').hide;
			} else {
				console.log('inactive');
				displayChunk(this);
				$(this).addClass('active');
			}
			isOpen = true;
		} else {
			console.log('true...')
			window.location.reload();
		}
	  	
	});
	$('.word').on('click', function(e){
		if (isOpen == false){
			console.log('WORD');
			 e.stopPropagation();//console.log(status.search('active'));
			if (status.search('active') > -1 ){
				console.log('active');
				$(this).removeClass('active');
				$('#chunk-popover').hide;
			} else {
				console.log('inactive');
				displayChunk(this);
				$(this).addClass('active');
			}
			isOpen = true;
		} else {
			console.log('true...')
			window.location.reload();
		}
	});
	
	$('#popover-close').on('click', function(e){
		e.stopPropagation();
		console.log('close...');
		//window.location.reload();
	});



});