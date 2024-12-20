<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Word;


class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = [
            [
                'name_uz' => '“Arxitektura-qurilish”',
                'name_ru' => '“Архитектура-строительство”',
                'name_en' => '“Architecture and construction”',
            ],
            [
                'name_uz' => 'uyushmasi',
                'name_ru' => 'ассоциация',
                'name_en' => 'association',
            ]
        ];

        foreach ($words as $word) {
            Word::create($word);
        }
    }
}
