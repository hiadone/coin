<?php
$i = 0;
if (element('latest', $view)) {
    foreach (element('latest', $view) as $key => $value) {
?>
        <li><a href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>">
            <h4><?php echo ($key+1)?>.</h4>
            <div> <?php if (element('is_new', $value)) { ?><img id='img_text' src="<?php echo base_url('/assets/images/new.png') ?>" ><?php } ?> <?php echo html_escape(element('title', $value)); ?></div>
            </a>
        </li>
<?php
    $i++;
    }
}

while ($i < element('latest_limit', $view)) {
?>
    <li>게시물이 없습니다</li>
<?php
    $i++;
}
