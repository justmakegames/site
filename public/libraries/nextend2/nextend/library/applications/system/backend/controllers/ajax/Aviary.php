<?php

class N2SystemBackendAviaryControllerAjax extends N2BackendControllerAjax
{

    public function actionGetHighResolutionAuth() {
        N2Loader::import('libraries.image.aviary');

        $this->response->respond(array(
            'highResolutionAuth' => N2ImageAviary::getHighResolutionAuth()
        ));
    }

    public function  actionSaveImage() {
        $this->validateToken();
        N2Loader::import('libraries.image.aviary');

        $image = N2Request::getVar('aviaryUrl');
        $this->validateVariable(!empty($image), 'image');

        require_once(ABSPATH . 'wp-admin' . '/includes/image.php');
        require_once(ABSPATH . 'wp-admin' . '/includes/file.php');
        require_once(ABSPATH . 'wp-admin' . '/includes/media.php');

        $src = null;

        // Download file to temp location
        $tmp = download_url($image);

        // Set variables for storage
        // fix file filename for query strings
        preg_match('/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $image, $matches);
        $file_array['name']     = basename($matches[0]);
        $file_array['tmp_name'] = $tmp;

        // If error storing temporarily, unlink
        if (is_wp_error($tmp)) {
            @unlink($file_array['tmp_name']);
            $file_array['tmp_name'] = '';
        }

        // do the validation and storage stuff
        $id = media_handle_sideload($file_array, 0);
        // If error storing permanently, unlink
        if (is_wp_error($id)) {
            @unlink($file_array['tmp_name']);
            $src = $id;
        } else {
            $src = wp_get_attachment_url($id);
        }


        if ($src && !is_wp_error($src)) {
            $this->response->respond(array(
                'image' => $src
            ));
        } else {
            N2Message::error(sprintf(n2_('Unexpected error: %s'), $image));
            $this->response->error();
        }
    }
}