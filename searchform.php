<form class="form-menu" method="get" action="<?php echo home_url('/'); ?>">
    <input type="text" class="search-field" name="s" placeholder="Szukaj" value="<?php the_search_query(); ?>">
    <input type="submit" value="Szukaj">
</form>