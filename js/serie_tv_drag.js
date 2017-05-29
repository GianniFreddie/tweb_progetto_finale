document.observe("dom:loaded", function() {
  $$('.telefilm-info').each(function(telefilm_div) {
    var telefilm_draggable_div = new Draggable(telefilm_div.id, { ghosting: true, onEnd: telefilm_drag_ended });
  });
});

function telefilm_drag_ended(draggable_obj, mouse_event){
  console.log("ok");
}
