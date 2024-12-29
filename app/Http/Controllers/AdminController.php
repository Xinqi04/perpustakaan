<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function dashboard()
    {
        // Menampilkan tampilan untuk dashboard admin
        return view('admin.dashboard');
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
    public function transaksi()
    {
        // Menampilkan tampilan transaksi
        return view('admin.transaksi');
    }
}
