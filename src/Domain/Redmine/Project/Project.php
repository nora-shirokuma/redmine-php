<?php

namespace NoraShirokuma\RedminePhp\Domain\Redmine\Project;

class Project
{
    private ProjectId $projectId;

    private ProjectName $projectName;

    public function __construct(ProjectId $projectId, ProjectName $projectName)
    {
        $this->projectId = $projectId;
        $this->projectName = $projectName;
    }

    public function getProjectId(): ProjectId
    {
        return $this->projectId;
    }

    public function getProjectName(): ProjectName
    {
        return $this->projectName;
    }
}