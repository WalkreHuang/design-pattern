<?php


class EmailViewer implements StatViewer
{
    private $emailSender;
    private $toAddresses = [];

    public function __construct(EmailSender $emailSender)
    {
        $this->emailSender = $emailSender;
    }

    public function addToAddress($address)
    {
        $this->toAddresses[] = $address;
    }
    
    
    public function output(array $stats_map, int $startTimeInSecond, int $endTimeInSecond)
    {
        //format to html style
        //send it to email toAddresses.
    }

}