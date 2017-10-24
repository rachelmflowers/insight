<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <div class="form-group">
        <label for="search" class="sr-only">
            <?php echo _x( 'Search for:', 'label' ) ?>
        </label>
        <input type="search" class="search-field form-control"
                placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
                value="<?php echo get_search_query() ?>" name="s"
                title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
        <button type="submit" class="search-submit">
            <i class="fa fa-search"></i>
        </button>
    </div>
</form>