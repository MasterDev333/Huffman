<?php
define('COMPANY', 'raydiant');
define('LEVER_KEY', 'TXYqJBCtBcnV2XaD6yC_');

add_image_size('blog-image', 1010, 395, true);
add_image_size('blog-image-2x', 2020, 790, true);

add_image_size('related-post-thumbnail', 314, 514, true);
add_image_size('related-post-thumbnail-2x', 628, 1028, true);

add_image_size('video-post', 314, 154, true);
add_image_size('video-post-2x', 628, 308, true);

add_image_size('avatar', 64, 64, true);
add_image_size('avatar-2x', 128, 128, true);

add_image_size('content-image', 620, 630, true);
add_image_size('content-image-2x', 1240, 1260, true);

add_image_size('two-column-image', 1220, 588, true);
add_image_size('two-column-image-2x', 2440, 1176, true);

add_image_size('integration-slider', 311, 311, true);
add_image_size('integration-slider-2x', 622, 622, true);

add_image_size('join-banner', 1452, 474, true);
add_image_size('join-banner-2x', 2904, 948, true);

add_image_size('join-banner-mobile', 335, 248, true);
add_image_size('join-banner-mobile-2x', 670, 496, true);


function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
		);
}

add_action( 'wp_head', 'my_wp_ajaxurl' );
function my_wp_ajaxurl() {
	$url = parse_url( home_url( ) );
	if( $url['scheme'] == 'https' ){
	   $protocol = 'https';
	}
	else{
	    $protocol = 'http';
	}
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php', $protocol ); ?>';
    </script>
    <?php
}


/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the tempalte as $template_args array
 * @param string filepart
 * @param mixed wp_args style argument list
 * https://wordpress.stackexchange.com/questions/176804/passing-a-variable-to-get-template-part
 */
function get_template_part_args( $file, $template_args = array(), $cache_args = array() ) {
    $template_args = wp_parse_args( $template_args );
    $cache_args = wp_parse_args( $cache_args );
    if ( $cache_args ) {
        foreach ( $template_args as $key => $value ) {
            if ( is_scalar( $value ) || is_array( $value ) ) {
                $cache_args[$key] = $value;
            } else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
                $cache_args[$key] = call_user_method( 'get_id', $value );
            }
        }
        if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {
            if ( ! empty( $template_args['return'] ) )
                return $cache;
            echo $cache;
            return;
        }
    }
    $file_handle = $file;
    do_action( 'start_operation', 'hm_template_part::' . $file_handle );
    if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
        $file = get_stylesheet_directory() . '/' . $file . '.php';
    elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
        $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require( $file );
    $data = ob_get_clean();
    do_action( 'end_operation', 'hm_template_part::' . $file_handle );
    if ( $cache_args ) {
        wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
    }
    if ( ! empty( $template_args['return'] ) )
        if ( $return === false )
            return false;
        else
            return $data;
    echo $data;
}

/*
 * name: var_dump_pre
 * description: formated var_dump
 * 
 * */
function var_dump_pre( $var, $title='', $color = 'white', $dump = FALSE ){
    ?>

    <?php
    $style = 'clear:both;overflow:auto;border:1px solid #BFBFBF; margin-top:10px; padding-left:3px;padding-bottom:3px;background-color:'.$color;
    echo '<div class="debug" style="'. $style .'" >';
    $db = debug_backtrace();
    //echo 'function: '.$db[0]['file'].' @ line:['.$db[0]['line'].']';
    $file  = strrev(implode(strrev(' /<span style="color:black">'), explode("/", strrev($db[0]['file']), 2)));
    $file .= '</span>'; 
    echo '<div style="width:100%; margin-left:-3px; color:#969696;background-color:#F0F0F0;padding:3px 0px 3px 3px"><small><span style="color:black">file: </span>'.$file.' <br />@<br /><span style="color:black">line:['.$db[0]['line'].']</span></small></div>';
    echo '<pre>';

    if( $title !='' )
        echo '<div style="width:100%; margin-left:-3px; background-color:#E5E5F8;padding:3px 0px 3px 3px"><strong>'.$title.':</strong></div><br />';
    
    if( $dump || is_bool( $var )){
        if( is_bool( $var )){
                    
            switch ( $var ){
                case TRUE:
                    echo '<span style="color:green">'; var_dump( $var ); echo '</span>';
                break;
                
                case FALSE:
                    echo '<span style="color:red">'; var_dump( $var );echo '</span>';
                break;
            }
        }
        else
            var_dump( $var );
    }
    else
        print_r( $var );
    echo '</pre>';
    echo '</div>';
    echo '<div style="clear:both"></div>';
}


