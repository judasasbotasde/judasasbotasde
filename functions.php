add_filter( 'upload_mimes', 'custom_mime_types', 1, 1 );
function custom_mime_types( $mime_types ) {
$mime_types['jfif'] = 'image/jfif+xml';

return $mime_types;
}

add_post_type_support( 'page', 'excerpt' );

if (!is_admin()) {
    function wse_search_filter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }
    add_filter('pre_get_posts','wse_search_filter');
}