
$(document).ready(function(){
	// ham 메뉴 움직이는 스크립트
		var move = false;

		function ham_slide(){
			move = !move;
			if(move){
				$('.ham').animate({'right':'-320'} , 800);
				$('.ham > img').attr('src' , 'images/ham_btn.png');
			}else{
				$('.ham').animate({'right':'0'} , 800);
				$('.ham > img').attr('src' , 'images/ham_btn02.png');
			}
		}
		// ham 의 화살표 이미지 클릭시 ham 메뉴 움직이는 스크립트
			$('.ham > img').click(function(){
				ham_slide();
			});

		// 로그인 , 회원 가입 클릭시 ham 메뉴 움직이는 스크립트
			$('.enter').click(function(){
				ham_slide();
			});

		// 회원정보 클릭시 ham 메뉴 움직이는 스크립트
			$('.user_info').click(function(){
				ham_slide();
			});

		// 회원정보의 회원탈퇴 클릭시
			$('.good_bye').click(function(){
				$('.ham_cont').css('display' , 'none');
				$('.ham_out').css('display' , 'block');
			});

		// 회원탈퇴의 회원탈퇴 클릭시
			$('.good_bye02').click(function(){
				var result = confirm('정말로 회원탈퇴를 하시겠습니까? 탈퇴한 회원정보는 복구할 수 없으므로 신중히 선택하여주세요. 확인을 누르시면 탈퇴가 완료됩니다.');
				if(result){ 
				//yes
						$('.ham_cont').css('display' , 'none');
						$('.ham_login').css('display' , 'block');
						$('.login_list li').css('display' , 'block');
						$('.login_list li').not('.login_list li.enter').css('display' , 'none');
					}else{
				 //no
				  }
			});

		// 회원정보의 로그아웃 클릭시 
			$('.out').click(function(){
				
				$('.ham_login').css('display' , 'block');
				$('.login_list li').css('display' , 'block');
				$('.login_list li').not('.login_list li.enter').css('display' , 'none');
			});

		// 스크롤바 따라 다니는 스크립트
			var ham_top = parseInt($(".ham").css("top"));  
			$(window).scroll(function(){  
		        var pos = $(window).scrollTop(); // 현재 스크롤바의 위치값을 반환합니다.  
		        console.log(pos);
		        $(".ham").stop().animate({"top":pos+ham_top+"px"},500);  
	        });

	// 로그인 롤링 텍트스	
		var slider = $('.login_noice ul').bxSlider({
        mode:    'vertical',            // 슬라이드의 이동방향 설정 vertical,fade
		speed: 500, // m/s ex > 1000 = 1s
		easing: 'ease-in-out', // 동작 가속도 css와 동일
		sliderMargin: 10, // img 와 img 사이 간격
        startSlide: 0, // 시작시 로드될 이미지 (0부터 시작)
        preloadImages: 'visible', // 'visible'은 보여질때 이미지를 로드,'all'로 설정 하게 되면 모든 이미지가 로드되어야만 slide가 작동
        sliderMargin: 10, // img 와 img 사이 간격
        startSlide: 0, // 시작시 로드될 이미지 (0부터 시작)
        preloadImages: 'visible', // 'visible'은 보여질때 이미지를 로드,'all'로 설정 하게 되면 모든 이미지가 로드되어야만 slide가 작동
        randomStart: false, // 시작시 랜덤으로 이미지 로드 여부 (boolean)
        adaptiveHeight: false, //각 이미지의 높이에 따라 슬라이더 높이의 유동적 조절 여부
        adaptiveHeightSpeed: 500, //adaptiveHeight 동작속도,
        video: false,// slider에 video 사용여부, 사용할 시에 plugins/jquery.fitvids.js 파일 include 필요
        captions: false, // img 태그에 title속성값을 출력여부, 단 css .bx-wrapper .bx-caption 수정필요

	    //responsive method
	        responsive: true, // 반응형 지원 여부
	        touchEnabled: true,// 터치스와이프 기능 사용여부
	        swipeThreshold: 50, // 터치하여 스와이프 할때 변환 효과에 소모되는 시간 설정
	        onoToOneTouch: true, // fade효과가 아닌 슬라이드는 손가락의 접지상태에 따라 슬라이드를 움직일수있다.
	        preventDefaultSwipeX: false, //onoToOneTouch 에서 true일 경우, 손가락을따라 x축으로 움직일지에 대한 여부
	        preventDefaultSwipeY: false, //onoToOneTouch 에서 true일 경우, 손가락을따라 y축으로 움직일지에 대한 여부

	    //control method
	        controls: true, //좌, 우 컨트롤 버튼 출력  여부
	        auto: true, // 자동 재생 활성화.
	        autoControls: false, //자동재생 제어버튼 활성화 단, auto모드 활성화필요
	        autoControlsCombine: false, // 재생시 중지버튼 활성화(toggle)
	        pause: 4000, // 자동 재생 시 각 슬라이드 별 노출 시간
	        autoStart: true, // 페이지 로드가 되면, 슬라이드의 자동시작 여부
	        autoDirection: 'next', // 자동 재생시에 정순, 역순(prev) 방식 설정
	        autoHover: true, // 슬라이드 오버시 재생 중단 여부 (false : 오버무시)
	        autoDelay: 0, // 자동 재생 전 대기 시간 설정.
	        infiniteLoop: true, //마지막에 도달 했을시, 첫페이지로 갈 것인가 멈출것인가
	        //pagerCustom: '#bx-pager' // pager
	        prevText: '▲',
		});
		
		// 클릭시 멈춤 현상 해결 //
			$(document).on('click','.bx-next, .bx-prev , .bx-pager',function() {
				slider.stopAuto();
				slider.startAuto();
			});

		    $(document).bind('touchend' , function(){
		        slider.stopAuto();
		        slider.startAuto();
		    });

	// 이미지 슬라이드	
			var slider = $('#event ul').bxSlider({
	        mode:'horizontal',            // 슬라이드의 이동방향 설정 vertical,fade
			speed: 700, // m/s ex > 1000 = 1s
			easing: 'ease-in-out', // 동작 가속도 css와 동일
			sliderMargin: 10, // img 와 img 사이 간격
	        startSlide: 0, // 시작시 로드될 이미지 (0부터 시작)
	        preloadImages: 'visible', // 'visible'은 보여질때 이미지를 로드,'all'로 설정 하게 되면 모든 이미지가 로드되어야만 slide가 작동
	        sliderMargin: 10, // img 와 img 사이 간격
	        startSlide: 0, // 시작시 로드될 이미지 (0부터 시작)
	        preloadImages: 'visible', // 'visible'은 보여질때 이미지를 로드,'all'로 설정 하게 되면 모든 이미지가 로드되어야만 slide가 작동
	        randomStart: false, // 시작시 랜덤으로 이미지 로드 여부 (boolean)
	        adaptiveHeight: false, //각 이미지의 높이에 따라 슬라이더 높이의 유동적 조절 여부
	        adaptiveHeightSpeed: 500, //adaptiveHeight 동작속도,
	        video: false,// slider에 video 사용여부, 사용할 시에 plugins/jquery.fitvids.js 파일 include 필요
	        captions: false, // img 태그에 title속성값을 출력여부, 단 css .bx-wrapper .bx-caption 수정필요

		    //responsive method
		        responsive: true, // 반응형 지원 여부
		        touchEnabled: true,// 터치스와이프 기능 사용여부
		        swipeThreshold: 50, // 터치하여 스와이프 할때 변환 효과에 소모되는 시간 설정
		        onoToOneTouch: true, // fade효과가 아닌 슬라이드는 손가락의 접지상태에 따라 슬라이드를 움직일수있다.
		        preventDefaultSwipeX: false, //onoToOneTouch 에서 true일 경우, 손가락을따라 x축으로 움직일지에 대한 여부
		        preventDefaultSwipeY: false, //onoToOneTouch 에서 true일 경우, 손가락을따라 y축으로 움직일지에 대한 여부

		    //control method
		        controls: true, //좌, 우 컨트롤 버튼 출력  여부
		        auto: true, // 자동 재생 활성화.
		        autoControls: false, //자동재생 제어버튼 활성화 단, auto모드 활성화필요
		        autoControlsCombine: false, // 재생시 중지버튼 활성화(toggle)
		        pause: 4000, // 자동 재생 시 각 슬라이드 별 노출 시간
		        autoStart: true, // 페이지 로드가 되면, 슬라이드의 자동시작 여부
		        autoDirection: 'next', // 자동 재생시에 정순, 역순(prev) 방식 설정
		        autoHover: true, // 슬라이드 오버시 재생 중단 여부 (false : 오버무시)
		        autoDelay: 0, // 자동 재생 전 대기 시간 설정.
		        infiniteLoop: true, //마지막에 도달 했을시, 첫페이지로 갈 것인가 멈출것인가
		        //pagerCustom: '#bx-pager' // pager
			});

			$(document).on('click','.bx-next, .bx-prev , .bx-pager',function() {
				slider.stopAuto();
				slider.startAuto();
			});

		    $(document).bind('touchend' , function(){
		        slider.stopAuto();
		        slider.startAuto();
		    });

	// footer의 TOP 클릭시 맨 상단으로 이동
		$(".footer p span").click(function(){
			$('html,body').animate({'scrollTop' : '0'} , '1000');
		});

	//tab 메뉴(메인의) 스크립트
		$('.tab_cont > div').hide();
		$('.tab_cont > div:first-child').show();

		//tab메뉴 클릭시
			$('.menu_list li').click(function(){
			    	$(this).siblings('li').removeClass('active');
			    	$(this).addClass('active');

			    	$(this).parents("ul").siblings(".tab_cont").children(".tab_cont > div").hide();

			    	// 클릭한 메뉴의 순번 
			    	var index = $(this).index();

			    	// 클릭한 메뉴탭의 id 값
			    	var click_class = $(this).parents('ul').parents('section').attr('id');
			    	console.log(click_class);
			    	console.log(index);
			    	$("#" + click_class + " .tab_cont > div:eq(" + index + ")").css('display' , 'block');
			    	console.log($("#" + click_class + " .tab_cont > div:eq(" + index + ")").fadeIn());
			});

	// 팝업창 스크립트
		var popup_hei = $('html').height()+ 100;
			$('.pop').css('height' , popup_hei);

		// 스크롤바 따라 다니는 스크립트
			var currentPosition = parseInt($(".pop section").css("top"));  
			$(window).scroll(function(){  
		        var position = $(window).scrollTop(); // 현재 스크롤바의 위치값을 반환합니다.  
		        console.log(position);
		        $(".pop section").stop().animate({"top":position+currentPosition+"px"},500);  
	        });

		// 팝업창의 + 버튼 클릭시 입력창
		    $('.twit_pop li:first-child').click(function(){
		    	$('.twit_pop form').slideDown();
		    	$('.twit_pop li:first-child').css('display' , 'none');
		    	$('.twit_pop li:nth-child(2)').css('display' , 'none');
		    	$('.twit_pop li:last-child').css('display' , 'block');
		    });

		// 팝업창의 - 버튼 클릭시
		    $('.twit_pop li:nth-child(2)').click(function(){
		    	$('.twit_pop td span').css('display' ,'block');
		    	$('.twit_pop li:first-child').css('display' , 'none');
		    	$('.twit_pop li:nth-child(2)').css('display' , 'none');
		    	$('.twit_pop li:last-child').css('display' , 'block');
		    });

		// 체크버튼 클릭시 
		    $('.twit_pop li:nth-child(3)').click(function(){
		    	$('.pop form').slideUp();
		    	$('.twit_pop li:first-child').css('display' , 'block');
		    	$('.twit_pop li:nth-child(2)').css('display' , 'block');
		    	$('.twit_pop li:last-child').css('display' , 'none');
		    	$('.twit_pop td span').css('display' ,'none');
		    });

		// X 버튼 클릭시
		    $('.popup > span').click(function(){
		        $('.pop').fadeOut();
		        $('.popup').fadeOut();
		        	
		        setTimeout(function(){
		        	$('.pop form').slideUp();
					$('.twit_pop li:first-child').css('display' , 'block');
		    		$('.twit_pop li:nth-child(2)').css('display' , 'block');
		    		$('.twit_pop li:last-child').css('display' , 'none');
		    		$('.twit_pop td span').css('display' , 'none');
		    	},500);
		    });

		// 팝업창의 순번 넣기
		   	$('.twit_pop table tr').each(function(){
		    	var index_num ='0' + ($(this).index()+1) + '.';
		    	$(this).children("td:first-child").html(index_num);
		    });

		// 삭제버튼 클릭시
		    $('.twit_pop td span').click(function(){
		    	$(this).parents('td').parents('tr').remove();

		    	$('.twit_pop table tr').each(function(){
			    	var index_num = '0' + ($(this).index()+1) + '.';
			    	$(this).children("td:first-child").html(index_num);
		    	});
		    });
		    
		// 트위터(메인의) 더보기 클릭시   
	 		$('.twit .twit_add').click(function(){
			    $('.pop').fadeIn();
			    $('.twit_pop').fadeIn();
			        if($(this).parents("section").attr("id") == 'people_twit'){
			        	$('.twit_pop h4').text('인물트위터');
			        	$('.pop form input:first-child').attr('placeholder' , '인물트위터 명을 입력해 주세요.');

			        	$('.pop form input:first-child').blur(function(){
			        		$(this).attr('placeholder' , '인물트위터 명을 입력해 주세요.');
			        	});

			        }else if($(this).parents("section").attr("id") == 'coin_twit'){
			        	$('.twit_pop h4').text('공식 트위터');	
			        	$('.pop form input:first-child').attr('placeholder' , '공식 트위터 명을 입력해 주세요.');

			        	$('.pop form input:first-child').blur(function(){
			        		$(this).attr('placeholder' , '공식 트위터 명을 입력해 주세요.');
			        	});
			        }else if($(this).parents("section").attr("id") == 'coin_store'){
			        	$('.twit_pop h4').text('거래소 바로가기');
			        	$('.pop form input:first-child').attr('placeholder' , '거래소명을 입력해 주세요.');

			        	$('.twit_pop form input:first-child').blur(function(){
			        		$(this).attr('placeholder' , '거래소 명을 입력해 주세요.');
			        	});	
			        }
			});
			
	// post_table 의 순번 넣기 스크립트
				var tr_count = $(this).find('.post_table tr').length; 
				$(this).find('td:first-child').each(function(){
					if($(this).html() ==''){
						var table_count = tr_count - $(this).parents('tr').index();
						$(this).html(table_count);
					}
					
				});

	//post page 스크립트
			$('.post_page li').click(function(){
				if($(this).attr('id') == 'prev_all'){								// 맨처음으로 버튼 클릭시
					$('.post_page li').removeClass('page_active');
					$('.post_page li:nth-child(3)').addClass('page_active');

				}else if($(this).attr('id') == 'prev'){								// 한칸 앞으로 버튼 클릭시
					var pager_num = $('.post_page li.page_active').index() -1;
					if($('.post_page li').eq(pager_num).attr('class') != 'page_arrow'){
						$('.post_page li').removeClass('page_active');
						$('.post_page li').eq(pager_num).addClass('page_active');
					}

				}else if($(this).attr('id') == 'next_all'){							// 맨뒤로 버튼 클릭시
					var pager_num = $('.post_page li').length - 3;
					$('.post_page li').removeClass('page_active');
					$('.post_page li').eq(pager_num).addClass('page_active');

				}else if($(this).attr('id') == 'next'){								// 한칸뒤로 버튼 클릭시 
					var pager_num = $('.post_page li.page_active').index() +1
					if($('.post_page li').eq(pager_num).attr('class') != 'page_arrow'){
						$('.post_page li').removeClass('page_active');
						$('.post_page li').eq(pager_num).addClass('page_active');
					}

				}else if($(this).attr('class') != 'page_arrow'){
					$('.post_page li').removeClass('page_active');
					$(this).addClass('page_active');
				}
			});

	// 댓글영역 스크립트
		// 글자수 카운터 스크립트
			$('.reply_write textarea').keyup(function(){
				var reply_cont = $(this).val();
				$(this).siblings('span').html(reply_cont.length + '/1000');
			});

			$('.reply_write textarea').keyup();

		// 댓글의 글자수 초과시 팝업창 스크립트
			$('.reply_write textarea').keydown(function(){
				var reply_cont = $(this).val().length;
				if(reply_cont == 1000){
					alert('최대 1000자까지만 가능합니다.');
				}
			});

		// 글자수 카운터 스크립트
			$('.reply_modify textarea').keyup(function(){
				var reply_cont = $(this).val();
				$(this).siblings('span').html(reply_cont.length + '/1000');
			});

			$('.reply_modify textarea').keyup();

		// 댓글의 글자수 초과시 팝업창 스크립트
			$('.reply_modify textarea').keydown(function(){
				var reply_cont = $(this).val().length;
				if(reply_cont == 1000){
					alert('최대 1000자까지만 가능합니다.');
				}
			});

		// 수정버튼 클릭시 수정영역 보여주기 스크립트
			$('.modify').click(function(){
				$('.reply_modify').slideUp();
				var modify = $(this).parents('.reply_cont').siblings('.reply_modify');
				if(modify.css('display') == 'none'){
					$(modify).slideDown();
				}else if(modify.css('display') == 'block'){
					$(modify).slideUp();
				}
			});

		// 삭제버튼 클릭시 리스트에서 삭제 스크립트
			$('.clear').click(function(){
				$(this).parents('li').remove();
			});

	// 출석체크 스크립트
		$('.atten_date li').click(function(){
			$('.atten_date li').removeClass('active');
			$(this).addClass('active');
		});

		// 포인트 정책보기(이벤트의 출석체크) 클릭시
			$('.atten_write p.point').click(function(){
				$('.pop').fadeIn();
				 $('.popup').fadeIn();
			});

	// tabslide "많이 본 글" 스크립트
		$('.hot_tab .hot_cont').children().css('display', 'none');
			$('.hot_tab .hot_cont > div:first-child').css('display', 'block');
			$('.hot_tab .hot_menu > li:first-child').addClass('on');
			function tabonoff(o) {
				var index = $('.hot_tab .hot_menu > li').index(o);
				$(o).siblings().removeClass();
				$(o).addClass('on');
				$(o).parent().next('.hot_cont').children().css('display' , 'none').eq(index).css('display' , 'block');
			}
			(function(a){
				a.fn.tabonoff_auto=function(p){
					var s_t_i=p&&p.scroller_time_interval?p.scroller_time_interval:"3000"; //롤링타임 수정가능
					var dom=a(this); 
					var s_length=dom.length; 
					var timer; 
					var current = 0; begin(); play();
					function begin(){
						dom.click(function(){current = dom.index($(this)); play(); stop()});
						dom.parent().parent().hover(function(){stop();},function(){timer = setTimeout(play,s_t_i);});
					}
					function stop(){clearTimeout(timer);}
					function play(){
						clearTimeout(timer); tabonoff(dom[current]);
						if(current >= s_length-1){current = 0;} else{current ++;}
						timer = setTimeout(play,s_t_i);
					}
				}
			})(jQuery);
			$(".hot_tab > ul > li").tabonoff_auto();

		// 글쓰기 영역 글자수 카운터 스크립트
			$('.cont_write textarea').keyup(function(){
				var reply_cont = $(this).val();
				$(this).siblings('span').html(reply_cont.length + '/1000');
			});

			$('.cont_write textarea').keyup();

	// 글쓰기의 파일 업로드 스크립트
		var fileTarget = $(".cont_write input[type='file']");

		fileTarget.on('change', function(){
			if(window.FileReader){
		            	// 파일명 추출
		            	var filename = $(this)[0].files[0].name;
		            }else {
		            	// Old IE 파일명 추출
		            	var filename = $(this).val().split('/').pop().split('\\').pop();
		            };

		            $(this).siblings('.cont_write input.file').val(filename);
		            
		        });
});
