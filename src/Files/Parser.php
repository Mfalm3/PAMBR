<?php

namespace Mfalm3\Files;

use XMLReader;
use Mfalm3\Debug\Logger;

class Parser
{
    public $reader;
    public $msgs;
    public $sms;


    public function __construct()
    {
        $this->reader = new XMLReader();
        $this->msgs = array();

    }


    public function open($file)
    {
        try
        {
            Logger::log('Preparing to open file');
            $this->reader->open($file);
            Logger::log('File Opened');

        }

        catch (\Exception $e)
        {
            Logger::log('error: '. $e->getMessage());
        }
    }


    public function read()
    {

        while($this->reader->read())
        {
            $this->sms = new \stdClass();

            if ($this->reader->nodeType === XMLREADER::ELEMENT && $this->reader->localName === 'sms')
            {

                $this->sms->protocol = $this->reader->getAttribute('protocol');
                $this->sms->address = $this->reader->getAttribute('address');
                $this->sms->date = $this->reader->getAttribute('date');
                $this->sms->type = $this->reader->getAttribute('type');
                $this->sms->subject = $this->reader->getAttribute('subject');
                $this->sms->body = $this->reader->getAttribute('body');
                $this->sms->toa = $this->reader->getAttribute('toa');
                $this->sms->sc_toa = $this->reader->getAttribute('sc_toa');
                $this->sms->service_center = $this->reader->getAttribute('service_center');
                $this->sms->read = $this->reader->getAttribute('read');
                $this->sms->status = $this->reader->getAttribute('status');
                $this->sms->locked = $this->reader->getAttribute('locked');
                $this->sms->date_sent = $this->reader->getAttribute('date_sent');
                $this->sms->readable_date = $this->reader->getAttribute('readable_date');
                $this->sms->contact_name = $this->reader->getAttribute('contact_name');

                array_push($this->msgs, $this->sms);

            }

        }

        return $this->msgs;
    }


    public function __destruct()
    {
        $this->reader->close();
        Logger::log('Closed File');
    }
}
