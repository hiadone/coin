<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>휴대폰 본인확인</title>
</head>
<body>

<form name="form_auth" method="post" target="auth_popup" action="<?php echo element('cert_url', element('niceconfig', $view)); ?>">

<input type="hidden" name="m" value="checkplusSerivce">                     <!-- 필수 데이타로, 누락하시면 안됩니다. -->
<input type="hidden" name="EncodeData" value="<?php echo element('enc_data', element('niceconfig', $view)); ?>">        <!-- 위에서 업체정보를 암호화 한 데이타입니다. -->
<input type="hidden" name="param_r1" value="<?php echo element('post_id', element('niceconfig', $view)); ?>">
<input type="hidden" name="param_r2" value="<?php echo element('elh_mem_id', element('niceconfig', $view)); ?>">
</form>

<script type="text/javascript">
document.form_auth.submit();
</script>


</body>
</html>
