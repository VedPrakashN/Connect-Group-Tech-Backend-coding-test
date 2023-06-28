<?php

namespace App\Services;

class GroupByOwnersService
{
    public static function groupDocsByOwner($files)
    {
        $groupedFiles = [];

        foreach ($files as $keyAsfileName => $companyOwner) {
            if (!isset($groupedFiles[$companyOwner])) {
                $groupedFiles[$companyOwner] = [];
            }

            $groupedFiles[$companyOwner][] = $keyAsfileName;
        }

        return $groupedFiles;
    }
}

