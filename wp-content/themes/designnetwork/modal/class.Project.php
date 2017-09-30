<?php

class Project extends DNBase
{
    public function getFeatureImage()
    {
        return $this->getPostMeta('feature-image');
    }
    public function getSlogan()
    {
        return $this->getPostMeta('slogan');
    }
    public function getBannerImage()
    {
        return $this->getPostMeta('banner-image');
    }
    public function getProjectImages()
    {
        $gallery = Array();
        $field = get_post_meta($this->id());
        foreach($field['wpcf-project-images'] as $image) {
            $gallery[] = $image;
        }
        return $gallery;
    }
}