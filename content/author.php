<div class="author-bio">
    <h2 class="author-title">
        <?php echo get_the_author() ?>
    </h2>
    <p class="author-description">
        <?php the_author_meta( 'description' ); ?>
        <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
            rel="author">Więcej postów
        </a>
    </p>
</div>