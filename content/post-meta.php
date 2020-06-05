<?php
$date   = date_i18n(get_option('date_format'), strtotime(get_the_date('r')));
$author = get_the_author();

$postMeta = __('Published on', 'founder') . ' <span class="post-meta__date">' . $date . '</span> ';

$categories = get_the_category($post->ID);

if ($categories) {
    $postMeta .= __("in", "founder") . ' ';
    $categoryCount = 1;
    foreach ($categories as $category) {
        if ($categoryCount > 1) {
            $postMeta .= '<span class="post-meta__category-separator"></span>';
        }
        $postMeta .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" title="' . esc_attr(sprintf(__('View all posts in %s', 'founder'), $category->name)) . '" class="post-meta__category-link">' . esc_html($category->cat_name) . '</a>';
        $categoryCount = $categoryCount + 1;
    }
}
?>

<div class="post-meta">
    <p><?php echo $postMeta; ?></p>
</div>