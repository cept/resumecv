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

    public function managementUser(Request $request)
    {
        $search = $request->input('search');

        // Cek apakah terdapat parameter pencarian
        if ($search) {
            $users = User::where('fullname', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('user_id', 'LIKE', '%' . $search . '%')
                        ->paginate(10)
                        ->appends(['search' => $search]); // Untuk menjaga query parameter pencarian
        } else {
            // Jika tidak ada parameter pencarian, tampilkan semua pengguna
            $users = User::paginate(10);
        }

        return view('admin.managementuser', compact('users'));
        
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
        // $resume->user->delete();
        $user->delete();

        return redirect('/managementuser')->with('success', 'Akun berhasil dihapus');
    }
}
