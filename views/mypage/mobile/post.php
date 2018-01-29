<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
 <!-- 목록의 오름차수 내림차수 정렬 스크립트 -->
<script> 
        $.fn.alternateRowColors = function() {
                    $('tbody tr:odd', this).removeClass('even').addClass('odd');
                    $('tbody tr:even', this).removeClass('odd').addClass('even');
                    return this;
        };
 
        $(document).ready(function() {
            $('table.td').each(function() {
                var $table = $(this);
                // 플러그인 호출
                $table.alternateRowColors();
 
                // 테이블 헤더 정렬
                $('th', $table).each(function(column) {
                    // 헤더의 CSS 클래스가 sort-alpha로 설정되어있다면, ABC순으로 정렬
                    if ($(this).is('.sort-alpha')) {
                        // 클릭시 정렬 실행
                        var direction = -1;
                        $(this).click(function() {
                            direction = -direction;
                            var rows = $table.find('tbody > tr').get(); // 현재 선택된 헤더관련 행 가져오기
                            // 자바스크립트의 sort 함수를 사용해서 오름차순 정렬
                            rows.sort(function(a, b) {
                                var keyA = $(a).children('td').eq(column).text().toUpperCase();
                                var keyB = $(b).children('td').eq(column).text().toUpperCase();
 
                                if (keyA < keyB) return -direction;
                                if (keyA > keyB) return direction;
                                return 0;
                            });
                            //정렬된 행을 테이블에 추가
                            $.each(rows, function(index, row) { $table.children('tbody').append(row) });
                            $table.alternateRowColors(); // 재정렬
                        });
                    }
                }); // end table sort
            }); // end each()
        });   // end ready()
</script> 

<article class="wrap01">
        <section class="main_title my_write">
            <h2>내 게 시 물</h2>
            <span>최근 6개월간 작성한 나의 게시물 입니다.</span>

            <!-- 목록영역 -->
                <table class="td">
                    <thead>
                        <tr>
                            <th class="sort-alpha">날 짜 ▼</th>
                            <th class="sort-alpha">제 목</th>
                            <th class="sort-alpha">종 류 ▼</th>
                        </tr>
                    </thead>
        <tbody class="middle_font">
        <?php
        if (element('list', element('data', $view))) {
            foreach (element('list', element('data', $view)) as $result) {
                
        ?>
            <tr>
                <!-- <td><?php echo element('num', $result); ?></td> -->
                <!-- <td><?php if (element('thumb_url', $result)) { ?><img class="media-object" src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('post_title', $result)); ?>" title="<?php echo html_escape(element('post_title', $result)); ?>" style="width:50px;height:40px;" /><?php } ?></td> -->
                <td><?php echo display_datetime(element('post_datetime', $result), 'full'); ?></td>
                <td><a href="<?php echo element('post_url', $result); ?>" target="new" title="<?php echo html_escape(element('post_title', $result)); ?>"><?php echo html_escape(element('post_title', $result)); ?></a>
    <?php if (element('post_comment_count', $result)) { ?><span class="label label-success"><?php echo element('post_comment_count', $result); ?> comments</span><?php } ?>
    <?php if (element('post_like', $result)) { ?><span class="label label-info">+ <?php echo element('post_like', $result); ?></span><?php } ?>
    <?php if (element('post_dislike', $result)) { ?><span class="label label-danger">- <?php echo element('post_dislike', $result); ?></span><?php } ?>
                </td>
                <td><?php echo element('brd_name', $result) ?></td>
            </tr>
        <?php
            }
        }
        if ( ! element('list', element('data', $view))) {
        ?>
            <tr>
                <td colspan="3" class="nopost">회원님이 작성하신 글이 없습니다</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <nav><?php echo element('paging', $view); ?></nav>
</div>
<!-- ad 영역 -->
<section class="ad">
    <a href="n">
        <?php echo banner("index_banner") ?>
    </a>
</section>
