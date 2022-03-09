<?php
require '../vendor/autoload.php';

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Employer
{
    public int $id;
    public string $name;
    public string $salary;
    public string $offerDate;

    function __construct(int $id, string $name, float $salary, $offerDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->offerDate = $offerDate;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Positive());
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('salary', new Assert\NotBlank());
        $metadata->addPropertyConstraint('salary', new Assert\Positive());
        $metadata->addPropertyConstraint('offerDate', new Assert\Date());
    }

    function __toString(): string
    {
        return 'Employer{' .
            'id=' . $this->id .
            ', name=' . $this->name .
            ', salary=' . $this->salary .
            ', offerDate=' . $this->offerDate .
            ', xp=' . $this->getXP() .
            '}';
    }

    function getXP()
    {
        $seconds = strtotime(date('y-m-d')) - strtotime($this->offerDate);
        return $seconds / 60 / 60 / 24;
    }
}