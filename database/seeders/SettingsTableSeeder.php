<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(['key' => 'site_name'], ['value' => 'My Website']);
        Setting::updateOrCreate(['key' => 'site_email'], ['value' => 'admin@example.com']);
        Setting::updateOrCreate(['key' => 'facebook_link'], ['value' => 'https://facebook.com']);
        Setting::updateOrCreate(['key' => 'twitter_link'], ['value' => 'https://twitter.com']);
    }
}
