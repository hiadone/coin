jQuery(function($) {
    var $btn_side = $('.btn_side'),
        $side_menu = $('#side_menu'),
        $side_wr = $('#side_menu .side_wr'),
        side_obj = { my : {} },
        is_trans_sup = supportsTransitions();

    $side_wr.css({'right':'-320px'});   //초기화

    side_obj.destory = function(){
        if ( ! is_trans_sup ) return;
        side_obj.my.destroy();
    }
    side_obj.refresh = function(){
        if ( ! is_trans_sup ) return;
        side_obj.my.refresh();
    }

    function iscroll_loaded() {
        if ( is_trans_sup ){
            $side_wr.removeClass('add_side_wr');
            side_obj.my = new IScroll('#isroll_wrap', { bounceTime : false, mouseWheel: true, click: true, hScroll:false });
        }
    }

    $('#isroll_wrap').on('touchmove', function(e){
        e.preventDefault();
    });

    function supportsTransitions() {
        var b = document.body || document.documentElement,
            s = b.style,
            p = 'transition';

        if (typeof s[p] === 'string') { return true; }

        // Tests for vendor specific prop
        var v = ['Moz', 'webkit', 'Webkit', 'Khtml', 'O', 'ms'];
        p = p.charAt(0).toUpperCase() + p.substr(1);

        for (var i = 0; i < v.length; i++) {
            if (typeof s[v[i] + p] === 'string') { return true; }
        }

        return false;
    }

    $btn_side.on('click', function() {
        if ( ! get_toggle_enable()) {
            $btn_side.each(function(){$(this).data('toggle_enable', true)});
            view_mypage($(this).data('url'));
            $side_menu.show();
            $side_wr.animate({'right': '0px'}, 200, function(){
                height_update($(this));
                iscroll_loaded();
            });
        } else {
            remove_side_data();
        }
    });

    function height_update(target){
        var side_wr_height = target.height();
        $('body').css({'min-height': side_wr_height + 'px'});
    }

    function remove_side_data(){
        $btn_side.each(function(){$(this).data('toggle_enable', false)});
        $side_wr.animate({'right': '-320px'}, 160, function(){
            $side_menu.hide();
            $('body').css({'min-height':''});
            side_obj.my.destroy();
        });
    }

    $('#side_menu .side_wr').on('clickoutside', function(e){
        
        if ( ! $(e.target).closest('.btn_side').length && get_toggle_enable()){
        
            remove_side_data();
        }
    });

    var clickEventType= 'ontouchend' in document ? 'touchend' : 'click';

    if( clickEventType == 'touchend'){
        $(document).on(clickEventType, function(e){
            if ( $side_wr.has(e.target).length === 0 && $btn_side.data('toggle_enable')){
                remove_side_data();
            }
        });
    }

    $(document).on(clickEventType, '.subopen', function(){
        $submenu = $('.drop-downorder-' + $(this).attr('data-menu-order'));
        $submenu.toggle(function(){
            height_update($side_wr);
            side_obj.my.refresh();
        });
    });

    function view_mypage(url) {

        var comment_url = cb_url + url;
        var hash = window.location.hash;

        $('#view_member').load(comment_url, function() {
            if (hash) {
                var st = $(hash).offset().top;
                $('html, body').animate({ scrollTop: st }, 200); //200ms duration
            }
        });
    }

    function get_toggle_enable() {
        var is_toggle_enable=false;
        $btn_side.each(function(){
            if($(this).data('toggle_enable')) {
                is_toggle_enable=true;
                return;
            }
        });

        return is_toggle_enable;
    }

    

});
