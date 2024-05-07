<?php

namespace NoraShirokuma\RedminePhp\Domain\Redmine\Issue;

use Exception;
use NoraShirokuma\CommonPhp\AbstractString;

class Subject extends AbstractString
{
    protected function validate(?string $value): void
    {
        parent::validate($value);

        if (is_null($value)) {
            throw new Exception('The title must not be NULL.');
        }

        if ($value === '') {
            throw new Exception('The title must not be empty.');
        }
    }
}