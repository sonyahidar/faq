<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = App\User::inRandomOrder();
        for ($i = 1; $i <= 6; $i++) {
            $users->each(function ($user) {
                $question = App\Question::inRandomOrder()->first();
                $tag = factory(\App\Tag::class)->make();

                $tag->question()->associate($question);
                $tag->save();
            });
        }

    }
}
