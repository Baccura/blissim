<?php

namespace Baccura\Model;

use DateTime;

class Comment
{
    public int $id;
    public string $content;
    public DateTime $createdAt;
    public string $user;
}
