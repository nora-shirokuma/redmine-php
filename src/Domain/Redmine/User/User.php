<?php

namespace NoraShirokuma\RedminePhp\Domain\Redmine\User;

class User
{
    private UserId $userId;

    private UserName $userName;

    public function __construct(UserId $userId, UserName $userName)
    {
        $this->userId = $userId;
        $this->userName = $userName;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getUserName(): UserName
    {
        return $this->userName;
    }
}