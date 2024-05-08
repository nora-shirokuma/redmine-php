<?php

namespace NoraShirokuma\RedminePhp\Domain\Redmine\Priority;

class Priority
{
    private PriorityId $priorityId;

    private PriorityName $priorityName;

    public function __construct(PriorityId $priorityId, PriorityName $priorityName)
    {
        $this->priorityId = $priorityId;
        $this->priorityName = $priorityName;
    }

    public function getPriorityId(): PriorityId
    {
        return $this->priorityId;
    }

    public function getPriorityName(): PriorityName
    {
        return $this->priorityName;
    }
}