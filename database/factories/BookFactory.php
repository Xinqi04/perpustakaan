<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement([
                'Bumi', 'Bulan', 'Matahari', 'Bintang', 'Ceros dan Batozar', 
                'Komet', 'Komet Minor', 'Selena', 'Nebula'
            ]),
            'author' => 'Tere Liye',
            'published_year' => $this->faker->year(),
            'publisher' => $this->faker->company(),
            'available_copies' => $this->faker->numberBetween(1, 20),
            'total_copies' => $this->faker->numberBetween(20, 50),
            'synopsis' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 50000, 150000),
            'book_image' => $this->faker->randomElement([
                '/img/Bumi.png', '/img/Bulan.png', '/img/Matahari.png', '/img/Bintang.png',
                '/img/Ceros dan Batozar.png', '/img/Komet.png', '/img/Komet Minor.png',
                '/img/Selena.png', '/img/Nebula.png'
            ]),
        ];
    }
}
