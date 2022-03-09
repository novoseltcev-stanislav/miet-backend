<?php
require '../vendor/autoload.php';

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class User
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    private $createDate;

    function __construct(int $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createDate = date('m/d/Y h:i:s a', time());
    }

    function getCreateDate() {
        return $this->createDate;
    }

    function __toString(): string
    {
        return 'User{' .
            'id=' . $this->id .
            ', name=' . $this->name .
            ', email=' . $this->email .
            ', password=' . $this->password .
            ', createDate=' . $this->getCreateDate() .
            '}';
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Positive());
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('email', new Assert\Email (array(
            'message' => 'The email "{{ value }}" is not a valid email.',
        )));
        $metadata->addPropertyConstraint('password', new Assert\Length (array(
            'min' => 2,
            'max' => 32,
            'minMessage' => 'Must be greater or equal that 2',
            'maxMessage' => 'Must be not greater that 32',
        )));
        $metadata->addPropertyConstraint('password', new Assert\NotBlank());
    }
}
