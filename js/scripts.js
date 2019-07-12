$(document).ready(function(){
   /* Start Carousel */
		$('#featured-posts').carouFredSel({
			auto: true,
					prev: '#prev2',
					next: '#next2',
            scroll : {
             duration        : 1000,
             pauseOnHover    : true
            }
		});
		/* End Carousel */
		
		
		/* Start Orbit Slider */
		$(window).load(function() {
			$('.post-gallery').orbit({
				animation: 'fade',
			});
		});
		/* End Orbit Slider */
			
			
		/* Start Super fish */
		jQuery(document).ready(function(){
			jQuery('ul.sf-menu').superfish({
				delay:         100,
				speed:         'fast',
				speedOut:      'fast',
			});
		});
		/* End Of Super fish */
			
   $('ul.pagination a, .reply').css({
      background: '#343434',
      color: '#FFF',
      'font-size': '14px',
      padding: '10px',
      'padding-left': '15px',
      'padding-right': '15px',
      'font-weight': 'bold' 
   });
   $('ul.pagination .current').css({
       background: '#2ecc71',
       color: '#FFFFFF',
       'font-size': '14px',
      padding: '10px',
      'padding-left': '15px',
      'padding-right': '15px',
      'font-weight': 'bold' 
   });    
   $('ul.pagination .next, ul.pagination .prev').css({
       display: 'none'
   });    
   $('input#submit').css({
      background: '#343434', 
      border: 'none',
      color: '#FFFFFF',
      'font-weight': 700,
      'text-transform': 'capitalize',
      'font-size': '14px',
      padding: '10px',
      cursor: 'pointer'
   });  
   $('input#submit').addClass('ntSaveFormsSubmit');    
   $('input#submit, .reply').mouseover(function(){
      $(this).css({
           background: '#2ecc71'
      });     
   });
   $('input#submit, .reply').mouseout(function(){
      $(this).css({
           background: '#343434'
      });     
   });
   $('ul.commentlist li').css({
       'margin-bottom': '40px'
   });   
   $('ul.commentlist li .wrapper').css({
     display: 'flex',
    'flex-direction': 'row',
    'justify-content': 'space-between',
    'margin-top': '15px'
   });
    $('.reply a').css({
        color: '#fff'
    });
    $('.list_carousel li').css({
           'margin-right': '0',
            width: '310px'
    });
    $('ul.register li>a').attr('target', '_blank');
});