<?php

namespace Mfalm3\Files;

use Mfalm3\Config\Config;
use Mfalm3\Database\Writer;

class Handler
{

    public static function xmlToDB()
    {
        $uploader   =   new Uploader();
        $uploader->setDir(Config::PATH_TO_UPLOAD);
        $uploader->setExtensions(array('xml'));
        $uploader->setMaxSize(75);

        if($uploader->uploadFile('xmlfile'))
        {

            /*
             * Upload the XML file
             *
             * */
            $theFile = $uploader->space['parse'];
            $theFileName = $uploader->getOriginalFileName();

            /*
             * Parse the file
             *
             * */
            $parser = new Parser();
            $parser->open($theFile);
            $msgs = $parser->read();

            /*
             * Write the contents to database
             *
             * */
            Writer::write($theFileName, $msgs);

            /*
             * House cleaning
             *
             * */
            $uploader->unsett();
            $uploader->deleteUploaded();
        }
        else
        {
            $uploader->getMessage();
        }
    }
}