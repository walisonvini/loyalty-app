<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Reward;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rewards = [
            [
                'name' => 'Suco de Laranja',
                'points' => 5,
                'description' => 'Resgate 5 pontos por um suco de laranja',
            ],
            [
                'name' => '10% de desconto',
                'points' => 10,
                'description' => 'Resgate 10 pontos para ganhar 10% de desconto na próxima compra',
            ],
            [
                'name' => 'Almoço especial',
                'points' => 20,
                'description' => 'Resgate 20 pontos para ganhar um almoço especial',
            ],
        ];

        foreach ($rewards as $reward) {
            Reward::create($reward);
        }
    }
}
