<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\RolesPermissionsSeeder;

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
        $this->call([
            RolesPermissionsSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            CategorySeeder::class,
            //ClassroomSeeder::class,
            //ChapterSeeder::class,
            //QuizSeeder::class,
            //QuestionSeeder::class,
        ]);
    }
}
