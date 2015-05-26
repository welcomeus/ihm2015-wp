<?php

function qodef_option_has_value($name) {
	global $qode_options_proya;
	global $qodeFramework;
	if (array_key_exists($name, $qodeFramework->qodeOptions->options)) {
		if(isset($qode_options_proya[$name])){
			return true;
		} else {
			return false;
		}
	} else {
		global $post;
		$value = get_post_meta( $post->ID, $name, true );
		if (isset($value) && $value !== "")
			return true;
		else
			return false;
	}
}

function qodef_option_get_value($name) {
	global $qode_options_proya;
	global $qodeFramework;
	if (array_key_exists($name, $qodeFramework->qodeOptions->options)) {
		if(isset($qode_options_proya[$name])){
			return $qode_options_proya[$name];
		} else {
			return $qodeFramework->qodeOptions->getOption($name);
		}
	} else {
		global $post;

        if(is_object($post) && property_exists($post, 'ID')) {
            $value = get_post_meta( $post->ID, $name, true );
            if (isset($value) && $value !== "")
                return $value;
            else
                return $qodeFramework->qodeMetaBoxes->getOption($name);
        }

	}
}

function qodef_generate_filename( $file, $w, $h ){
    $info         = pathinfo( $file );
    $dir = "";
    if(!empty($info['dirname'])){
        $dir          = $info['dirname'];
    }
    $ext = "";
    $name = "";
    if(!empty($info['extension'])){
        $ext          = $info['extension'];
        $name         = wp_basename( $file, ".$ext" );
    }

    $suffix       = "{$w}x{$h}";
    if (qodef_url_exists("{$dir}/{$name}-{$suffix}.{$ext}"))
        return "{$dir}/{$name}-{$suffix}.{$ext}";
    else
        return $file;
}

function qodef_url_exists($url){
    $url = str_replace("http://", "", $url);
    if (strstr($url, "/")) {
        $url = explode("/", $url, 2);
        $url[1] = "/".$url[1];
    } else {
        $url = array($url, "/");
    }

    $fh = fsockopen($url[0], 80);
    if ($fh) {
        fputs($fh,"GET ".$url[1]." HTTP/1.1\nHost:".$url[0]."\n\n");
        if (fread($fh, 22) == "HTTP/1.1 404 Not Found") { return FALSE; }
        else { return TRUE;    }

    } else { return FALSE;}
}

function qodef_get_attachment_thumb_url($attachment_url) {
	$attachment_id = qode_get_attachment_id_from_url($attachment_url);

	if(!empty($attachment_id)) {
		return wp_get_attachment_thumb_url($attachment_id);
	} else {
		return $attachment_url;
	}
}

if(!function_exists('qode_get_theme_info_item')) {
	function qode_get_theme_info_item($item) {
		if($item !== '') {
			$current_theme = wp_get_theme();

			if($current_theme->parent()) {
				$current_theme = $current_theme->parent();
			}

			if($current_theme->exists() && $current_theme->get($item) != "") {
				return $current_theme->get($item);
			}
		}
	}
}

if(!function_exists('qode_get_native_fonts_list')) {
    /**
     * Function that returns array of native fonts
     * @return array
     */
    function qode_get_native_fonts_list(){

        return apply_filters('qode_native_fonts_list', array(
            'Arial',
            'Arial Black',
            'Comic Sans MS',
            'Courier New',
            'Georgia',
            'Impact',
            'Lucida Console',
            'Lucida Sans Unicode',
            'Palatino Linotype',
            'Tahoma',
            'Times New Roman',
            'Trebuchet MS',
            'Verdana'
        ));
    }
}

if(!function_exists('qode_get_native_fonts_array')) {
    /**
     * Function that returns formatted array of native fonts
     *
     * @uses qode_get_native_fonts_list()
     * @return array
     */
    function qode_get_native_fonts_array(){
        $native_fonts_list = qode_get_native_fonts_list();
        $native_font_index = 0;
        $native_fonts_array = array();

        foreach($native_fonts_list as $native_font){
            $native_fonts_array[$native_font_index] = array('family' => $native_font);
            $native_font_index++;
        }

        return $native_fonts_array;
    }
}

if(!function_exists('qode_is_native_font')) {
    /**
     * Function that checks if given font is native font
     * @param $font_family string
     * @return bool
     */
    function qode_is_native_font($font_family) {
        return  in_array(str_replace('+', ' ', $font_family), qode_get_native_fonts_list());
    }
}


if(!function_exists('qode_merge_fonts')) {
    /**
     * Function that merge google and native fonts
     *
     * @uses qode_get_native_fonts_array()
     * @return array
     */
    function qode_merge_fonts() {
        global $fontArrays;
        $native_fonts = qode_get_native_fonts_array();

        if(is_array($native_fonts) && count($native_fonts)){
            $fontArrays = array_merge($native_fonts, $fontArrays);
        }
    }

    add_action('admin_init', 'qode_merge_fonts');
}