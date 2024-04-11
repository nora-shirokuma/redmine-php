<?php

namespace NoraShirokuma\RedminePhp\Domain\Redmine\Issue;

use InvalidArgumentException;
use NoraShirokuma\CommonPhp\AbstractInt;

class IssueId extends AbstractInt
{
    protected function validate()
    {
        parent::validate();
        if ($this->value < 0) {
            throw new InvalidArgumentException();
        }
    }
}