/**
 * Returns all child nav_menu_items under a specific parent
 *
 * @param int the parent nav_menu_item ID
 * @param array nav_menu_items
 * @param bool gives all children or direct children only
 * @return array returns filtered array of nav_menu_items
 */
function get_nav_menu_item_children($parent_id, $nav_menu_items, $depth = true) {
    $nav_menu_item_list = array();
    foreach ((array) $nav_menu_items as $nav_menu_item) {
        if ($nav_menu_item->menu_item_parent == $parent_id) {
            $nav_menu_item_list[] = $nav_menu_item;
            if ($depth) {
                if ($children = get_nav_menu_item_children($nav_menu_item->ID, $nav_menu_items)) {
                    $nav_menu_item_list = array_merge($nav_menu_item_list, $children);
                }
            }
        }
    }
    return $nav_menu_item_list;
}



// Header Menu
function clean_header_menu( $theme_location ) {
    if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items( $menu->term_id );

        $menu_list = '';

        $count = 0;
        $submenu = false;
        $post_id = get_the_ID();
        
        $last_menu_item = end( $menu_items );

        foreach( $menu_items as $menu_item ) {
            $link = $menu_item->url;
            $title = $menu_item->title;
            $id = get_post_meta( $menu_item->ID, '_menu_item_object_id', true );

            $menu_icon = get_field( 'icon', $id );
            $cols = get_field( 'column_count', $id );
            $is_wrapper = get_field( 'is_wrapper', $id );
            $is_heading = get_field( 'is_heading', $id );
            $is_text = get_field( 'is_text', $id );

            $menu_icon_url = $menu_icon['url'];
            $menu_icon_alt = $menu_icon['alt'];

            $class_names = $value = '';

            $classes = empty($menu_item->classes) ? array() : (array) $menu_item->classes;

            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item));
            // If parent menu
            if (!$menu_item->menu_item_parent) {
                $parent_id = $menu_item->ID;
                if(get_nav_menu_item_children($parent_id, $menu_items)) {
                    $menu_list .= '<li class="has-mega-menu ' . join(' ', $menu_item->classes) . '">' . "\n";
                } else{
                    $menu_list .= '<li class="' . ( ( $id == $post_id ) ? 'current-menu-item' : '' ) . '">' . "\n";
                }
                $menu_list .= '<a href="' . $link . '">' . $title . '</a>' . "\n";
                
                if (get_nav_menu_item_children($parent_id, $menu_items)) {
                    $menu_list .= '<ul class="mega-menu"><li>' . "\n";
                    $submenu = true;
                }
            }
            // is child menu
            if ($parent_id == $menu_item->menu_item_parent) {
                $level_2_menu_id = $menu_item->ID;
                if( $is_wrapper ) {
                    $menu_list .= '<div class="col ' . join( ' ', $menu_item->classes ) . '">';
                    $level_2_childrens = get_nav_menu_item_children($level_2_menu_id, $menu_items);
                    $level_3_submenu = false;
                    if ( $level_2_childrens ) {
                        if( in_array( 'col-sub', $menu_item->classes ) ) {
                            $menu_list .= '<ul class="sub-menu">';
                        }
                        foreach ($level_2_childrens as $level_3_single_menu) {
                            if ( $level_2_menu_id == $level_3_single_menu->menu_item_parent ) {
                                // Is heading
                                if( get_field( 'is_heading', $level_3_single_menu->ID ) ) {
                                    $menu_list .= '<h3>' . $level_3_single_menu->title . '</h3>';
                                } 
                                // Is text
                                elseif( get_field( 'is_text', $level_3_single_menu->ID ) ) {
                                    $menu_list .= '<p>' . $level_3_single_menu->title . '</p>';
                                }
                                // Is button
                                elseif( get_field( 'is_button', $level_3_single_menu->ID ) ) {
                                    $menu_list .= '<div class="btn-block"><a href="' . $level_3_single_menu->url . '" class="' . join( ' ', $level_3_single_menu->classes ) . '">' . $level_3_single_menu->title . '</a></div>';
                                } 
                                else {
                                    $menu_list .= '<li><a href="' . $level_3_single_menu->url . '" class="' . join( ' ', $level_3_single_menu->classes ) . '">';
                                    if( $icon = get_field( 'icon', $level_3_single_menu->ID ) ) {
                                        $menu_list .= '<i class="ico"><img src="' . $icon['url'] . '" width="24" height="24" alt="' . $icon['alt'] . '"></i>';
                                    }
                                    $menu_list .= $level_3_single_menu->title . '</a>';

                                    $level_3_menu_id = $level_3_single_menu->ID;
                                    $level_3_childrens = get_nav_menu_item_children($level_3_menu_id, $menu_items);

                                    if ( $level_3_childrens ) {
                                        $menu_list .= '<ul>';
                                        foreach ($level_3_childrens as $level_4_single_menu) {
                                            $menu_list .= '<li><a href="' . $level_4_single_menu->url . '" class="' . join(' ', $level_4_single_menu->classes) . '">';
                                            if ($icon = get_field('icon', $level_4_single_menu->ID)) {
                                                $menu_list .= '<i class="ico"><img src="'. $icon['url'] .'" width="24" height="24" alt="'. $icon['alt'] .'" /></i>';
                                            }
                                            $menu_list .= $level_4_single_menu->title . '</a></li>';
                                        }
                                        $menu_list .= '</ul>';
                                    }
                                    $menu_list .= '</li>';
                                }
                            }
                        }
                        if( in_array( 'col-sub', $menu_item->classes ) ) {
                            $menu_list .= '</ul>';
                        }
                    } 
                    $menu_list .= '</div>';
                } else {
                    $menu_list .= '<li><a href="' . $link . '">';
                    if( $menu_icon ) {
                        $menu_list .= '<i class="icon"><img src="' . $menu_icon_url . '" alt="' . $menu_icon_alt . '" width="24" height="24" /></i>';
                    }
                    $menu_list .= '</a></li>';
                }
            } 

            if($last_menu_item->ID == $menu_items[$count]->ID){
                if($submenu){
                    $menu_list .= '</ul>' . "\n";
                }
            }

            if (isset($menu_items[$count + 1]) && ( 0 == $menu_items[$count + 1]->menu_item_parent )) {

                if($submenu){
                    $menu_list .= '</li></ul>' . "\n";
                }

                $menu_list .= '</li>' . "\n";

                $submenu = false;
            }

            $count++;
        }
    } else {
        $menu_list = '<!-- no menu defined in location "' . $theme_location . '" -->';
    }
    echo $menu_list;
}

