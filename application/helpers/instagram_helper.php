<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Instagram Helper
// 
// This helper is for collect pictures from Instagram based on a hashtag without any login step
// You can set the hashtag name and the total images that you want to get
// 
// http://instagram.com/developer/clients/manage/
// Service limit: 5000 calls per hour

class InstagramPicture {
    public $user_id;
    public $user_username;
    public $user_name;
    public $user_picture;
    public $user_website;
    public $user_bio;
    public $picture_low;
    public $picture_high;
    public $picture_thumb;
    public $post_id;
    public $post_url;
    public $post_likes;
    public $post_comments;
    public $caption_text;
    public $tags;
    public $created_time;
}

function HashtagPictures($hashtag, $result_size, $client_id, $count = 1, $url = '', $output_result = '') {
    if( empty( $url ) ) {
        $url = 'https://api.instagram.com/v1/tags/' . $hashtag . '/media/recent?client_id=' . $client_id;
    }

    $inst_stream = callInstagram($url);

    $results = json_decode($inst_stream, true);

    if( empty( $output_result ) ) {
        $output_result = array();
    }

    if( isset( $results['data'] ) ) {
        foreach($results['data'] as $item){
            $instagram_picture = new InstagramPicture();

            $instagram_picture->user_id = $item['user']['id'];
            $instagram_picture->user_username = $item['user']['username'];
            $instagram_picture->user_name = $item['user']['full_name'];
            $instagram_picture->user_picture = $item['user']['profile_picture'];
            $instagram_picture->user_website = $item['user']['website'];
            $instagram_picture->user_bio = $item['user']['bio'];
            $instagram_picture->picture_low = $item['images']['low_resolution']['url'];
            $instagram_picture->picture_high = $item['images']['standard_resolution']['url'];
            $instagram_picture->picture_thumb = $item['images']['thumbnail']['url'];
            $instagram_picture->post_id = $item['id'];
            $instagram_picture->post_url = $item['link'];
            $instagram_picture->post_likes = $item['likes']['count'];
            $instagram_picture->post_comments = $item['comments']['count'];
            $instagram_picture->caption_text = $item['caption']['text'];
            $instagram_picture->tags = $item['tags'];
            $instagram_picture->created_time = $item['created_time'];

            $output_result[] = $instagram_picture;

            $count++;

            if($count > $result_size) {
                return $output_result;
            }
        }
    } else {
        return $output_result;
    }

    if( !empty( $results['pagination']['next_url'] ) ) {
        $next_url = $results['pagination']['next_url'];
        HashtagPictures($hashtag, $result_size, $client_id, $count, $next_url, $output_result);
    }
}

function callInstagram($url) {
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => 2
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

/* End of file instagram_helper.php */
/* Location: ./application/helpers/instagram_helper.php */