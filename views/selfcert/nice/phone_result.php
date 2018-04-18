<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>휴대폰 본인확인</title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<?php if(element('selfcert_result', $view) === 'success'){ ?>
                <?php
                $attributes = array('class' => 'form-horizontal', 'name' => 'fsocial', 'id' => 'fsocial');
                echo form_open('', $attributes);
                ?>
                <input type="hidden" name="logintype" id="logintype" value="register">
                <input type='hidden' name="mem_recommend" id="mem_recommend" value="<?php echo $this->input->post('param_r2', null, 0) ?>">
                 <?php echo form_close(); ?>
    <script type="text/javascript">
    $(function() {
        var $opener = window.opener;
        $opener.$("input[name=selfcert_type]").val("<?php echo element('selfcert_type', $view); ?>");
        $("#fsocial").attr("action", '/social/' + $opener.$("input[name=socialtype]").val() + '_login/');
        alert("<?php echo element('message',element('selfcertinfo', $view)); ?>");
        $("#fsocial").submit();
    <?php if (element('redirecturl', $view)) { ?>
        $opener.location.href='<?php echo element('redirecturl', $view); ?>';
    <?php } ?>
        // window.close();
    });
    </script>
<?php } else {?>
    <script type="text/javascript">
    $(function() {
        var $opener = window.opener;
        alert("<?php echo element('message',element('selfcertinfo', $view)); ?>");
    <?php if (element('redirecturl', $view)) { ?>
        $opener.location.href='<?php echo element('redirecturl', $view); ?>';
    <?php } ?>
        window.close();
    });
    </script>

<?php } ?>
</head>
<body>

 


</body>
</html>