// Footer Menu
function clean_footer_menu($theme_location) {

    if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {

        $menu = get_term($locations[$theme_location], 'nav_menu');
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $menu_list = '';

        $count = 0;
        $submenu = false;

        foreach ($menu_items as $menu_item) {
            $link = $menu_item->url;
            $title = $menu_item->title;

            $class_names = $value = '';

            $classes = empty($menu_item->classes) ? array() : (array) $menu_item->classes;

            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item));

            if (!$menu_item->menu_item_parent) {
                $parent_id = $menu_item->ID;

                $menu_list .= '<div class="footer-col">' . "\n";

                $menu_list .= '<span class="footer-col_title">' . $title . '</span>' . "\n";

            }

            if ($parent_id == $menu_item->menu_item_parent) {

                if (!$submenu) {
                    $submenu = true;

                    $menu_list .= '<ul class="footer-col_nav">' . "\n";
                }

                $menu_list .= '<li><a href="'. $link .'" class="' . $class_names . '">'. $title .'</a></li>' . "\n";

                if ($menu_items[$count + 1]->menu_item_parent != $parent_id && $submenu) {
                    $menu_list .= '</ul>' . "\n";
                    $submenu = false;
                }
            }

            if (isset($menu_items[$count + 1]) && ( 0 == $menu_items[$count + 1]->menu_item_parent )) {
                $menu_list .= '</div>' . "\n";
            }

            $count++;
        }

        $menu_list .= '</div>' ."\n";
    } else {
        $menu_list = '<!-- no menu defined in location "' . $theme_location . '" -->';
    }
    echo $menu_list;
}

