<?php

use TeachMe\Entities\Ticket;
use Faker\Generator;

/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 07/08/2015
 * Time: 14:37.
 */
class TicketTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new Ticket();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [

            'title' => $faker->sentence(),
            'status' => $faker->randomElement(['open', 'open', 'closed']),
            'user_id' => $this->getRandom('User')->id,

        ];
    }

    //No hace falta al no ser que se quieram
    // generar mas de 50 ya que este
    // metodo esta inplementado en la clase abstracta
    // BaseSeeder
    /*public function run()
    {
        $this->createMultiple(50);
    }*/
}
