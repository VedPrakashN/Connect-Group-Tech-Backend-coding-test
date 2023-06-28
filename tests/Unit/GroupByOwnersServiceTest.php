<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\GroupByOwnersService;

class GroupByOwnersServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testGroupByOwnersService(): void
    {
        $groupByOwnersService = new GroupByOwnersService();

        $files = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B"
        ];

        $expectedResult = [
            "Company A" => ["insurance.txt", "letter.docx"],
            "Company B" => ["Contract.docx"]
        ];

        $result = $groupByOwnersService->groupDocsByOwner($files);

        $this->assertEquals($expectedResult, $result);
    }
}