function get_payjoy_api_jobs() {
    $results = array();
    $transient_data = get_transient('api_jobs_data');
    if ($transient_data) {
        return $transient_data;
    }
    $response = wp_remote_get('https://api.lever.co/v0/postings/'.COMPANY.'?skip=&limit=&mode=json', array(
            )
    );

    if (is_wp_error($response)) {
        return $results;
    } else {
        $body = wp_remote_retrieve_body($response);
        $result_data = json_decode($body);
        if (isset($result_data[0]->id) && !empty($result_data)) {
            set_transient('api_jobs_data', $result_data, 300); // for 5 minutes
        }
        return $result_data;
    }
}

// get job detail from API
function retrieve_api_job($job_id = ''){
	
	if(empty($job_id)){
		return false;
	}
	$response_data = wp_remote_get( "https://api.lever.co/v0/postings/".COMPANY."/".$job_id,
				array(
					'timeout'     => 120,
				)
			);
	if ( is_wp_error( $response_data ) ) {
		//$response_data->get_error_message();
		return false;
	} else {
		$body = wp_remote_retrieve_body( $response_data );
		
		$reponse = json_decode( $body );
		return $reponse;
	}
}

function is_usa_address_state( $address = ''){
	$found = false;
	$state_list = array('AL'=>"Alabama",  
				'AK'=>"Alaska",  
				'AZ'=>"Arizona",  
				'AR'=>"Arkansas",  
				'CA'=>"California",  
				'CO'=>"Colorado",  
				'CT'=>"Connecticut",  
				'DE'=>"Delaware",  
				'DC'=>"District Of Columbia",  
				'FL'=>"Florida",  
				'GA'=>"Georgia",  
				'HI'=>"Hawaii",  
				'ID'=>"Idaho",  
				'IL'=>"Illinois",  
				'IN'=>"Indiana",  
				'IA'=>"Iowa",  
				'KS'=>"Kansas",  
				'KY'=>"Kentucky",  
				'LA'=>"Louisiana",  
				'ME'=>"Maine",  
				'MD'=>"Maryland",  
				'MA'=>"Massachusetts",  
				'MI'=>"Michigan",  
				'MN'=>"Minnesota",  
				'MS'=>"Mississippi",  
				'MO'=>"Missouri",  
				'MT'=>"Montana",
				'NE'=>"Nebraska",
				'NV'=>"Nevada",
				'NH'=>"New Hampshire",
				'NJ'=>"New Jersey",
				'NM'=>"New Mexico",
				'NY'=>"New York",
				'NC'=>"North Carolina",
				'ND'=>"North Dakota",
				'OH'=>"Ohio",  
				'OK'=>"Oklahoma",  
				'OR'=>"Oregon",  
				'PA'=>"Pennsylvania",  
				'RI'=>"Rhode Island",  
				'SC'=>"South Carolina",  
				'SD'=>"South Dakota",
				'TN'=>"Tennessee",  
				'TX'=>"Texas",  
				'UT'=>"Utah",  
				'VT'=>"Vermont",  
				'VA'=>"Virginia",  
				'WA'=>"Washington",  
				'WV'=>"West Virginia",  
				'WI'=>"Wisconsin",  
				'WY'=>"Wyoming");
	if(!empty($address)){
		foreach($state_list as $key=>$value){
			//if(stripos($state, $key) !== false){
			if (preg_match('/\b'.$key.'\b/', $address)) {
				$found = true;
				break;
			}
		}
	}
	return $found;			
				
}

