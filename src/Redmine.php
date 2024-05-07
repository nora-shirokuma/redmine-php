<?php

namespace NoraShirokuma\RedminePhp;

use Carbon\Carbon;
use NoraShirokuma\CommonPhp\Domain\File\File;
use NoraShirokuma\CommonPhp\Domain\File\Files;
use NoraShirokuma\CommonPhp\Domain\File\Path;
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
use Throwable;

class Redmine
{
    private RestApiIssueRepository $reposIssue;

    private string $lastError;

    public function __construct(string $baseUrl, string $apiKey)
    {
        $this->lastError = '';

        $objBaseUrl = new BaseUrl($baseUrl);
        $objApiKey  = new ApiKey($apiKey);

        $this->reposIssue = new RestApiIssueRepository(
            $objBaseUrl,
            $objApiKey
        );
    }

    final public function getLastError():string
    {
        return $this->lastError;
    }

    final public function createIssue(
        ?string $subject     = null,
        ?string $description = null,
        ?string $projectId   = null,
        ?int    $trackerId   = null,
        ?int    $categoryId  = null,
        ?string $startDate   = 'YYYY-MM-DD',
        ?string $dueDate     = 'YYYY-MM-DD',
        array   $files       = []
    )
    {
        try {
            $objSubject     = new Subject($subject);
            $objDescription = new Description($description);
            $objProjectId   = new ProjectId($projectId);
            $objTrackerId   = new TrackerId($trackerId);
            $objCategoryId  = new CategoryId($categoryId);

            $objStartDate = (function($startDate) {
                if ($startDate === 'YYYY-MM-DD') {
                    return new StartDate();
                }
                $date = Carbon::parse($startDate);
                return new StartDate(
                    $date->year,
                    $date->month,
                    $date->day
                );
            })($startDate);

            $objDueDate = (function($dueDate) {
                if ($dueDate === 'YYYY-MM-DD') {
                    return new DueDate();
                }
                $date = Carbon::parse($dueDate);
                return new DueDate(
                    $date->year,
                    $date->month,
                    $date->day
                );
            })($dueDate);

            $builder = new CreateIssueRequestBuilder();
            $builder->setSubject($objSubject);
            $builder->setDescription($objDescription);
            $builder->setProjectId($objProjectId);
            $builder->setTrackerId($objTrackerId);
            $builder->setCategoryId($objCategoryId);
            $builder->setStartDate($objStartDate);
            $builder->setDueDate($objDueDate);

            $createIssueRequest = $builder->build();

            $this->reposIssue->create($createIssueRequest);

            $objFiles = new Files();
            foreach ($files as $file) {
                $objFiles->add(new File(new Path($file)));
            }

        } catch (Throwable $e) {
            $this->lastError = sprintf(
                '%s:%s %s',
                $e->getFile(),
                $e->getLine(),
                $e->getMessage()
            );
            return false;
        }
        return true;
    }
}