<?php

namespace App\Http\Controllers;

use App\Models\Company;

class MenuController extends Controller
{
    public function index(Company $company)
    {
        try {
            return $company->checkin(auth()->user());
        } catch (\Exception $e) {
            return response([], 404);
        }
    }

}
