<?php

use App\User;
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
        $user = User::create([
            'name' => 'Andrew Martin',
            'email' => 'andrew@gmail.com',
            'password' => Hash::make('abcdef'),
        ]);

        $p1 = $user->projects()->create([
            'name' => 'Homework',
            'description' => 'Homework on next week',
        ]);
        $p2 = $user->projects()->create([
            'name' => 'Clean house',
        ]);
        $p3 = $user->projects()->create([
            'name' => 'Buy products',
            'description' => 'on Sundays party',
        ]);
       
        $p1->addTask('Math')->complete();
        $p1->addTask('Biology');
        $p1->addTask('History');

        $p2->addTask('Wash windows');
        $p2->addTask('Wash the dishes')->complete();
        $p2->addTask('vacuuming')->complete();

        $p3->addTask('sausages')->complete();
        $p3->addTask('milk');
        $p3->addTask('beeer')->complete();
        $p3->addTask('juice');
        $p3->addTask('apples');
        $p3->addTask('sugar')->complete();
        $p3->addTask('eggs');

    }
}
