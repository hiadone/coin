<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<head>
<title>휴대폰 본인확인</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="No-Cache">
<meta http-equiv="Pragma" content="No-Cache">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">
</head>
<body>

<form name="form_auth" method="post" target="auth_popup" action="<?php echo element('cert_url', element('niceconfig', $view)); ?>">

<input type="hidden" name="m" value="checkplusSerivce">                     <!-- 필수 데이타로, 누락하시면 안됩니다. -->
<input type="hidden" name="EncodeData" value="<?php echo element('enc_data', element('niceconfig', $view)); ?>">        <!-- 위에서 업체정보를 암호화 한 데이타입니다. -->
<input type="hidden" name="param_r1" value="<?php echo element('socialtype', element('niceconfig', $view)); ?>">
<input type="hidden" name="param_r2" value="<?php echo element('elh_mem_id', element('niceconfig', $view)); ?>">
 <a href="javascript:fnPopup();"> CheckPlus 안심본인인증 Click</a>
</form>

<script type="text/javascript">
    function fnPopup(){
    document.form_auth.submit();
}
</script>


</body>
</html>
