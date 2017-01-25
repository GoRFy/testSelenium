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

//     public function testFormInvalidEmail()
//     {
//         $this->url('http://romainlambot.fr/ninjav2/user/subscribe');
//         $this->byId('email')->value('lambot.rom@gmail.com');
//         $this->byId('username')->value('TestingRootBruh');
//         $this->byCssSelector('.form_subscription')->submit();
//         sleep(1);
//         $text = $this->byId("errorMsg")->text();
//         $this->assertEquals("Email incorrect ou deja existante", $text, "Email incorrect ou deja existante");
//         sleep(5);
//     }
//
//     public function testFormInvalidUsername()
//     {
//         $this->url('http://romainlambot.fr/ninjav2/user/subscribe');
//         $this->byId('email')->value('lambot.rom14010@gmail.com');
//         $this->byId('username')->value('GoRFy');
//         $this->byCssSelector('.form_subscription')->submit();
//         sleep(1);
//         $text = $this->byId("errorMsg")->text();
//         $this->assertEquals("Pseudonyme deja existant", $text, "Pseudonyme deja existant");
//         sleep(3);
//     }
//
//     public function testFormInvalidEmailAndUsername()
//     {
//         $this->url('http://romainlambot.fr/ninjav2/user/subscribe');
//         $this->byId('email')->value('lambot.rom@gmail.com');
//         $this->byId('username')->value('GoRFy');
//         $this->byCssSelector('.form_subscription')->submit();
//         sleep(1);
//         $text = $this->byId("errorMsg")->text();
//         $this->assertEquals("Email incorrect ou deja existante
// Pseudonyme deja existant", $text, "Email incorrect ou deja existante
// Pseudonyme deja existant");
//         sleep(3);
//     }

    // public function testConnexionEtCreationDuneEquipe()
    // {
    //     // Connexion
    //     $this->url('http://romainlambot.fr/ninjav2/user/login');
    //     $this->byName('email')->value('elyes.elbahri77@gmail.com');
    //     $this->byName('password')->value('Testtest');
    //     sleep(1);
    //     $this->byName('submit')->submit();
    //     sleep(1);
    //
    //     // Création d'une team
    //     $this->url('http://romainlambot.fr/ninjav2/team/create');
    //     $this->byName('teamName')->value('Team Selenium');
    //     $this->byName('description')->value('Les tests c\'est la vie !');
    //     $this->byName('sport')->value('Selenium');
    //     sleep(1);
    //     $this->byName('submit')->submit();
    //     sleep(1);
    // }

    public function testConnextionEtCreationDunEvenement()
    {
        // Connexion
        $this->url('http://romainlambot.fr/ninjav2/user/login');
        $this->byName('email')->value('elyes.elbahri77@gmail.com');
        $this->byName('password')->value('Testtest');
        sleep(1);
        $this->byName('submit')->submit();
        sleep(3);

        // Création d'un évenement
        $this->url('http://romainlambot.fr/ninjav2/event/create');
        $this->byName('name')->value('Merry SeleniumTime');
        $this->byName('description')->value('Test évenement Selenium');
        $this->byName('from_date')->value('31/12/2017');
        $this->byName('from_time')->value('08:00');
        $this->byName('to_date')->value('31/12/2017');
        $this->byName('to_time')->value('23:59');
        $this->byName('joignable_until')->value('01/01/2017');
        $this->byName('joignable_until_time')->value('00:01');
        $this->byName('location')->value('ESGI');
        $this->byName('nb_people_max')->value('20');
        $this->byName('sport')->value('phpunit');
        sleep(1);
        $this->byName('submit')->submit();
        sleep(3);
    }

    public function tearDown()
    {
        $this->stop();
    }

}

?>
