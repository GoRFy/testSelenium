<?php

class Exchange
{
  protected $Receiver;
  protected $Product;
  protected $Date_debut;
  protected $Date_fin;
  protected $Email_sender;
  protected $DBConnection;


  public function __construct($Email_sender,$DBConnection)
  {
    $this->Email_sender = $Email_sender;
    $this->DBConnection = $DBConnection;
  }

  public function save()
  {
    $now = date("Y-m-d");
    if ($this->getReceiver()->isValid() && $this->getProduct()->isValid()){
      if($now < $this->getDateDebut() && $this->getDateDebut() < $this->getDateFin()) {
        $this->getDbconnection()->saveExchange($this);
        if ($this->getReceiver()->getAge() < 18) {
          $this->getEmailSender()->sendEmail($this->getReceiver(), 'Vous devez être majeur!');
        }
      }
    }
  }

  /**
  * Get the value of Receiver
  *
  * @return mixed
  */
  public function getReceiver()
  {
    return $this->Receiver;
  }

  /**
  * Set the value of Receiver
  *
  * @param mixed Receiver
  *
  * @return self
  */
  public function setReceiver($Receiver)
  {
    $this->Receiver = $Receiver;

    return $this;
  }

  /**
  * Get the value of Product
  *
  * @return mixed
  */
  public function getProduct()
  {
    return $this->Product;
  }

  /**
  * Set the value of Product
  *
  * @param mixed Product
  *
  * @return self
  */
  public function setProduct($Product)
  {
    $this->Product = $Product;

    return $this;
  }

  /**
  * Get the value of Date Debut
  *
  * @return mixed
  */
  public function getDateDebut()
  {
    return $this->Date_debut;
  }

  /**
  * Set the value of Date Debut
  *
  * @param mixed Date_debut
  *
  * @return self
  */
  public function setDateDebut($Date_debut)
  {
    $this->Date_debut = $Date_debut;

    return $this;
  }

  /**
  * Get the value of Date Fin
  *
  * @return mixed
  */
  public function getDateFin()
  {
    return $this->Date_fin;
  }

  /**
  * Set the value of Date Fin
  *
  * @param mixed Date_fin
  *
  * @return self
  */
  public function setDateFin($Date_fin)
  {
    $this->Date_fin = $Date_fin;

    return $this;
  }

  /**
  * Get the value of Email Sender
  *
  * @return mixed
  */
  public function getEmailSender()
  {
    return $this->Email_sender;
  }

  /**
  * Set the value of Email Sender
  *
  * @param mixed Email_sender
  *
  * @return self
  */
  public function setEmailSender($Email_sender)
  {
    $this->Email_sender = $Email_sender;

    return $this;
  }

  /**
  * Get the value of Connection
  *
  * @return mixed
  */
  public function getDBConnection()
  {
    return $this->DBConnection;
  }

  /**
  * Set the value of Connection
  *
  * @param mixed DBConnection
  *
  * @return self
  */
  public function setDBConnection($DBConnection)
  {
    $this->DBConnection = $DBConnection;

    return $this;
  }

}

?>
