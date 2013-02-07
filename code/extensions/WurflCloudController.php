<?php

class WurflCloudController extends Extension {
    public function isMobile() {
        return WurflCloud::capability('is_mobile');
    }
    
    public function isTablet() {
        return WurflCloud::capability('is_tablet');
    }
}
