<?php

namespace NoraShirokuma\RedminePhp\Domain\Redmine\Tracker;

class Tracker
{
    private TrackerId $trackerId;

    private TrackerName $trackerName;

    public function __construct(TrackerId $trackerId, TrackerName $trackerName)
    {
        $this->trackerId = $trackerId;
        $this->trackerName = $trackerName;
    }

    public function getTrackerId(): TrackerId
    {
        return $this->trackerId;
    }

    public function getTrackerName(): TrackerName
    {
        return $this->trackerName;
    }
}