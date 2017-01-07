<?php

require_once 'vendor/autoload.php';
require_once 'helpers.php';

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

    public function testFormInvalidEmail()
    {
        $this->url('http://romainlambot.fr/ninjav2/user/subscribe');
        $this->byId('email')->value('lambot.rom@gmail.com');
        $this->byId('username')->value('TestingRootBruh');
        $this->byCssSelector('.form_subscription')->submit();
        $text = $this->byId("errorMsg")->text();
        $this->assertEquals("Email incorrect ou deja existante", $text, "Email incorrect ou deja existante");
        sleep(5);
    }

    public function testFormInvalidUsername()
    {
        $this->url('http://romainlambot.fr/ninjav2/user/subscribe');
        $this->byId('email')->value('lambot.rom14010@gmail.com');
        $this->byId('username')->value('GoRFy');
        $this->byCssSelector('.form_subscription')->submit();
        $text = $this->byId("errorMsg")->text();
        $this->assertEquals("Pseudonyme deja existant", $text, "Pseudonyme deja existant");
        sleep(5);
    }

    public function testFormInvalidEmailAndUsername()
    {
        $this->url('http://romainlambot.fr/ninjav2/user/subscribe');
        $this->byId('email')->value('lambot.rom@gmail.com');
        $this->byId('username')->value('GoRFy');
        $this->byCssSelector('.form_subscription')->submit();
        $text = $this->byId("errorMsg")->text();
        $this->assertEquals("Email incorrect ou deja existante
Pseudonyme deja existant", $text, "Email incorrect ou deja existante
Pseudonyme deja existant");
        sleep(5);
    }

    public function tearDown()
    {
        $this->stop();
    }

}

?>
