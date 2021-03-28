<?php

function formatPost($post)
{
    // Handle line breaks
    $pattern = '#(\r)?\n(\r)?\n#';
    $formatted = preg_replace($pattern, "</p><p>", $post);
    $pattern = '#(\r)?\n#';
    $formatted = preg_replace($pattern, "<br>", $formatted);
    return "<p>" . $formatted . "</p>";
}
