<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    /**
     * Injecting CompanyService to handle business logic
    */
    public function __construct(private CompanyService $service) {}
    
    public function index(): JsonResponse
    {
        $companies = $this->service->getCompanies(['users', 'tasks']);

        return response()->json(['data' => $companies->map(fn($company) => $this->service->formatCompanyResponse($company))]);
    }
}
