<?php
namespace Craft;

class SvgiController extends BaseController
{

  public function actionSettings()
  {
    $plugin = craft()->plugins->getPlugin('svgi'); // set the plugin
    $settings = $plugin->getSettings(); // get plugin settings
    
    $this->renderTemplate('svgi/settings', array(
        'settings' => $settings
    ));
  }
    
}