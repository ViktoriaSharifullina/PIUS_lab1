<?php

use Project\User;
use Project\Comment;

require_once('vendor/autoload.php');

$user1 = new User(1, 'Viktoria Sharifullina', 'viktoriasharifullina@gmail.com', 'password1');
$user2 = new User(2, 'Sonya Kostina', 'sonya_kostina@mail.ru', 'password2');
$user3 = new User(3, 'Elena BodnarchuK', 'elenabodn123@yandex.ru', 'password3');
$user4 = new User(4, 'Kirill Petrov', 'kirill_petrov@yandex.ru', 'password4');

try {
    $invalidUser = new User(5, 'Invalid user', 'invalid mail', '123');
} catch (InvalidArgumentException $e) {
    echo nl2br($e->getMessage());
}

$comment1 = new Comment($user1, 'First comment');
$comment2 = new Comment($user2, 'Second comment');
$comment3 = new Comment($user3, 'Third comment');
$comment4 = new Comment($user4, 'Fourth comment');

$comments = [$comment1, $comment2, $comment3, $comment4];

$datetime = new DateTime('2023-04-01');

// Filter the comments by datetime
$newerComments = array_filter($comments, function ($comment) use ($datetime) {
    return $comment->getCreation() > $datetime;
});

// Print the filtered comments
foreach ($newerComments as $comment) {
    echo nl2br("\n" . 'User ' . $comment->getUser()->getName() . ' posted a comment on ' . $comment->getCreation()->format('Y-m-d H:i:s') . ': ' . $comment->getMessage() . "\n");
}
