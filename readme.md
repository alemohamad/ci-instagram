# CodeIgniter Helper: Instagram Hashtag

**ci-instagram**

## About this helper

This CodeIgniter's helper retrieves pictures from Instagram based on a hashtag without any login step.  
You can set the hashtag name and the total images that you want to get.  

Its usage is recommended for CodeIgniter 2 or greater.

## Usage

```php
$this->load->helper('instagram');

$client_id = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$hashtag = "macbook";
$size = 8;
$pictures = HashtagPictures($hashtag, $size, $client_id);
```

The result pictures are returned in an array, where every picture is an object.

```
object(InstagramPicture) (16) {
    ["user_id"] => string(9) "290824820"
    ["user_username"] => string(13) "thomasdepaepe"
    ["user_name"] => string(15) "Thomas De Paepe"
    ["user_picture"] => string(77) "http://images.ak.instagram.com/profiles/profile_290824820_75sq_1383577454.jpg"
    ["user_website"] => string(0) ""
    ["user_bio"] => string(0) ""
    ["picture_low"] => string(80) "http://distilleryimage10.s3.amazonaws.com/e68b80267eec11e3be5d0e495519e27a_6.jpg"
    ["picture_high"] => string(80) "http://distilleryimage10.s3.amazonaws.com/e68b80267eec11e3be5d0e495519e27a_8.jpg"
    ["picture_thumb"] => string(80) "http://distilleryimage10.s3.amazonaws.com/e68b80267eec11e3be5d0e495519e27a_5.jpg"
    ["post_id"] => string(28) "634885335595832541_290824820"
    ["post_url"] => string(34) "http://instagram.com/p/jPkNlVS1Td/"
    ["post_likes"] => int(2)
    ["post_comments"] => int(0)
    ["caption_text"] => string(119) "Me so hipster :p #hipster #coffee #onelove #sticker #macbook #pro #apple #macbookpro #magicmouse #mouse #nespresso #cup"
    ["tags"] => array(12) {
        [0] => string(6) "coffee"
        [1] => string(10) "macbookpro"
        [2] => string(5) "apple"
        [3] => string(3) "cup"
        [4] => string(7) "sticker"
        [5] => string(9) "nespresso"
        [6] => string(7) "macbook"
        [7] => string(7) "hipster"
        [8] => string(10) "magicmouse"
        [9] => string(7) "onelove"
        [10] => string(5) "mouse"
        [11] => string(3) "pro"
    }
    ["created_time"] => string(10) "1389904251"
}
```

## Where to manage your Instagram clients

* [Instagram Developer Clients](http://instagram.com/developer/clients/manage/)

![Ale Mohamad](http://alemohamad.com/github/logo2012am.png)