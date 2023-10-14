<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([
            ['name' => 'Example Website 1', 'url' => 'http://example1.com'],
            ['name' => 'Example Website 2', 'url' => 'http://example2.com'],
        ]);
    }
}
