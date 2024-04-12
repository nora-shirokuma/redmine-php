<?php

namespace NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\CreateIssue;

use NoraShirokuma\RedminePhp\Domain\Redmine\Category\CategoryId;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\Description;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\DueDate;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\StartDate;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\Subject;
use NoraShirokuma\RedminePhp\Domain\Redmine\Project\ProjectId;
use NoraShirokuma\RedminePhp\Domain\Redmine\Tracker\TrackerId;

class CreateIssueRequestBuilder
{
    private Subject $subject;

    private Description $description;

    private ProjectId $projectId;

    private TrackerId $trackerId;

    private CategoryId $categoryId;

    private StartDate $startDate;

    private DueDate $dueDate;

    public function build(): CreateIssueRequest
    {
        return new CreateIssueRequest(
            $this->subject,
            $this->description,
            $this->projectId,
            $this->trackerId,
            $this->categoryId,
            $this->startDate,
            $this->dueDate
        );
    }

    public function setSubject(Subject $subject): CreateIssueRequestBuilder
    {
        $this->subject = $subject;
        return $this;
    }

    public function setDescription(Description $description): CreateIssueRequestBuilder
    {
        $this->description = $description;
        return $this;
    }

    public function setProjectId(ProjectId $projectId): CreateIssueRequestBuilder
    {
        $this->projectId = $projectId;
        return $this;
    }

    public function setTrackerId(TrackerId $trackerId): CreateIssueRequestBuilder
    {
        $this->trackerId = $trackerId;
        return $this;
    }

    public function setCategoryId(CategoryId $categoryId): CreateIssueRequestBuilder
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    public function setStartDate(StartDate $startDate): CreateIssueRequestBuilder
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function setDueDate(DueDate $dueDate): CreateIssueRequestBuilder
    {
        $this->dueDate = $dueDate;
        return $this;
    }
}