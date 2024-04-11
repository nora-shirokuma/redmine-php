<?php

namespace NoraShirokuma\RedminePhp\Domain\Redmine\Issue;

use NoraShirokuma\CommonPhp\Domain\RepositoryInterface;
use NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\Requests\IssueCreateRequest;

interface IssueRepositoryInterface extends RepositoryInterface
{
    public function create(IssueCreateRequest $request): bool;
}