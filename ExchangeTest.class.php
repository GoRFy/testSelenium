<?php
require "Exchange.Class.php";
require "DatabaseConnection.php";
require "EmailSender.php";
require "Product.php";
require "User.class.php";

class ExchangeTest extends PHPUnit_Framework_TestCase
{
  /*
  Un Exchange est enregistré en DB si :
  - Le Receiver et le Product sont valides
  - La date de début est dans le future (et avant la date de fin)
  - Si le receiver est mineur, lui envoyer un mail via l’EmailSender
  */

  public function testIfValid()
  {
    date_default_timezone_set("UTC");
    $validReceiver = $this->createMock(User::class);
    $validReceiver->method('isValid')->willReturn(true);

    $validProduct = $this->createMock(Product::class);
    $validProduct->method('isValid')->willReturn(true);

    if($validProduct && $validReceiver)
    {
      $EmailSender = $this->createMock(EmailSender::class);
      $DBConnection = $this->createMock(DatabaseConnection::class);

      $exchange = new Exchange($EmailSender,$DBConnection);
      $exchange->setReceiver($validReceiver);
      $exchange->setProduct($validProduct);

      $exchange->setDateDebut(date('Y-m-d',strtotime("+1 days")));
      $exchange->setDateFin(date('Y-m-d',strtotime("+3 days")));

      $exchange->save();
    }
  }
}
