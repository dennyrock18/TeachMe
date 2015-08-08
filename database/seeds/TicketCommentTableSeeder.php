<?php

use TeachMe\Entities\TiketsComments;
use Faker\Generator;

/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 07/08/2015
 * Time: 14:37.
 */
class TicketCommentTableSeeder extends BaseSeeder
{
    protected $total = 250;

    public function getModel()
    {
        return new TiketsComments();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [

            'comment' => $faker->paragraph(rand(2, 6)),
            'link' => $faker->randomElement(['', '', $faker->url]),
            'user_id' => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id,

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
