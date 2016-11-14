Drupal.behaviors.intro_gallery = {
	attach: function (context, settings) {
		(function ($) {
 			
 			var 	$win = $(window),
 					win_w = $win.width(),
 					win_h = $win.height(),
 					$intro_images_holder = $('.intro-images'),
 					$intro_images = $('.intro-images .field-item')

 					total_items = $intro_images.length,
 					current_item = 0,
					last_item = 0,
					trans_speed = 800,
					slide_show = setInterval(nextItem, 4000);;


 			$win.resize(function(event) {
 				win_w = $win.width();
				win_h = $win.height();

 				resizeImages();
 			});

 			function resizeImages(){
 				
 				if(win_w > win_h){

 					$intro_images_holder.removeClass('portrait');
 				}else{

 					$intro_images_holder.addClass('portrait');
 				}
 			}

 			$intro_images.each(function(index, el) {
 				//console.log(this)
 				var $this = $(this);

 				$this.attr('data-index', index);
 			});

 			function nextItem(){
				last_item = current_item;
				current_item++;
				if(current_item == total_items){
					current_item = 0;
				}
				fadeItems();
			}

			
			function lastItem(){
				last_item = current_item;
				current_item--;
				if(current_item == -1){
					current_item = total_items - 1;
				}
				fadeItems();
			}

			function fadeItems(){
				$('[data-index=' + current_item + ']').fadeIn(trans_speed);
				$('[data-index=' + last_item + ']').fadeOut(trans_speed);		
			}


			$(document).keydown(function(e) {
			    switch(e.which) {
			        case 37: // left
			        clearInterval(slide_show);
			        lastItem()
			        break;

			        case 38: // up
			        break;

			        case 39: // right
			        	clearInterval(slide_show);
				       nextItem()
			        break;

			        case 40: // down
			        	//fadeImage();
			        break;

			        default: return; // exit this handler for other keys
			    }
			    e.preventDefault(); // prevent the default action (scroll / move caret)
			});

			resizeImages();
		}(jQuery));
	}	
}