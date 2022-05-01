<?php

class Resource_List {

    private $posts_per_page = 12;
    private $loadmore_posts_per_page = 12;

    function __construct() {
        add_action("wp_ajax_rff_ajax", array(&$this, 'rff_ajax'));
        add_action("wp_ajax_nopriv_rff_ajax", array(&$this, 'rff_ajax'));
        add_filter('pre_get_posts', array(&$this, 'limit_posts_per_page'));
    }

    public function limit_posts_per_page($query) {
        if (is_admin() && defined('DOING_AJAX') && DOING_AJAX && ($query->get('am_rf_action') == 'yes')) {
            $paged = $query->query_vars['paged'];
            $first_page_limit = $query->query_vars['posts_per_page'];
            $limit = $query->query_vars['loadmore_posts_per_page'];
            if ($paged == 1) {
                $limit = $first_page_limit;
            } else {
                $offset = $first_page_limit + (($paged - 2) * $limit);
                $query->set('offset', $offset);
            }
            $query->set('posts_per_page', $limit);
        }
        return $query;
    }

    private function build_query_args($postData) {
        $paged = ($postData['paged'] <= 0) ? 1 : (int) $postData['paged'];

        if(!empty($postData['exclude_items'])){
            $exlude_items_to_array = explode(',', $postData['exclude_items']);
        }
		if(!empty($postData['change_limit'])){
            $resource_limit = $postData['change_limit'];
        } else{
            $resource_limit = $this->posts_per_page;
        }
        
        $args = array(
            'post_type' => array('resources', 'post'),
            'posts_per_page' => $resource_limit,
            'am_rf_action' => 'yes',
            'loadmore_posts_per_page' => $this->loadmore_posts_per_page,
            'post_status' => 'publish',
            'paged' => $paged,
            's' => $postData['resource_search'],
            'post__not_in' => $exlude_items_to_array
        );

        if (!empty($postData['categories'])):
            $args['category__in'] = $postData['categories'];
        endif;
        if (!empty($postData['types'])):
            if( count( $postData['types'] ) == 1 && $postData['types'][0] == 'blog' ): 
                $args['post_type'] = 'post';
            else: 
                $args['meta_query'][] = array('key' => 'asset_type', 'value' => $postData['types'], 'compare' => 'IN');
            endif;
        endif;
        return $args;
    }

    public function rff_ajax() {
        $postData = $_POST;
        $args = $this->build_query_args($postData);
        global $wp_query;
        $wp_query = new WP_Query($args, true);
        ob_start();
        include get_stylesheet_directory() . '/templates/resource/resource_lists_ajax.php';
        $content = ob_get_clean();
        $postslisted = ($this->posts_per_page + ((($args['paged'] + 1) - 2) * $wp_query->query_vars['loadmore_posts_per_page']));
        $hasMore = ($wp_query->found_posts > $postslisted) ? true : false;
        $paged = ($wp_query->found_posts > $postslisted) ? ($args['paged'] + 1) : 1;
        echo json_encode(array('postslisted' => $postslisted, 'hasMore' => $hasMore, 'paged' => $paged, 'content' => $content, "found_posts" => $wp_query->found_posts));
        exit;
    }

}

global $Resource_List;
$Resource_List = new Resource_List();
