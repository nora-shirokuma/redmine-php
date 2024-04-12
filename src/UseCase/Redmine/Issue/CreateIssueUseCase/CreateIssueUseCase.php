<?php

namespace NoraShirokuma\RedminePhp\UseCase\Redmine\Issue\CreateIssueUseCase;

use NoraShirokuma\CommonPhp\Domain\Error\Errors;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\IssueRepository;

class CreateIssueUseCase
{
    private IssueRepository $issueRepository;

    public function __construct(IssueRepository $issueRepository)
    {
        $this->issueRepository = $issueRepository;
    }

    public function execute(CreateIssueUseCaseRequest $request): CreateIssueUseCaseResponse
    {
        $errors = new Errors();

        $this->issueRepository->create($request->getCreateIssueRequest());

        return new CreateIssueUseCaseResponse(
            $errors
        );
    }
}