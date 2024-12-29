<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        return response()->json(Loan::with(['user', 'book'])->get());
    }

    public function create(Request $request)
    {
        // Ambil user_id dan book_id dari query string
        $user_id = $request->query('user_id');
        $book_id = $request->query('book_id');

        // Validasi apakah user dan buku ada
        $user = User::find($user_id);
        $book = Book::find($book_id);

        if (!$user || !$book) {
            return redirect()->back()->withErrors('User atau Buku tidak ditemukan.');
        }

        return view('pinjamBuku', compact('user', 'book'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
        ]);

        // Tambahkan return_date dengan loan_date + 3 hari
        $validated['return_date'] = Carbon::parse($validated['loan_date'])->addDays(3);

        // Simpan data ke database
        Loan::create([
            'user_id' => $validated['user_id'],
            'book_id' => $validated['book_id'],
            'loan_date' => $validated['loan_date'],
            'return_date' => $validated['return_date'],
            'status' => 'Belum Dipinjam',
        ]);

        // Kembalikan ke view berhasilPinjam dengan pesan sukses
        return view('berhasilPinjam', ['message' => 'Peminjaman berhasil disimpan!']);
    }

    public function userLoan()
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Mengambil transaksi berdasarkan pengguna yang sedang login
        // Pastikan Anda memiliki relasi 'transactions' di model User
        $transactions = $user->loan;

        // Mengirim data transaksi ke view
        return view('riwayat', compact('transactions'));
    }



    public function update(Request $request, Loan $loan)
    {
        $validated = $request->validate([
            'status' => 'in:Gagal,Berhasil,Belum Dipinjam',
        ]);

        $loan->update($validated);

        return response()->json($loan);
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return response()->json(null, 204);
    }
}
