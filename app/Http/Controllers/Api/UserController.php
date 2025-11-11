<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Return paginated users with posts
     * GET /api/users
     */
    public function index(Request $request)
    {
        //Get per_page from query param, default 10, max 50
        $perPage = (int) $request->query('per_page', 10);
        $perPage = $perPage > 0 ? min($perPage, 50) : 10;

        //Load users with their posts (eager loading to avoid N+1 problem)
        $users = User::with(['posts' => function($q) {
            $q->orderBy('created_at','desc'); //Sort posts by newest
        }])->orderBy('id','asc')->paginate($perPage);

        //Return JSON with pagination info
        return response()->json($users);
    }
}
