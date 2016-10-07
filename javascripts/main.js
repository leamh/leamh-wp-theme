$( document ).ready(function() {

  $.getJSON( "http://leamh.org/wp-content/themes/leamh/javascripts/boc.json", function( data ) {
    var words = [];
    $.each( data, function(index, word) {
      words.push(word);
    });
    $('[data-toggle="popover"]').popover();

    var findWord = function(wordId) {
        for (var i = 0, len = words.length; i < len; i++) {
            if (words[i].id === wordId)
                return words[i]; // Return as soon as the object is found
        }
        return null; // The object was not found
    }

  function displayChunk(thisChunk){

    var popover = $('<div>');
    popover.attr('id', 'chunk-popover');
    popover.attr('class', 'popover right');

    var popoverTitle = $('<h3>');
    popoverTitle.attr('class', 'popover-title chunk-title');

    var popoverContent = $('<div>');
    popoverContent.attr('class', 'popover-content');

    var chunkText = $(thisChunk).text();
    var chunkDefinition, chunkFunction, chunkForm, chunkNotes, chunkTranslation;

    var word = findWord(chunkText);

    var popoverText;
    if (word != null) {
      chunkDefinition = word.dictionary;
      chunkForm = word.form;
      chunkTranslation = word.translation;
      chunkNotes = word.notes;
    }
    //console.log(chunkText);
    //console.log(chunkDefinition);
    //console.log(chunkFunction);

    var popoverContent = '';

    console.log(word);
    $.each(word, function(key, value) {
      console.log(key, value);
      if (key === 'id') {
        return true;
      }
      var headingText = key;
      if (key === 'dictionary') {
        headingText = 'Dictionary Form and Meaning';
        value += '<a href="http://leamh.org/glossary/ag/" class="btn btn-xs btn-default">More ›</a>';
      }

      if (key === 'form') {
        headingText = 'Form Here';
      }

      var heading = '<h5>'+headingText+'</h5>';
      var content = '<div>'+value+'</div>';

      popoverContent += heading + content;
    });

    console.log(popoverContent);
    $('#chunk-popover .chunk-title').text(chunkText);
    //$('#chunk-popover .chunk-definition').text(chunkDefinition).append(' <a href="http://leamh.org/glossary/ag/" class="btn btn-xs btn-default">More ›</a>');
    //$('#chunk-popover .chunk-function').text(chunkFunction);
    //$('#chunk-popover .chunk-form').text(chunkForm);
    //$('#chunk-popover .popover-content').append('<div class="translation">').text("<h5>Translation</h5><div>"+chunkTranslation+"</div>");

    $('#chunk-popover .popover-content').append(popoverContent);

    //$(popoverContent).append('<h5>').text("Notes");
    //$(popoverContent).append('<div>').text(chunkNotes);

    $(thisChunk).children('.word').each(function(){
      var listItem = $('<li>');
      var glossaryLink = $('<a>');
      var wordText = $(this).text();
      glossaryLink.attr('href', '/glossary/'+wordText);
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
});
