<?php

namespace Mfalm3\Files;

use XMLReader;
use DOMDocument;

class Parser
{
    public $reader;

    public function __construct()
    {
        $this->reader = new XMLReader();
    }

    public function read($file)
    {
          $xml = simplexml_load_file($file);
        $dom = new DOMDocument;
        $dom->loadXml($xml);

//        $this->reader->open($file);
        $myfile = fopen("testfile.txt", "w");
            while($xml) {
                for($i=0;$i <= $dom->getElementsByTagName('sms')->length;$i++){
                fwrite($myfile, $xml->sms[$i]['address']."\n");
            }
            }
            fclose($myfile);

        $this->reader->close();
    }
}
