<?php

use Illuminate\Database\Seeder;
use Api\Model\User;
use Api\Model\Author;
use Api\Model\Book;

class SampleDataTableSeeder extends Seeder
{
  use TruncateTable, DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->disableForeignKeys();

        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\en_US\Text($faker));
        $faker->addProvider(new Faker\Provider\DateTime($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));
        $faker->addProvider(new Faker\Provider\Lorem($faker));

        $this->truncate('users');
        $this->truncate('comments');
        $this->truncate('books');
        $this->truncate('authors');

        for ($i = 1; $i <= 5; $i++) {
            User::create(['name' => $faker->name, 'email' => $faker->email, 'password' => Hash::make('user'), 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
        }

        for ($i = 1; $i <= 50; $i++) {
            Author::create(['name' => $faker->name, 'biography' => $faker->realText($maxNbChars = 200, $indexSize = 2), 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
        }

        for ($i = 1; $i <= 500; $i++) {
            $nbWords = $faker->numberBetween(2,8);
            $sentence = $faker->sentence($nbWords);
            $title = substr($sentence, 0, strlen($sentence) - 1);

            $nbAuthor = $faker->numberBetween(0,49);
            $author = Author::skip($nbAuthor)->take(1)->first();

            Book::create(['title' => $title, 'summary' => $faker->realText($maxNbChars = 200, $indexSize = 3), 'publish_date' => $faker->year(), 'author_id' => $author->id, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
        }


        $this->enableForeignKeys();
    }
}
