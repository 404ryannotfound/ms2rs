<?php
function isValidStreamURL($url)
    {
    // Check if the video exists
    global $ms2rs_videoId;
    // stream url? 
    if (preg_match("/web.microsoftstream.com\/video\/[a-z1-9.-_]+/", $url))
        {
        preg_match("/web.microsoftstream.com\/video\/([a-z1-9.-_]+)/", $url, $matches);
        }
    else if (preg_match("/web.microsoftstream.com(.+)v=([^&]+)/", $url))
        {
        preg_match("/v=([^&]+)/", $url, $matches);
        }

    if (!empty($matches))
        {
        $ms2rs_videoId = $matches[1];

        if (!$fp = curl_init($url))
            {
            return false;
            }

        return true;
        }
    }

function HookMs2rsViewrenderinnerresourcepreview()
    {
    // Replace preview if it's a valid stream URL
    global $ref, $ffmpeg_preview_max_width, $ffmpeg_preview_max_height, $ms2rs_field_id, $ms2rs_videoId;

    $width = $ffmpeg_preview_max_width;
    $height = $ffmpeg_preview_max_height;
    $stream_url = get_data_by_field($ref, $ms2rs_field_id);

    if ($stream_url == "" || !isValidStreamURL($stream_url))
        {
        return false;
        }
    else
        {
        $stream_url_emb = "https://web.microsoftstream.com/video/" . "$ms2rs_videoId";
        ?>
        <div id="previewimagewrapper">
            <div class="Picture" id="videoContainer" style="width:<?php echo $width; ?>px;height:<?php echo $height; ?>px;">
                <iframe title="Stream video player" class="stream-player" type="text/html" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $stream_url_emb; ?>" frameborder="0" frameborder="0" allowFullScreen>
                </iframe>
            </div>
        </div>
        <?php
        }
    return true;
    }

function HookMs2rsViewreplacedownloadoptions()
    {
    // Replace download options
    global $ref, $ms2rs_field_id, $baseurl_short, $lang;

    $stream_url = get_data_by_field($ref, $ms2rs_field_id);

    if ($stream_url !== "" && isValidStreamURL($stream_url))
        {
        ?>
        <table cellpadding="0" cellspacing="0">
            <tr >
                <td>File Information</td>
                <td>File Size </td>
                <td>Options</td>
            </tr>
            <tr class="DownloadDBlend">
                <td><h2>Online Preview</h2><p>stream Video</p></td>
                <td>N/A</td>
                <td class="DownloadButton HorizontalWhiteNav">
                    <a href="<?php echo $baseurl_short; ?>pages/resource_request.php?ref=<?php echo urlencode($ref); ?>&k=<?php echo getval("k", ""); ?>" onClick="return CentralSpaceLoad(this,true);">
                <?php echo $lang["action-request"] ?>
                </td>
            </tr>
        </table>
        <?php
        return true;
        }
    else
        {
        return false;
        }
    }

