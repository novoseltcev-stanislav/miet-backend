<div>
    <form action="" method="post" style="display: block;">
        <p>Comments by users created after date:</p>
        <input type="date" name="date">
        <input type="submit" name="Filter">
    </form>
</div>

<?php
require 'user.php';

class Comment
{
    private User $user;
    private string $text;

    function __construct(User $user, string $text) {
        $this->text = $text;
        $this->user = $user;
    }

    public function getText(): string {
        return $this->text;
    }

    public function getUser(): User {
        return $this->user;
    }

    public function __toString(): string
    {
        return 'Comment{' .
            'user=' . $this->getUser() .
            ', text=' . $this->getText() .
            '}';
    }
}

$user1 = new User(1, 'SOME', 'some@mail.com', 'pass');
$user2 = new User(2, 'SOME2', 'some2@mail.com', 'pass');

$comments = array(
    new Comment($user1, 'Hello'),
    new Comment($user2, 'World'),
    new Comment($user1, '!!'),
);

if ($_POST != null) {
    $date = date($_POST['date']);
    $_POST = null;
    foreach ($comments as $comment) {
        if (strtotime($comment->getUser()->getCreateDate()) > strtotime($date)) {
            echo '<ul>User: ' . $comment->getUser()->name . '| ' . $comment->getText() . '</ul>';
        }
    }
} else {
    foreach ($comments as $comment) {
        echo '<ul>User: ' . $comment->getUser()->name . '| ' . $comment->getText() . '</ul>';
    }
}

?>



