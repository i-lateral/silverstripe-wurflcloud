<?php
/*
 * This class acts as a compatibility layer between Silverstripe and WURFL Cloud 
 * 
 */
class WurflCloud {
    
    protected static $api_key;
    
    protected static $config;
    
    protected static $client;
    
    public static function setApiKey($key) {
        self::$api_key = $key;
    }
    
    public static function getConfig() {
        return self::$config;
    }
    
    public static function getClient() {
        return self::$client;
    }
    
    public static function init() {
        try {
            self::$config = new WurflCloud_Client_Config();
            self::$config->api_key = self::$api_key;
            
            self::$client = new WurflCloud_Client_Client(self::$config);
            self::$client->detectDevice();
        } catch (Exception $e) {
            // Show any errors
            echo "Error: ".$e->getMessage();
        }
    }
    
    public static function capability($capability_name) {
        if (self::$client === null) self::init();
		return self::$client->getDeviceCapability($capability_name);
    } 
}
