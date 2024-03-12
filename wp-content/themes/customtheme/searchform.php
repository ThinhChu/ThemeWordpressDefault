<div class="bor17 of-hidden pos-relative">
    <form method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>" >
        <input type="search" class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" name="s" value="<?php echo get_search_query(); ?>" id="s" placeholder="<?php _e('Tìm kiếm', 'custom'); ?>">

        <button type="submit" class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
            <i class="zmdi zmdi-search"></i>
        </button>
    </form>
</div>