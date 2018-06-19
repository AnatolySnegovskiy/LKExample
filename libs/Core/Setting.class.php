<?php

class Setting
{
    public static $dbtype = 'mysqli';
    public static $dbHost = 'localhost';
    public static $dbUser = 'XXXX';
    public static $dbPassword = 'XXXX';
    public static $dbName = 'XXXX';

    public static $siteName = 'XXX';
    public static $siteUrl = 'XXX';
    public static $sitePatch = __DIR__ . '/../../';
    public static $siteCharset = 'utf-8';
    public static $registerUrl = 'XXX';

    public static $debug = true;
    public static $devops = true;
    public static $smarty_pack = 'smarty-3.1.30';
    public static $smartyDebugging = false;
    public static $smartyCaching = false;
    public static $smartyCacheLifetime = 120;


    public static $mailHost = 'XXXXX';
    public static $mailUsername = 'XXXXXX';
    public static $mailPassword = 'XXX';
    public static $mailSMTPSecure = 'XXX';
    public static $mailPort = XXX;
}