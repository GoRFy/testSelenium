<?php

require_once 'vendor/autoload.php';


class SeleniumTest extends PHPUnit_Extensions_Selenium2TestCase
{

    protected function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('http://romainlambot.fr');
        $this->setBrowser('firefox');
    }

    public function testValidFormSubmission()
    {
        $this->url('http://romainlambot.fr/ninjav2/user/subscribe');
        $this->assertEquals('SPORT NATION | WORLD WIDE', $this->title());
    }

    public function tearDown()
    {
        $this->stop();
    }

}

?>
