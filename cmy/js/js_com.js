$(document).ready(function(){
			// ham 메뉴 영역 스크립트
				// ham 클릭시 ham_menu 이동 스크립트(메뉴 보여주기)
					$('header span:first-child img').click(function(){
						$('.cover_menu').css({'z-index':'200'});
						$('.cover_menu .cover').animate({'opacity' : '0.5'} , 500);
						$('.cover_menu .ham_cont').animate({'left' : '0'} , 700);
					});

				// ham 메뉴의 X버튼 클릭시 ham_menu이동 스크립트(메뉴 숨기기)
					$('.ham_cont img').click(function(){
						$('.cover_menu .cover').animate({'opacity' : '0'} , 500);
						$('.cover_menu .ham_cont').animate({'left' : '-85%'} , 700);
						
						setTimeout(function(){
			 				$('.cover_menu').css({'z-index':'-100'});
			 				$('.ham_cont ul').css({'display' : 'block'});
			 			},700);		
					});

				// ham 메뉴의 대메뉴 접기 펴기 스크립트
					$('.ham_cont ol > li').click(function(){						
					 	$(this).children('ul').slideToggle();
					 	if($(this).children('span').html()=='▼'){
							$(this).children('span').html('▲')
						}else{
							$(this).children('span').html('▼')
						}			 		
				 	});
		});