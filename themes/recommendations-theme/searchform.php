<form role="search" method="get" id="searchform"
    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <input type="text" class="site-header__form-input" value="<?php echo get_search_query(); ?>" name="s" id="s" />
        <button type="submit" class="site-header__search-button" id="searchsubmit"       value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </div>
</form>