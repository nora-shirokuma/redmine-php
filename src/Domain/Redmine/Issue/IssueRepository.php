<?php

namespace NoraShirokuma\RedminePhp\Domain\Redmine\Issue;

use NoraShirokuma\CommonPhp\Domain\Repository;
use NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\CreateIssue\CreateIssueRequest;

interface IssueRepository extends Repository
{
    public function create(CreateIssueRequest $request): bool;
}