// using curl post application form data to API
add_action('wp_ajax_submit_application_to_api', 'submit_application_to_api');
add_action('wp_ajax_nopriv_submit_application_to_api', 'submit_application_to_api');

function submit_application_to_api(){
	
	// make some validation	
	if ( ! isset( $_POST['validate_post_app_data'] ) || ! wp_verify_nonce( $_POST['validate_post_app_data'], 'validate_app_data' ) ) {
		echo json_encode(array('status'=>'error', 'message'=>'Sorry, your nonce did not verify'));
		wp_die();	   
	}
	if(empty($_POST['job_id'])){
		wp_send_json(array('status'=>'error', 'message'=>'No job found'));
		
	}
	
	if(empty($_POST['full_name'])){
		wp_send_json(array('status'=>'error', 'message'=>'Please enter full name'));		
	}
	
	if(empty($_POST['email'])){
		wp_send_json(array('status'=>'error', 'message'=>'Please enter email'));
		
	}
	// is email is valid
	if ( !is_email( $_POST['email'] ) ) {
		wp_send_json(array('status'=>'error', 'message'=>'Please enter valid email'));
		
	}
	if(empty($_POST['phone'])){
		wp_send_json(array('status'=>'error', 'message'=>'Please enter phone number'));
	}
	if(empty($_POST['company'])){
		wp_send_json(array('status'=>'error', 'message'=>'Please enter company name'));
	}
	if(empty($_POST['message'])){
		wp_send_json(array('status'=>'error', 'message'=>'Please enter messages'));
	}
	

	$api_url = "https://api.lever.co/v0/postings/".COMPANY."/".$_POST['job_id'].'?key='.LEVER_KEY;
	// validate phone
	$phone_no = !empty($_POST['phone']) ? $_POST['phone'] : '';
	$post_data = array(
			'name'=>$_POST['full_name'],
			'phone'=>$phone_no,
			'email'=>$_POST['email'],
			'company'=>$_POST['company'],
			'message'=>$_POST['message'],
			//'surveysResponses[8e503ca9-f241-4e68-af2b-75798643a3c6][responses][field0]'=>$_POST['gender_identity'],
	
	);
	/*echo 'DATA::<pre>';
	print_r( $post_data );
	die;*/
	
	//echo '<pre>';
	//print_r($post_data);
	
	$allowed = array('pdf', 'doc', 'docx', 'txt', 'rtf');
	// Did user upload resume
	if($_FILES['resume']['name'] != ""){
		// check for allowed file types
		$file_ext = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
		if (!in_array(strtolower($file_ext), $allowed)) {
			wp_send_json(array('status'=>'error', 'message'=>'Only these file type allowed (pdf, doc, docx, txt, rtf)'));				
		}
		 $local_file = false;
		 $resume_path = upload_resume_cover_file('resume');
		 if($resume_path){			
			$local_file = $resume_path['file_url'];
		 }

		 $eol = "\r\n";
		 $boundary = uniqid();
		 $headers  = array(
			'content-type' => 'multipart/form-data; boundary=' . $boundary,
		 );
		 $payload = '';
		// First, add the standard POST fields:
		foreach ( $post_data as $key => $value ) {
			$payload .= '--' . $boundary.$eol;
			$payload .= 'Content-Disposition: form-data; name="'.trim($key).'"' . $eol.$eol;
			$payload .= $value.$eol;
		}
		// Upload the file
		if ( $local_file ) {
			$payload .= '--' .$boundary;
			$payload .= $eol;
			$payload .= 'Content-Disposition: form-data; name="'.'resume'.'"; filename="' . basename( $local_file ) . '"'. $eol;
			$payload .= $eol;
			$payload .= file_get_contents( $local_file );
			$payload .= $eol;
		}
		$payload .= '--' . $boundary . '--'.$eol;
		//echo 'PAYLOAD::'.$payload;
		//die;
		$response = wp_remote_post( $api_url,
					array(
						'headers'    => $headers,
						'body'       => $payload,
					)
				);
			//echo 'CODE::'.$response_code = wp_remote_retrieve_response_code( $response );
			if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
				// remove uploaded file
				if(isset($resume_path['file_path'])){
					remove_uploaded_resume_letter($resume_path['file_path']);
				}
				wp_send_json(array('status'=>'error', 'message'=>$error_message));
			} else {				
				$body = wp_remote_retrieve_body( $response );
				//echo 'BODY:<pre>';
				//print_r($body);
				$data = json_decode( $body );
				//echo 'DATA:<pre>';
				//print_r($data);
				//echo '</pre>';
				if(isset($data->applicationId)){
					wp_send_json(array('status'=>'success', 'message'=>'Successfully submitted','application_id'=>$data->applicationId));			
				}elseif(isset($data->error)){ // show api error
					wp_send_json(array('status'=>'error', 'message'=>$data->error));
					
				}
				// show some default error
				wp_send_json(array('status'=>'error', 'message'=>'Application cannot be submitted. Please try again or contact us'));		
			
		}


	}else{ // no resume attached
		
		$response = wp_remote_post( $api_url, array(
					'headers'     => array(
						'Content-Type'=>'application/json',				
					),
					'body'        =>  json_encode($post_data),
					'method'      => 'POST',
					'data_format' => 'body',
				));	
						
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			wp_send_json(array('status'=>'error', 'message'=>$error_message));
		} else {	
				
			$body = wp_remote_retrieve_body( $response );
			$data = json_decode( $body );			
			if(isset($data->applicationId)){
				wp_send_json(array('status'=>'success', 'message'=>'Successfully submitted','application_id'=>$data->applicationId));			
			}elseif(isset($data->error)){ // show api error
				wp_send_json(array('status'=>'error', 'message'=>$data->error));
				
			}
			// show some default error
			wp_send_json(array('status'=>'error', 'message'=>'Application cannot be submitted. Please try again or contact us'));		
			
		}
	}
}
function build_data_files($boundary, $fields, $file_path = false){
    $data = '';
    $eol = "\r\n";

    $delimiter = '-------------' . $boundary;

    foreach ($fields as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
            . $content . $eol;
    }
	
	if ( $file_path ) {
		$data .= "--" . $delimiter . $eol;
		$data .= 'Content-Disposition: form-data; name="' . 'resume' .
			'"; filename="' . basename( $file_path ) . '"' . $eol
			. 'Content-Transfer-Encoding: binary'.$eol;
		$data .= $eol;
		$data .= file_get_contents( $file_path );
		$data .= $eol;
	}

    $data .= "--" . $delimiter . "--".$eol;


    return $data;
}
// after file is uploaded remove it from wp
function remove_uploaded_resume_letter($file_path = ''){
    if(!empty($file_path)){
        @unlink($file_path);
    }
}

