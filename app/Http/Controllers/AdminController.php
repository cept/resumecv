<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resume;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalResumes = Resume::count();

        $combinedData = $this->generateCombinedChartData();

        return view('admin.dashboard', compact('totalUsers', 'totalResumes', 'combinedData'));
    }

    private function generateCombinedChartData()
    {
        $months = [];
        $userCounts = [];
        $resumeCounts = [];
    
        // Generate data for the last 6 months
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months[] = $date->format('M Y');
            $userCounts[] = User::whereYear('created_at', $date->year)
                                ->whereMonth('created_at', $date->month)
                                ->count();
            $resumeCounts[] = Resume::whereYear('created_at', $date->year)
                                    ->whereMonth('created_at', $date->month)
                                    ->count();
        }
    
        return [
            'months' => $months,
            'userCounts' => $userCounts,
            'resumeCounts' => $resumeCounts,
        ];
    }

    public function managementUser()
    {
        return view('admin.managementuser', [
            'users' => User::paginate(10),
        ]);
    }

    public function managementUserEdit(User $user)
    {
        return view('admin.managementuser_edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $user->update([
            'is_admin' => $request->is_admin,
        ]);

        return redirect('/managementuser')->with('success', 'Role pengguna berhasil diupdate!');
    }

    public function destroyUser(User $user)
    {
        // $resume = User::FindOrFail($id);
        $user->delete();
        // $resume->user->delete();

        return redirect('/managementuser')->with('success', 'Akun berhasil dihapus');
    }
}
