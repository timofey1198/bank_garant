(function($) {
    $(function() { 
		
		var $html_body = $('html, body');
		var $body = $('body');
		var $window = $(window);
		
		var $is_footer = Boolean( $('.footer').length );
		var $is_footer_top = Boolean( $('.footer-top').length );
		var $is_footer_bottom = Boolean( $('.footer-bottom').length );
		
		var $is_select = Boolean( $('.select-box').length );
		
		var $is_content = Boolean( $('.content').length );		
		
		var $is_btn_menu = Boolean( $('.btn-menu').length );
		
		var $is_header_menu = Boolean( $('.hm-box').length );
		
		$body.on('click', function(e) { 
			if ( $is_select ) {
				$('.select-box').removeClass('open');
			}
		});

		if ( $is_btn_menu && $is_header_menu ) {
		
				var $width = Math.max( window.innerWidth, document.body.clientWidth, document.documentElement.clientWidth );
				var $mobile_width = 992;
				
				$(window).on('resize orientationchange', function(e) {
					var $resize_width = Math.max( window.innerWidth, document.body.clientWidth, document.documentElement.clientWidth );
					if ( $width >= $mobile_width && $resize_width < $mobile_width ) { 
						$body.trigger('click');
					}
					else if ( $width < $mobile_width && $resize_width >= $mobile_width ) {
						$body.trigger('click');
					}
					$width = $resize_width;
				});

		
			$('.btn-menu').on('click', function(e) { 
				( e && e.stopPropagation ) ? e.stopPropagation() : e.cancelBubble = true;
				( e && e.preventDefault ) ? e.preventDefault() : e.returnValue = false;
				var $el = $(this);
				var $hm = ( $('.hm-item') ) ? $('.hm-item') : false;
				var $hm_el = $hm.get(0);
				var $hm_el_h = $hm_el.offsetHeight;
				var $hm_el_scroll_h = $hm_el.scrollHeight;
				var $hm_el_scroll_top = $hm_el.scrollTop;
				var $hm_el_y1 = 0;
				var $hm_el_y2 = 0;
				var $hm_el_delta = 0;
				var $close = ( $('.btn-close') ) ? $('.btn-close') : false;
				function el_open_class() {
					$body.addClass('modal-open');
					$el.addClass('open');
				}
				function el_close_class() {
					$el.removeClass('open');
					$body.removeClass('modal-open');
				}
				function el_open_event() {
					$window.on('resize orientationchange', el_resize );
					$html_body.on('click', el_click );	
					$body.on('touchstart', el_touchstart );
					( $close ) && $close.on('click', el_close );
				}
				function el_close_event() {
					$window.off('resize orientationchange', el_resize );
					$html_body.off('click', el_click );	
					$body.off('touchstart', el_touchstart );
					( $close ) && $close.off('click', el_close );
				}
				function el_resize() {
					$hm_el_h = $hm_el.offsetHeight;
					$hm_el_scroll_h = $hm_el.scrollHeight;
					$hm_el_scroll_top = $hm_el.scrollTop;
				}
				function el_touchstart(e) {
					if ( e && e.originalEvent && e.originalEvent.changedTouches && e.originalEvent.changedTouches[0] ) {
						$hm_el_y1 = ( e.originalEvent.changedTouches[0].pageY ) ? e.originalEvent.changedTouches[0].pageY : 0;
						$hm_el_y2 = ( e.originalEvent.changedTouches[0].pageY ) ? e.originalEvent.changedTouches[0].pageY : 0;
						$hm_el_delta = 0;
						el_resize();						
					}					
					$body.on('touchmove', el_touchmove );
					$body.on('touchend', el_touchend );
				}
				function el_touchmove(e) {
					( e && e.preventDefault ) ? e.preventDefault() : e.returnValue = false;
					if ( e && $(e.target).closest('.hm-item').length == 0 ) {
						return false;
					} else {
						if ( e && e.originalEvent && e.originalEvent.changedTouches && e.originalEvent.changedTouches[0] ) {
							$hm_el_y2 = ( e.originalEvent.changedTouches[0].pageY ) ? e.originalEvent.changedTouches[0].pageY : 0;
							$hm_el_delta = Math.abs( $hm_el_y1 - $hm_el_y2 );
							if ( $hm_el_h < $hm_el_scroll_h ) {
								el_scrollto( $hm_el_h, $hm_el_scroll_h, $hm_el_scroll_top, $hm_el_y1, $hm_el_y2, $hm_el_delta );
								return true;
							} else {
								return false;
							}
						} 
					}
				}
				function el_touchend(e) {
					if ( e && e.originalEvent && e.originalEvent.changedTouches && e.originalEvent.changedTouches[0] ) {
						if ( e && $(e.target).closest('.hm-item').length > 0 ) {
							$hm_el_y2 = ( e.originalEvent.changedTouches[0].pageY ) ? e.originalEvent.changedTouches[0].pageY : 0;
							$hm_el_delta = Math.abs( $hm_el_y1 - $hm_el_y2 );
							if ( $hm_el_h < $hm_el_scroll_h ) {
								el_scrollto( $hm_el_h, $hm_el_scroll_h, $hm_el_scroll_top, $hm_el_y1, $hm_el_y2, $hm_el_delta );
							}
							el_resize();							
						}
					}
					$body.off('touchmove', el_touchmove );
					$body.off('touchend', el_touchend );
				}
				function el_scrollto( h, scroll_h, scroll_top, y1, y2, delta ) {
					var top = 0;
					var scroll_delta = scroll_h - h;
					if ( y2 > y1 ) {
						top = ( ( scroll_top - delta ) > 0 ) ? ( scroll_top - delta ) : 0;
						$hm.scrollTop( top );
					}
					else if ( y1 > y2 ) {
						top = ( ( scroll_top + delta ) < scroll_delta ) ? ( scroll_top + delta ) : scroll_delta;
						$hm.scrollTop( top );
					}
				}
				function el_close(e) {
					( e && e.stopPropagation ) ? e.stopPropagation() : e.cancelBubble = true;
					( e && e.preventDefault ) ? e.preventDefault() : e.returnValue = false;	
					el_close_event();
					el_close_class();
				}
				function el_click(e) { 
					if ( e && $(e.target).closest('.hm-box').length == 0 ) { 
						if ( $el.hasClass('open') ) { 
							el_close_class();
						}
						el_close_event();
					}
				}
				if ( $el.hasClass('open') ) { 
					el_close_event();
					el_close_class();
				} else { 
					$body.trigger('click');
					el_open_event();
					el_open_class();
				}
			});
		}

		function selectizer() { 
			if ( $is_select ) {
				$('.select-box').each( function(){
					var $select_box = $(this);
					var $select_desc = $select_box.find('.select-desc');
					var $select_text = $select_desc.find('.select-desc-text');
					var $select_input = $select_desc.find('.select-input');
					var $select_list = $select_box.find('.select-list');
					var $select_list_li = $select_list.find('li');
					
					$select_input.val( $select_list_li.first().attr('data-value') );
					$select_text.text( $select_list_li.first().text() );

					$select_desc.find('.select-desc-text, .caret').on( 'click', function(e) {
						( e && e.stopPropagation ) ? e.stopPropagation() : e.cancelBubble = true;
						( e && e.preventDefault ) ? e.preventDefault() : e.returnValue = false;
						var el = $(this).closest('.select-box');

						if ( el.hasClass('open') ) {
							el.removeClass('open');
						} else {
							$('.select-box').removeClass('open');
							el.addClass('open');
						}
					});

					$select_list_li.on( 'click', function(e) {
						( e && e.stopPropagation ) ? e.stopPropagation() : e.cancelBubble = true;
						( e && e.preventDefault ) ? e.preventDefault() : e.returnValue = false;
						var el = $(this).closest('.select-box');

						el.find('.select-input').val( $(this).attr('data-value') );
						el.find('.select-desc-text').text( $(this).text() );
						el.removeClass('open');
					});

					
							// <ul class="select-list">
									// <li data-name="radiobox1" data-value="0">44-ФЗ</li>
									// <li data-name="radiobox1" data-value="1">223-ФЗ</li>
									// <li data-name="radiobox1" data-value="2">615-ПП (185-ФЗ)</li>
								// </ul>
					
					
				});
			}
		}
		
		function footer_resize() { 
			if ( $is_footer && $is_content ) { 
				var $footer_top_height = ( $is_footer_top ) ? $('.footer-top').outerHeight(true) : 0;
				var $footer_bottom_height = ( $is_footer_bottom ) ? $('.footer-bottom').outerHeight(true) : 0;
				var $height = $footer_top_height + $footer_bottom_height;
				$('.content').css({ 'padding-bottom' : $height + 'px' });
				$('.footer').css({ 'height' : $height + 'px', 'margin-top' : - $height + 'px' });
			}
		}
		
		function on_init() { 
			footer_resize();
			selectizer();
		}(on_init());

		function on_load() {
			footer_resize();
		}

		function on_resize() {
			footer_resize();
		}

		$(window).on('load', on_load );
		$(window).on('resize orientationchange', on_resize );
	});
})(jQuery);
