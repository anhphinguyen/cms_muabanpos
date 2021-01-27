<?php
# redirect to url
function redirect_to($url)
{
    if (!empty($url))
        header("location: {$url}");
    else
        return false;
}
?>