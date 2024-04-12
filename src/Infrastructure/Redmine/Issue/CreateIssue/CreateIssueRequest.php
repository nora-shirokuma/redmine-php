<?php

namespace NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\CreateIssue;

use NoraShirokuma\RedminePhp\Domain\Redmine\Category\CategoryId;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\Description;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\DueDate;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\StartDate;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\Subject;
use NoraShirokuma\RedminePhp\Domain\Redmine\Project\ProjectId;
use NoraShirokuma\RedminePhp\Domain\Redmine\Tracker\TrackerId;

class CreateIssueRequest
{
    private Subject $subject;

    private Description $description;

    private ProjectId $projectId;

    private TrackerId $trackerId;

    private CategoryId $categoryId;

    private StartDate $startDate;

    private DueDate $dueDate;

    public function __construct(Subject $subject, Description $description, ProjectId $projectId, TrackerId $trackerId, CategoryId $categoryId, StartDate $startDate, DueDate $dueDate)
    {
        $this->subject = $subject;
        $this->description = $description;
        $this->projectId = $projectId;
        $this->trackerId = $trackerId;
        $this->categoryId = $categoryId;
        $this->startDate = $startDate;
        $this->dueDate = $dueDate;
    }

    public function getSubject(): Subject
    {
        return $this->subject;
    }

    public function getDescription(): Description
    {
        return $this->description;
    }

    public function getProjectId(): ProjectId
    {
        return $this->projectId;
    }

    public function getTrackerId(): TrackerId
    {
        return $this->trackerId;
    }

    public function getCategoryId(): CategoryId
    {
        return $this->categoryId;
    }

    public function getStartDate(): StartDate
    {
        return $this->startDate;
    }

    public function getDueDate(): DueDate
    {
        return $this->dueDate;
    }
}