<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_links')->insert([
            'facebook' => 'www.facebook.com',
            'googleplus' => 'www.googleplus.com',
            'twitter' => 'www.twitter.com',
            'youtube' => 'www.youtube.com',
            'linkedin' => 'www.linkedin.com',
        ]);
    }
}