///  upload resume or cover letter
function upload_resume_cover_file($file_name){
		if ( ! function_exists( 'wp_handle_upload' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		}
	
		$uploadedfile = $_FILES[$file_name];
		
		$upload_overrides = array( 'test_form' => false );
		
		$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		
		if ( $movefile && ! isset( $movefile['error'] ) ) {
			return array('file_url'=>$movefile['url'], 'file_path'=>$movefile['file']);
		} else {
			
			return false;
		}
}

function get_job_questions_list( $job_id = ''){
	
	if(empty($job_id)){
		return false;
	}
	$response_data = wp_remote_get( 'https://api.lever.co/v1/postings/'.$job_id.'/apply',				
				array(
				'headers' => array(
					'Authorization' => 'Basic '.base64_encode('ny40eNQmLI8dxJ4nVHRJKhv5Jx2GuSPHxfTRiXmnT1AiD9S3:'),    
				)
			)
		);
	if ( is_wp_error( $response_data ) ) {
		//$response_data->get_error_message();
		return false;
	} else {
		$body = wp_remote_retrieve_body( $response_data );
		
		$reponse = json_decode( $body );
		return $reponse;
	}
}

// Move formidable messages after the form
add_filter( 'frm_message_placement', 'frm_message_placement', 10, 2 );
function frm_message_placement( $placement, $args ) {
  return 'after';
}


/**
 * Returns the primary term for the chosen taxonomy set by Yoast SEO
 * or the first term selected.
 *
 * @link https://www.tannerrecord.com/how-to-get-yoasts-primary-category/
 * @param integer $post The post id.
 * @param string  $taxonomy The taxonomy to query. Defaults to category.
 * @return array The term with keys of 'title', 'slug', and 'url'.
 */
function get_primary_taxonomy_term($post = 0, $taxonomy = 'category') {
    if (!$post) {
        $post = get_the_ID();
    }

    $terms = get_the_terms($post, $taxonomy);
    $primary_term = array();

    if ($terms) {
        $term_display = '';
        $term_slug = '';
        $term_link = '';
        if (class_exists('WPSEO_Primary_Term')) {
            $wpseo_primary_term = new WPSEO_Primary_Term($taxonomy, $post);
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term = get_term($wpseo_primary_term);
            if (is_wp_error($term)) {
                $term_display = $terms[0]->name;
                $term_slug = $terms[0]->slug;
                $term_link = get_term_link($terms[0]->term_id);
            } else {
                $term_display = $term->name;
                $term_slug = $term->slug;
                $term_link = get_term_link($term->term_id);
            }
        } else {
            $term_display = $terms[0]->name;
            $term_slug = $terms[0]->slug;
            $term_link = get_term_link($terms[0]->term_id);
        }
        $primary_term['url'] = $term_link;
        $primary_term['slug'] = $term_slug;
        $primary_term['title'] = $term_display;
    }
    return $primary_term;
}

function get_module_spacing() {
    $classes = [];
    if( !get_sub_field( 'remove_margin_top' ) ):
        $classes[] = 'mt-10 mt-md-15';
    endif;
    if( !get_sub_field( 'remove_margin_bottom' ) ): 
        $classes[] = 'mb-10 mb-md-15';
    endif;
    return implode( ' ', $classes );
}

function get_mark_image( $type = 'sub' ) {
    if( $type == 'sub' ): 
        $mark_type = get_sub_field( 'mark_type' );
    else:
        $mark_type = get_field( 'mark_type' );
    endif;
    if( $mark_type == 'line' ): 
        return get_template_directory_uri( ) . '/assets/img/decor-txt-engagement.svg';
    elseif( $mark_type == 'circle' ): 
        return get_template_directory_uri( ) . '/assets/img/decor-txt-culture.svg';
    elseif( $mark_type == 'wave' ):
        return get_template_directory_uri( ) . '/assets/img/decor-txt-whole-team.svg';
    elseif( $mark_type == 'exclaimation_mark' ): 
        return get_template_directory_uri( ) . '/assets/img/decor-txt-matter.svg';
    elseif( $mark_type == 'wavy' ):
        return get_template_directory_uri(  ) . '/assets/img/decor-txt-wavy.svg';
    endif;
}

add_action('wp_ajax_load_ajax_successes', 'load_ajax_successes_handler');
add_action('wp_ajax_nopriv_load_ajax_successes', 'load_ajax_successes_handler');

function load_ajax_successes_handler()
{
	$id = $_POST['id'];
    $args = array(
        'post_type'         => 'success',
        'post_status'       => 'publish',
        'posts_per_page'    => -1,
    );
    if( !empty( $id ) ) {
        $args['tax_query'] = array(
            array( 
                'taxonomy'      => 'success_category',
                'field'         => 'term_id',
                'terms'         => $id
            )
        );
    }
	$query = new WP_Query( $args );
    ob_start();
    if( $query->have_posts( ) ):
        while( $query->have_posts( ) ): $query->the_post(  );
            get_template_part( 'template-parts/loop', 'success' );
        endwhile;
    else: ?>
        <h2>No items available</h2>
    <?php endif;
    wp_reset_query(  );
	echo ob_get_clean();
	die;
}