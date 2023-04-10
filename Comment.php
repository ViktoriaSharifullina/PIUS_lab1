<?php

namespace Project;

use DateTime;

class Comment
{
    private User $user;
    private string $message;
    private DateTime $creation;

    public function __construct(User $user, $message)
    {
        $this->user = $user;
        $this->message = $message;
        $this->creation = new DateTime();
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getCreation(): DateTime
    {
        return $this->creation;
    }
}
