function openDoor(e){bg_door=$(".bg_door");door=$(".door");door_box_1=$(".door_box_1");door_box_2=$(".door_box_2");universe=$(".universe");big_but=$(".big_but");insert_here=$(".insert_here");top_pos=$(window).scrollTop();WrapperFix();universe.addClass("expands");$("body").removeClass("fix_w");insert_here.html(e);doorHeight();doorWidth();$(bg_door).show();door.show();Box2();close_or_open="open"}function closeDoor(){if(typeof universe!="undefined"){$("body").addClass("fix_w");universe.removeClass("expands");$(".insert_here .clone_block").remove();bg_door.hide();door.hide();WrapperUnfix();$(window).scrollTop(top_pos);close_or_open="close"}}function doorHeight(){door.css("height",$(window).height()+20+"px")}function doorWidth(){real_w=$(window).width()-scroll_width;door_box_1.css("width",real_w+"px")}function WrapperFix(){mt=$(window).scrollTop();universe.css("width",universe.width()+"px");universe.css("height",mt+$(window).height()+"px");universe.css("margin-top","-"+mt+"px")}function WrapperFixResize(){universe.css("width",$(window).width()+"px");universe.css("height",mt+$(window).height()+"px")}function WrapperUnfix(){universe.css("width","");universe.css("height","");universe.css("margin-top","")}function WrapperFloat(){universe.css("width","")}function Box2(){dinamic_h=$(window).height()-door_box_1.height()-20;door_box_2.css("height",dinamic_h)}scroll_width="17";close_or_open="close";$(window).resize(function(){if(close_or_open!="close"){doorHeight();doorWidth();WrapperFloat();WrapperFixResize();Box2()}})
