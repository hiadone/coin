<article class="wrap01">
        <section class="main_title terms">
            <h2><?php echo html_escape(element('doc_title', element('data', $view))); ?></h2>
                <div class="document-etc">
                    <?php echo element('content', element('data', $view)); ?>
                </div>
        </section>
</article>


