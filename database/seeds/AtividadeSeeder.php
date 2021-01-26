<?php

use Illuminate\Database\Seeder;
use App\Atividade;

class AtividadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'title' => 'Reunião',
                'start' => '2021-01-11 21:30:00',
                'end' => '2021-01-12 21:30:00',
                'color' => '#c40233'

        ];
        $atividade->update($dados);
        $atividade::create($dados);
        $dados = [
            'title' => 'Ligar p/cliente',
            'start' => '2021-01-02',
            'end' => '2021-01-03',
            'color' => '#29fdf2'
        ];
        $atividade->update($dados);
        $atividade::create($dados);
    }
}
