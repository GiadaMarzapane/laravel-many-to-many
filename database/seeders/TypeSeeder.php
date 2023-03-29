<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Aereo',
            'Treno',
            'Macchina',
            'Nave'
        ];

        foreach ($types as $element) {
            $newType = Type::create([
                'name' => $element
            ]);
        };
    }
}