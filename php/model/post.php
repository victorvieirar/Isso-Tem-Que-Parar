<?php

class Post implements JsonSerializable {
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>