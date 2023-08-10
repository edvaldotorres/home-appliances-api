<?php

namespace Database\Seeders;

use App\Models\Mark;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marks = [
            'Electrolux',
            'Brastemp',
            'Fischer',
            'Samsung',
            'LG',
        ];

        foreach ($marks as $mark) {
            Mark::updateOrCreate([
                'name' => $mark,
            ]);
        }
    }
}
