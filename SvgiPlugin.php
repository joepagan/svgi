<?php
/**
 * svgi plugin for Craft CMS
 *
 * Take the contents of a SVG file and inject it inline in a template
 *
 * @author    Joe Pagan
 * @copyright Copyright (c) 2018 Joe Pagan
 * @link      www.joe-pagan.com
 * @package   Svgi
 * @since     1
 */

namespace Craft;

class SvgiPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('SVGi');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Take the contents of a SVG file and inject it inline in a template');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/joepagan/svgi/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/joepagan/svgi/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Joe Pagan';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'www.joe-pagan.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * Defines the attributes that model your plugin’s available settings.
     *
     * @return array
     */
    protected function defineSettings()
    {
      return array(
        'svgDirectory' => array(AttributeType::String, 'default' => '/../frontend/svgs/'),
      );
    }

    /**
    *
    *  Returns the URL to the plugin’s settings page in the CP.
    *  If your plugin requires a custom settings page, you can use this method to point to it.
    *  If this method returns anything, it will be run through UrlHelper::getCpUrl() before getting output, so a full URL is not necessary.
    *  If this method doesn’t return anything, a simple settings page will be provided for your plugin, filled with whatever getSettingsHtml() returns.
    *
    */
    public function getSettingsUrl()
    {
        return 'svgi/settings';
    }

    public function registerCpRoutes()
    {
        return array(
            'svgi/settings' => array('action' => 'svgi/settings')
        );
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }
}