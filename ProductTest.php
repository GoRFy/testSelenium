<?php

require "Product.php";
require "User.class.php";

class ProductTest extends PHPUnit_Framework_TestCase
{

  function testIfValid()
  {
    $user = $this->createMock(User::class);
    $user->method('isValid')->willReturn(true);

    $product = new Product("Test",ProductStatus::ACTIVATED(),$user);
    $this->assertEquals($product->isValid(),true);
  }

}

?>
