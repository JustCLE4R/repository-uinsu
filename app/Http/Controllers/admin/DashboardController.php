<?php

namespace App\Http\Controllers\admin;

use App\Models\ChangeLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function history()
    {
        $userId = request('actionByUserId');
        $ownerId = request('ownerId');
        $archiveId = request('archiveId');
        $actionType = request('action');

        $query = ChangeLog::query()
                ->with(['archive' => function ($query) {
                    $query->with('user');
                }])
                ->latest();

        if ($userId) {
            $query->where('user_id', $userId);
        }

        if ($ownerId) {
            $query->whereHas('archive.user', fn ($query) => $query->where('id', $ownerId));
        }

        if ($archiveId) {
            $query->where('archive_id', $archiveId);
        }

        if ($actionType) {
            $query->where('action', $actionType);
        }

        $changeLogs = $query->get();

        return response()->json($changeLogs, 200);
    }
}
