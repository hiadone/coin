<script>
	$(document).ready(function(){
		var name_hei = $('html,body').height()-$('header').height() - 120;
		$('.name_wrap').css('height' , name_hei);
	});
</script>

<article class='content04 name_wrap' style="position: relative; margin: 0 auto;">
	<section class='nick_name'>
		<img src='http://cmy.bitcoissue.com/assets/images/logo.png'>
		<p class="nomal_font02">Bit Issue 에서 사용할 닉네임을 설정해 주세요.</p>

		<form action="http://www.bitcoissue.com/membermodify/defaultinfo" class="form-horizontal" name="fdefaultinfoform" id="fdefaultinfoform" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
			<input type="hidden" name="csrf_test_name" value="6c13f7c74ba6e06a3b963cd0c71404bb">
			<input type="hidden" id="mem_userid" name="mem_userid" value="-social_71731210">

			<label class="big_font">닉 네 임</label>
			<input type="text" id="mem_nickname" name="mem_nickname" value="aldduddk">
			<label class='name_notice'>※공백없이 한글, 영문, 숫자만 입력 가능 2글자 이상※</label>
			<button type="submit" class="big_font">닉 네 임 등 록</button> 
		</form>
	</section>

	<section class='welcome'>
		<img src='http://cmy.bitcoissue.com/assets/images/logo.png'>
		<p class="big_font">
			회원님의 정보가 변경 되었습니다<br>
			감사합니다.
		</p>

		<button class="big_font">
			홈 페 이 지 로 이 동
		</button>
	</section>
</article>

