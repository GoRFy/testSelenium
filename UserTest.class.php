<?php
require "User.class.php";

class UserTest extends PHPUnit_Framework_TestCase
{

  private $error = false;

  public function testIfValid()
  {
    $user = new User("lambot.rom@gmail.com","Romain","Lambot",18);
    $this->assertTrue($user->isValid());
  }

  public function testEmail()
  {
    if($this->error){
      $user = new User("","test","test",18);
    }else{
      $user = new User("test@hotmail.fr","test","test",18);
    }
    $this->assertNotEmpty($user->getEmail());

  }

  public function testEmailVerif()
  {
    if($this->error){
      $user = new User("ttestestes.Fr","test","test",18);
    }else{
      $user = new User("test@hotmail.fr","test","test",18);
    }
    $this->assertNotFalse(filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL));
  }

  public function testNom()
  {
    if($this->error){
      $user = new User("testfr","","test",18);
    }else{
      $user = new User("test@hotmail.fr","test","test",18);
    }
    $this->assertNotEmpty($user->getLastname());
  }

  public function testPrenom()
  {
    if($this->error){
      $user = new User("testfr","test","",18);
    }else{
      $user = new User("test@hotmail.fr","test","test",18);
    }
    $this->assertNotEmpty($user->getFirstname());
  }

  public function testAge()
  {
    if($this->error){
      $user = new User("testfr","test","test",10);
    }else{
      $user = new User("test@hotmail.fr","test","test",18);
    }
    $this->assertGreaterThanOrEqual(13, $user->getAge());
  }
}
