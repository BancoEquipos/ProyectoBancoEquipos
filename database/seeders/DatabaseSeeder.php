<?php

namespace Database\Seeders;

use App\Models\Cicloformativo;
use App\Models\Componente;
use App\Models\Motivo;
use App\Models\Tipocomponente;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Tipocomponentes
        $tiposComponentes = [
            'Ordenador',
            'Monitor',
            'Cableado',
            'Teclado',
            'Raton'
        ];

        for($i = 0; $i < sizeof($tiposComponentes); ++$i){
            $tipoComponente = new Tipocomponente();
            $tipoComponente->tipo_componente = $tiposComponentes[$i];
            $tipoComponente->save();
        }

        //Componentes
        $componentes = [
            1,
            2,
            1,
            2,
            2,
            2,
            2,
            2,
            1,
            1,
            1,
            1,
            2,
            1,
            2,
            1,
            2,
            1,
            2,
            1,
            2,
            1,
            2,
            1,
            2,
            1,
            1,
            2,
            1,
        ];

        for($i = 0; $i < sizeof($componentes); ++$i){
            $componente = new Componente();
            $componente->n_serie = $i + 1;
            $componente->tipo_componente_id = $componentes[$i];
            $componente->save();
        }

        //Motivos
        $motivos = [
            "Se me ha roto el ordenador",
            "Se me ha roto el monitor",
            "No tengo ordenador",
            "Se me ha roto el teclado/ratón de mi ordenador",
            "No tengo uno de los cables esenciales para mi ordenador",
            "Otro motivo",
        ];

        for($i = 0; $i < 6; ++$i){
            $motivo = new Motivo();
            $motivo->motivo = $motivos[$i];
            $motivo->save();
        }

        //Ciclosformativos
        $ciclos = [
            "Técnico superior en Gestión Administrativa",
            "Técnico superior en administracion y finanzas",
            "Técnico superior en asistencia a la dirección bilingüe",
            "Técnico en actividades comerciales",
            "Técnico superior en comercio internacional bilingüe",
            "Técnico superior en transporte y logistica",
            "Técnico superior en marketing y publicidad",
            "Técnico en sistemas microinformáticos y redes",
            "Técnico superior en administración de sistemas informáticos en red",
            "Técnico superior en desarrollo de aplicaciones web",
            "Técnico superior en desarrollo de aplicaciones multiplataforma",
        ];

        for($i = 0; $i <  11; ++$i){
            $ciclo = new Cicloformativo();
            $ciclo->nombre = $ciclos[$i];
            $ciclo->save();
        }

    }
}
