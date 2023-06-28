<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GroupByOwnersService;

class SolutionController extends Controller
{
    public function groupDocsByOwner()
    {
        $files = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B"
        ];

        $data = GroupByOwnersService::groupDocsByOwner($files);
        return $data;
    }
}
