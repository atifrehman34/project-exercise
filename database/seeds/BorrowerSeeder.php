<?php

use Illuminate\Database\Seeder;
use App\Borrower;
use Faker\Factory;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Borrower::class, 20)->create();
    }
}
