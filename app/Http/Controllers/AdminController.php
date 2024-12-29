<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admi

    public function dashboard()
{
    $totalUsers = User::count();
    $totalBooks = Book::count();
    $totalLoans = Loan::count();
    
    // Hitung jumlah peminjaman dengan status 'berhasil'
    $successfulLoans = Loan::where('status', 'berhasil')->count();

    // Ambil peminjaman yang dilakukan pada hari ini
    $todayLoans = Loan::whereDate('created_at', now()->toDateString())->get();

    return view('admin.dashboard', compact(
        'totalUsers', 
        'totalBooks', 
        'totalLoans', 
        'successfulLoans', 
        'todayLoans'
    ));
}



    

    // Menampilkan halaman data user
    public function dataUser(Request $request)
    {
        $search = $request->input('search');
        
        // Query to get users based on search
        $users = User::where('role', 'member')
                    ->where(function($query) use ($search) {
                        $query->where('name', 'like', "%$search%")
                            ->orWhere('username', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%")
                            ->orWhere('phone_number', 'like', "%$search%");
                    })
                    ->get();

        return view('admin.user', compact('users'));
    }



    // Menampilkan halaman data buku
    public function dataBuku()
    {
        // Menampilkan tampilan data buku
        return view('admin.buku');
    }

    // Menampilkan halaman transaksi


    public function transaksi(Request $request)
    {
        $query = Loan::with(['user', 'book']); // Eager load user and book relationships

        // Apply search filter
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->whereHas('user', function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%");
            })
            ->orWhereHas('book', function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%");
            });
        }

        // Apply status filter
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        $loans = $query->get();

        return view('admin.transaksi', compact('loans'));
    }

    // Handle updating loan status
    public function updateStatus(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = $request->input('status');
        $loan->save();

        return redirect()->route('admin.loans')->with('success', 'Status berhasil diupdate');
    }
}
