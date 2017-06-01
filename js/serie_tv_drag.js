document.observe("dom:loaded", function() {
  //nascondi elementi da visualizzare solo durante il drag
  $('did_watch_droppable').hide();
  $('watching_droppable').hide();
  $('wish_to_watch').hide();
  //inizializza droppable
  Droppables.add('did_watch_droppable', {
    accept: 'telefilm-info',
    onDrop: telefilm_drop
  });
  Droppables.add('watching_droppable', {
    accept: 'telefilm-info',
    onDrop: telefilm_drop
  });
  Droppables.add('wish_to_watch', {
    accept: 'telefilm-info',
    onDrop: telefilm_drop
  });
  //inizializza draggable
  $$('.telefilm-info').each(function(telefilm_div) {
    var telefilm_draggable_div = new Draggable(telefilm_div.id, { ghosting: true, onStart: telefilm_drag_started, onEnd: telefilm_drag_ended });
  });
});

//funzione richiamata quando inizio a draggare un qualsiasi draggable
function telefilm_drag_started(draggable, mouse_event) {
  $('did_watch_droppable').show();
  $('watching_droppable').show();
  $('wish_to_watch').show();
}

//funzione richiamata quando finisco di draggare un draggable
function telefilm_drag_ended(draggable_obj, mouse_event){
  $('did_watch_droppable').hide();
  $('watching_droppable').hide();
  $('wish_to_watch').hide();
}

//funzione richiamata quando "poso" il div draggable sul div drop
function telefilm_drop(element){
  element.hide();
}
