<?php

namespace NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\Repositories;

use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\IssueRepository;
use NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\CreateIssue\CreateIssueRequest;

class InMemoryIssueRepository implements IssueRepository
{
    public function create(CreateIssueRequest $request): bool
    {
        return true;
    }
}