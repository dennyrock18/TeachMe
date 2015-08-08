<?php

use TeachMe\Entities\User;
use Faker\Factory as Faker;
use Faker\Generator;

/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 06/08/2015
 * Time: 23:25
 */

class UserTableSeeder extends BaseSeeder
{

    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker,array $customValues = array())
    {
        return [

            'name'      => $faker->name,
            'email'     => $faker->email,
            'password'  => bcrypt('admin')

        ];
    }

    //Aqui se dejo el metodo porque en este caso
    //Se esta creando un administrador del sistema
    public function run()
    {
        $this->createAdmin();

        $this->createMultiple(50);
    }

    private function createAdmin()
    {
        $this->create([

            'name'      => 'Denny Lopez',
            'email'     => 'dennyrock18@gmail.com',
            'password'  => bcrypt('admin')

        ]);

    }

}