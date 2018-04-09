<!DOCTYPE HTML>
<html lang="ko">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <META name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="Description" content="">
  <meta name="robots" content="index,follow">
  <meta name="format-detection" content="telephone=no">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Cache-Control" content="no-cache">
  <meta http-equiv="Expires" content="-1">

  <title>더파워킹</title>
  
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" type="text/css" href="<?=$AD_DIR?>/css/style.css"/>
  <script src='http://code.jquery.com/jquery-latest.min.js' ></script>

  <script type="text/javascript">
	$(function () {
		$('#scrollToBottom').bind("click", function () {
			$('html, body').animate({ scrollTop: $(document).height() }, 500);
			return false;
		});
	});
	</script>
</head>

<body>
	<div class="container">
		<section><img src="<?=$AD_DIR?>/images/1.jpg"></section>
		<section><img src="<?=$AD_DIR?>/images/ani.gif"></section>
		<section><img src="<?=$AD_DIR?>/images/2.jpg"></section>
		<section><img src="<?=$AD_DIR?>/images/3.jpg"></section>
		<section><img src="<?=$AD_DIR?>/images/4.jpg"></section>
		<section><img src="<?=$AD_DIR?>/images/5.jpg"></section>
		<section><a href="javascript:();" id="scrollToBottom"><img src="<?=$AD_DIR?>/images/btn1.jpg"></a></section>
		<section><img src="<?=$AD_DIR?>/images/6.jpg"></section>
		<section><img src="<?=$AD_DIR?>/images/7.jpg"></section>
		<section><img src="<?=$AD_DIR?>/images/8.jpg"></section>
		<section><img src="<?=$AD_DIR?>/images/9.jpg"></section>
		<section><img src="<?=$AD_DIR?>/images/10.jpg"></section>
		<section id="inDB">
			<table>
				<colgroup>
					<col width="">
					<col width="">
				</colgroup>
				<tbody>
					<tr>
						<th>이름</th>
						<td><input type="text" class="form-class" name="M_NAME" id="M_NAME"></td>
					</tr>
					<tr>
						<th>나이</th>
						<td><input type="number" class="form-class" name="M_AGE" id="M_AGE" style="width:auto; float:left;"> <label style="position:relative;float:left; top:10px; left:10px;">세</label></td>
					</tr>
					<tr>
						<th>연락처</th>
						<td><input type="tel" class="form-class" name="M_HP" id="M_HP"></td>
					</tr>
					<tr>
						<th>문의사항</th>
						<td>
							<textarea class="form-class" rows="5" id="M_QUESTION"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="t-center">
							<div class="checkbox">
								<input type="checkbox" name="" id="agree" checked> <label for="agree">개인정보 수집 및 이용동의</label>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</section>
		<p><a onclick="APPLY_SUBMIT();"><img src="<?=$AD_DIR?>/images/btn2.jpg"></a></p>

	</div>


<script type="text/javascript">
	var CODE_NAME  = "<?=$CODE_NAME?>";
	var MEDIA_CODE = "<?=$MEDIA_CODE?>";
	var USER_AGENT = "<?=$_SERVER['HTTP_USER_AGENT']?>";
	var REFERER_CODE_NAME  = "<?=$REFERER_CODE_NAME?>";
	var REFERER_MEDIA_CODE = "<?=$REFERER_MEDIA_CODE?>";
	
	var APPLY_SUBMIT = function () {
		
		if ( $("#agree").is(':checked') == false ) {
			alert("개인정보 수집 및 이용동의하셔야 상담을 신청하실수 있습니다.");
			return false;           
		}
	
		var M_NAME   = $("[id=M_NAME]").val();
		var M_AGE    = $("[id=M_AGE]").val();
		var M_HP     = $("[id=M_HP]").val();
		var M_QUESTION = $("[id=M_QUESTION]").val();
		
		if ( M_NAME == "" ) { alert( "이름을  입력해주십시요."); $("[id=M_NAME]").focus(); return false; }
		if ( M_AGE == "" ) { alert( "나이를 입력해주십시요."); $("[id=M_AGE]").focus(); return false; }
		if ( M_HP == "" ) { alert( "전화번호를 입력해주십시요."); $("[id=M_HP]").focus();return false; }
		if ( M_QUESTION == "" ) { alert( "문의사항을 입력해주십시요."); $("[id=M_QUESTION]").focus();  return false; }

		$.post('/include/process/INSERT_DATA.php',  { CODE_NAME:CODE_NAME , USER_AGENT:USER_AGENT , MEDIA_CODE:MEDIA_CODE , 
													  M_HP:M_HP , M_NAME:M_NAME , M_AGE:M_AGE , M_QUESTION:M_QUESTION , 
													  XFOR:"<?=$_SERVER['HTTP_X_FORWARDED_FOR']?>" , 
													  REFERER_CODE_NAME:REFERER_CODE_NAME , REFERER_MEDIA_CODE:REFERER_MEDIA_CODE
		}, function(data){
		alert("신청 되었습니다.");     
		$("#M_HP").val("");
		$("#M_NAME").val("");
		$("#M_AGE").val("");
		$("#M_QUESTION").val("");
				
		return true;
		})
	}
</script>
</body>
</html>