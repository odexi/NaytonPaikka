<?php
/**
 * @package OdexiPlugin
 */
namespace Inc\Base;
class DeActivate
{
    public static function deactivate() {
        flush_rewrite_rules();
    }
}