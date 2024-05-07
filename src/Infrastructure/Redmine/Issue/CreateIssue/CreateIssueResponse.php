<?php

namespace NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\CreateIssue;

use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\IssueId;
use NoraShirokuma\RedminePhp\Domain\Redmine\Project\ProjectId;
use NoraShirokuma\RedminePhp\Domain\Redmine\Tracker\TrackerId;

class CreateIssueResponse
{
    private IssueId $issueId;

    private ProjectId $projectId;

    private TrackerId $trackerId;


}