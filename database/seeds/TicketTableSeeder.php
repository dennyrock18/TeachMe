<?php
use TeachMe\Entities\Ticket;
use Faker\Generator;

/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 07/08/2015
 * Time: 14:37
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

            'title'      => $faker->sentence(),
            'status'     => $faker->randomElement(['open','open','closed']),
            'user_id'    => $this->getRandom('User')->id

        ];
    }

    public function run()
    {
        $this->createMultiple(50);
    }


}

