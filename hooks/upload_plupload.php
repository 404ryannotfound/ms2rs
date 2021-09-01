<?php
function HookMs2rsUpload_pluploadupload_page_bottom()
    {
    global $userref, $ms2rs_field_id, $lang;
    $ref_user = 0 - $userref;
    $stream_copy_path = get_data_by_field($ref_user, $ms2rs_field_id);
    
    if ($stream_copy_path == "")
        {
        return false;
        }
    else if (preg_match("/web.microsoftstream.com\/video\/[a-z1-9.-_]+/", $stream_copy_path))
        {
        preg_match("/web.microsoftstream.com\/video\/([a-z1-9.-_]+)/", $stream_copy_path, $matches);
        }
    else if (preg_match("/web.microsoftstream.com\/embed\/video\/[a-z1-9.-_]+/", $stream_copy_path))
        {
        preg_match("/web.microsoftstream.com\/embed\/video\/([a-z1-9.-_]+)/", $stream_copy_path, $matches);
        }
    else
        {
        return false;
        }

    $msthumb_id = $matches[1];

    $imgid = $msthumb_id;

    $data = json_decode(file_get_contents('https://web.microsoftstream.com/oembed?url=https://web.microsoftstream.com/video/'. $imgid) );

    if($data)
        {
        $thumb_path = $data->thumbnail_url;
        }

    echo "<h1>" . $lang['ms2rs_thumb'] . "</h1>";

    echo htmlspecialchars($thumb_path);
    }