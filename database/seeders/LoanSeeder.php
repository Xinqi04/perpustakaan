<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Book;
use App\Models\loan;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::find(1); // Mencari user dengan ID 1

        if ($user) {
            // Menambahkan beberapa buku ke wishlist User 1
            $books = Book::take(3)->get(); // Ambil 3 buku pertama (ubah sesuai kebutuhan)

            foreach ($books as $book) {
                loan::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'loan_date' => Carbon::now()->toDateString(),
                    'return_date' => Carbon::now()->addDays(3)->toDateString(),
                    'status' => 'Belum Dipinjam',
                ]);
            }
        }
    }


}
