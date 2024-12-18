<?php
class Horario
{
    private $horarios;
    public function __construct()
    {
        $this->horarios = [
            'yoga' => [
                'lunes' => [
                    'hora' => '19:00',
                    'plazas_totales' => 20,
                    'plazas_disponibles' => 20,
                    'plazas_reservadas' => 0,
                    'reservado' => 0,
                ],
                'miércoles' => [
                    'hora' => '08:00',
                    'plazas_totales' => 20,
                    'plazas_disponibles' => 20,
                    'plazas_reservadas' => 0,
                    'reservado' => 0,
                ],
                'viernes' => [
                    'hora' => '10:00',
                    'plazas_totales' => 20,
                    'plazas_disponibles' => 20,
                    'plazas_reservadas' => 0,
                    'reservado' => 0,
                ],
            ],
            'zumba' => [
                'martes' => [
                    'hora' => '18:00',
                    'plazas_totales' => 20,
                    'plazas_disponibles' => 20,
                    'plazas_reservadas' => 0,
                    'reservado' => 0,
                ],
                'jueves' => [
                    'hora' => '19:30',
                    'plazas_totales' => 20,
                    'plazas_disponibles' => 20,
                    'plazas_reservadas' => 0,
                    'reservado' => 0,
                ],
            ],
            'crossfit' => [
                'lunes' => [
                    'hora' => '18:00',
                    'plazas_totales' => 20,
                    'plazas_disponibles' => 20,
                    'plazas_reservadas' => 0,
                    'reservado' => 0,
                ],
                'miércoles' => [
                    'hora' => '14:30',
                    'plazas_totales' => 20,
                    'plazas_disponibles' => 20,
                    'plazas_reservadas' => 0,
                    'reservado' => 0,
                ],
                'viernes' => [
                    'hora' => '20:30',
                    'plazas_totales' => 20,
                    'plazas_disponibles' => 20,
                    'plazas_reservadas' => 0,
                    'reservado' => 0,
                ],
            ]
        ];
    }


    public function getHorarios()
    {
        return $this->horarios;
    }

    public function reservar_plaza($clase, $dia)
    {
        if (
            $this->horarios[$clase][$dia]['plazas_disponibles'] > 0 &&
            $this->horarios[$clase][$dia]['reservado'] == 0
        ) {
            --$this->horarios[$clase][$dia]['plazas_disponibles'];
            ++$this->horarios[$clase][$dia]['plazas_reservadas'];
            $this->horarios[$clase][$dia]['reservado'] = 1;
            return true;
        } else {
            return false;
        }
    }

    public function liberar_plaza($clase, $dia)
    {
        if ($this->horarios[$clase][$dia]['plazas_reservadas'] >= 1) {
            ++$this->horarios[$clase][$dia]['plazas_disponibles'];
            --$this->horarios[$clase][$dia]['plazas_reservadas'];
            $this->horarios[$clase][$dia]['reservado'] = 0;
            return true;
        } else {
            return false;
        }
    }
}
?>