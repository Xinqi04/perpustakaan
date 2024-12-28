<?php

use App\Models\Loan;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition()
    {
        $loanDate = $this->faker->dateTimeThisMonth;
        return [
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
            'loan_date' => $loanDate,
            'return_date' => Carbon::parse($loanDate)->addDays(3),
            'status' => 'Belum Dipinjam',
        ];
    }
}