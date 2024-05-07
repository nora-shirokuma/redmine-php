<?php

namespace NoraShirokuma\RedminePhp\Domain\Redmine\Status;

class Status
{
    private StatusId $statusId;

    private StatusName $statusName;

    private StatusIsClosed $statusIsClosed;

    public function __construct(StatusId $statusId, StatusName $statusName, StatusIsClosed $statusIsClosed)
    {
        $this->statusId = $statusId;
        $this->statusName = $statusName;
        $this->statusIsClosed = $statusIsClosed;
    }

    public function getStatusId(): StatusId
    {
        return $this->statusId;
    }

    public function getStatusName(): StatusName
    {
        return $this->statusName;
    }

    public function getStatusIsClosed(): StatusIsClosed
    {
        return $this->statusIsClosed;
    }
}