<?php
/**
 * Summary of generate_signature_image
 * @param mixed $name
 * @return string
 */
function portavue_generate_signature_image($name) {
    // Get WordPress uploads directory
    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['basedir'] . '/signatures';
    $upload_url = $upload_dir['baseurl'] . '/signatures';

    // Create directory if it doesn't exist
    if (!file_exists($upload_path)) {
        wp_mkdir_p($upload_path);
    }

    // Set filename
    $filename = sanitize_title($name) . '-signature.png';
    $filepath = $upload_path . '/' . $filename;

    // Font and image settings
    $font = get_template_directory() . '/assets/fonts/billstone_signature.ttf'; // Adjusted font path
    $font_size = 26; // Adjusted for smaller height
    $width = 300;
    $height = 73;

    // Create the image
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    imagefill($image, 0, 0, $white);

    // Write the text (adjusted Y position for baseline)
    imagettftext($image, $font_size, 0, 10, 50, $black, $font, $name);

    // Save image
    imagepng($image, $filepath);
    imagedestroy($image);

    // Return the URL
    return $upload_url . '/' . $filename;
}

