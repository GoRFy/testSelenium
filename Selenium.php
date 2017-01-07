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

    /*public function testValidTitle()
    {
        $this->url('http://romainlambot.fr/ninjav2/user/subscribe');
        $this->assertEquals('SPORT NATION | WORLD WIDE', $this->title());
    }*/

    public function testValidFormSubscription()
    {
        $this->url('http://romainlambot.fr/ninjav2/user/subscribe');
        $this->byId('email')->value('lambot.rom@gmail.com');
        $this->byId('username')->value('GoRFy');
        $this->byCssSelector('.form_subscription')->submit();
        sleep(10);
    }

    public function tearDown()
    {
        $this->stop();
    }

}

?>
