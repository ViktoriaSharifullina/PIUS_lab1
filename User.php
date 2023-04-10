<?php

namespace Project;

use InvalidArgumentException;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Validation;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $creation;

    public function __construct($id, $name, $email, $password)
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], new Assert\Collection(
            [
                'id' => new Assert\Type(['type' => 'numeric']),
                'name' => new Assert\Length(['min' => 2]),
                'email' => new Assert\Email(),
                'password' => [
                    new Assert\Length(['min' => 6]),
                    new Assert\NotBlank()
                ]
            ]
        ));

        if (count($violations) > 0) {
            throw new InvalidArgumentException((string)$violations);
        }

        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->creation = new DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getCreation()
    {
        return $this->creation;
    }
}
