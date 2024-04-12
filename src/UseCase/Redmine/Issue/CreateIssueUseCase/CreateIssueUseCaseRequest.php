<?php

namespace NoraShirokuma\RedminePhp\UseCase\Redmine\Issue\CreateIssueUseCase;

use NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\CreateIssue\CreateIssueRequest;

class CreateIssueUseCaseRequest
{
    private CreateIssueRequest $createIssueRequest;

    public function __construct(CreateIssueRequest $request)
    {
        $this->createIssueRequest = $request;
    }

    public function getCreateIssueRequest(): CreateIssueRequest
    {
        return $this->createIssueRequest;
    }
}