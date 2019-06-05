<?php

namespace Mfalm3\Files;


class Handler
{

    public static function upload(){

        $uploader   =   new Uploader();
        $uploader->setDir(__DIR__.'/../../assets/');
        $uploader->setExtensions(array('xml'));
        $uploader->setMaxSize(75);

        if($uploader->uploadFile('xmlfile'))
        {
            $parser = new Parser();
            $parser->read($uploader->space['parse']);
            $doc  =   $uploader->getUploadName();
            $uploader->getMessage();
            $uploader->unsett();
        }
        else
        {
            $uploader->getMessage();
        }
    }
}