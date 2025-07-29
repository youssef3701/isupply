<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserSearchResource;
use App\Models\User;
use Illuminate\Http\Request;

class ListUsersController extends Controller
{
    /**
     * Handle the incoming request securely.
     */
    public function __invoke(Request $request)
    {
        // Authorization: only allow users with permission to view users
        $this->authorize('viewAny', User::class);

        // Input validation: prevent abuse and long wildcards
        $request->validate([
            'query' => 'nullable|string|max:100',
        ]);

        UserSearchResource::withoutWrapping();

        $keyword = $request->input('query');

        $users = User::query()
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhere('national_id', 'like', '%' . $keyword . '%');
            })
            ->get();

        return UserSearchResource::collection($users);
    }
}
