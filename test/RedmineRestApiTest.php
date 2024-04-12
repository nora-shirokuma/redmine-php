<?php

use Dotenv\Dotenv;
use NoraShirokuma\RedminePhp\Domain\Redmine\Category\CategoryId;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\Description;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\DueDate;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\StartDate;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\Subject;
use NoraShirokuma\RedminePhp\Domain\Redmine\Project\ProjectId;
use NoraShirokuma\RedminePhp\Domain\Redmine\RestApi\ApiKey;
use NoraShirokuma\RedminePhp\Domain\Redmine\RestApi\BaseUrl;
use NoraShirokuma\RedminePhp\Domain\Redmine\Tracker\TrackerId;
use NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\CreateIssue\CreateIssueRequestBuilder;
use NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\Repositories\RestApiIssueRepository;
use NoraShirokuma\RedminePhp\UseCase\Redmine\Issue\CreateIssueUseCase\CreateIssueUseCase;
use NoraShirokuma\RedminePhp\UseCase\Redmine\Issue\CreateIssueUseCase\CreateIssueUseCaseRequest;
use NoraShirokuma\RedminePhp\UseCase\Redmine\Issue\CreateIssueUseCase\CreateIssueUseCaseResponse;
use PHPUnit\Framework\TestCase;

class RedmineRestApiTest extends TestCase
{
    private CreateIssueUseCaseResponse $response;

    public function testException(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        $repository = new RestApiIssueRepository(
            new BaseUrl($_ENV['REDMINE_BASE_URI']),
            new ApiKey($_ENV['REDMINE_REST_API_KEY'])
        );

        $createIssueRequest = (new CreateIssueRequestBuilder())
            ->setSubject(new Subject('test'))
            ->setDescription(new Description())
            ->setProjectId(new ProjectId($_ENV['REDMINE_DEFAULT_PROJECT_ID']))
            ->setTrackerId(new TrackerId())
            ->setCategoryId(new CategoryId())
            ->setStartDate(new StartDate(2024, 4, 12))
            ->setDueDate(new DueDate(2024, 5,31))
            ->build();

        $useCase = new CreateIssueUseCase($repository);
        $useCaseRequest = new CreateIssueUseCaseRequest($createIssueRequest);
        $useCase->execute($useCaseRequest);
    }
}