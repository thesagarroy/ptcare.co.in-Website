<?php
/**
 * index.php — PT Healthcare WordPress Theme
 * Default fallback template. Shows the latest WordPress posts.
 * WordPress requires this file to exist in every theme.
 */

get_header();
?>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h1 class="text-4xl font-extrabold text-slate-900 mb-10">Latest Updates</h1>

    <?php if (have_posts()) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition'); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="aspect-video overflow-hidden">
                        <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover']); ?>
                    </div>
                <?php endif; ?>
                <div class="p-6">
                    <h2 class="text-xl font-bold text-slate-900 mb-2">
                        <a href="<?php the_permalink(); ?>" class="hover:text-bislaim transition"><?php the_title(); ?></a>
                    </h2>
                    <p class="text-slate-500 text-sm mb-4"><?php echo get_the_date(); ?></p>
                    <div class="text-slate-600 text-sm"><?php the_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 mt-4 text-sm font-bold text-bislaim hover:underline">
                        Read More <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>
        <?php endwhile; ?>
        </div>

        <div class="mt-12">
            <?php the_posts_pagination([
                'mid_size'  => 2,
                'prev_text' => '<i class="fa-solid fa-arrow-left"></i> Previous',
                'next_text' => 'Next <i class="fa-solid fa-arrow-right"></i>',
            ]); ?>
        </div>

    <?php else : ?>
        <p class="text-slate-500 text-lg">No posts found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
