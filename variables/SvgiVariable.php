<?php
/**
 * svgi plugin for Craft CMS
 *
 * svgi Variable
 *
 * @author    Joe Pagan
 * @copyright Copyright (c) 2018 Joe Pagan
 * @link      www.joe-pagan.com
 * @package   Svgi
 * @since     1
 */

namespace Craft;

class SvgiVariable
{

    public function inject($filename, $path='', $deleteFirstLine=false) 
    {
        $plugin = craft()->plugins->getPlugin('svgi'); // set the plugin
        $settings = $plugin->getSettings(); // get plugin settings

        // If path parameter is empty, use the directory saved in plugin settings
        if(empty($path) || $path === '')
        {
            $path = $settings->svgDirectory;
        }
        
        // If filename doesn't contain file extension, add it!
        if(!strpos('.svg', $filename))
        {
            $filename = $filename.'.svg';
        }

        $pathToFile = $_SERVER['DOCUMENT_ROOT'] . $path . $filename;
        
        // if the file exists
        if(file_exists($pathToFile))
        {
            
            // If delete first line param is true
            if($deleteFirstLine == true)
            {
                $firstLine = fgets(fopen($pathToFile, 'r'));
                $pattern = '<?xml';

                // If the SVG has xml junk at the start, strip it out!
                if(strpos($firstLine, $pattern) !== false)
                {
                    $fileContentsNoXML = $this->deleteFirstLine($pathToFile);
                    return TemplateHelper::getRaw($fileContentsNoXML); // server svg with xml prepending
                }
            }

            // get file contents
            $fileContents = file_get_contents($pathToFile);
            
            // return contents to template
            return TemplateHelper::getRaw($fileContents); // unmodified svg
        
        } 
        else 
        {
            // file doesn't exist, log it!
            SvgiPlugin::log('File does not exist at'.$pathToFile, LogLevel::Error);
            return TemplateHelper::getRaw('<img src="/file-does-not-exist.svg" alt="File does not exist at:' . $pathToFile . '" width="100" height="100">');
        }

    }

    private function deleteFirstLine($pathToFile){
        $file = file($pathToFile);
        unset($file[0]);
        $fileWithoutFirstLine = implode($file);
        return $fileWithoutFirstLine;
    }
}