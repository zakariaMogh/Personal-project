<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $settings = [
        [
            'key' => 'site_name',
            'value' => 'Personal_blog',
        ],
        [
            'key' => 'contact_email',
            'value' => 'zakaria.dehaba@gmail.com',
        ],
        [
            'key' => 'phone',
            'value' => '+213 540597369',
        ],
        [
            'key' => 'address',
            'value' => 'This is a dummy address, just for testing.',
        ],
        [
            'key' => 'default_email_address',
            'value' => 'admin@admin.com',
        ],
        [
            'key' => 'site_logo',
            'value' => '',
        ],
        [
            'key' => 'site_favicon',
            'value' => '',
        ],
        [
            'key' => 'footer_copyright_text',
            'value' => '',
        ],
        [
            'key' => 'seo_meta_title',
            'value' => '',
        ],
        [
            'key' => 'seo_meta_description',
            'value' => '',
        ],
        [
            'key' => 'social_facebook',
            'value' => '#',
        ],
        [
            'key' => 'social_twitter',
            'value' => '#',
        ],
        [
            'key' => 'social_instagram',
            'value' => '#',
        ],
        [
            'key' => 'social_snapchat',
            'value' => '#',
        ],
        [
            'key' => 'social_youtube',
            'value' => '#',
        ],
        [
            'key' => 'social_linkedin',
            'value' => '',
        ],
        [
            'key' => 'google_analytics',
            'value' => '',
        ],
        [
            'key' => 'facebook_pixels',
            'value' => '',
        ],
        [
            'key' => 'stripe_payment_method',
            'value' => '',
        ],
        [
            'key' => 'stripe_key',
            'value' => '',
        ],
        [
            'key' => 'stripe_secret_key',
            'value' => '',
        ],
        [
            'key' => 'paypal_payment_method',
            'value' => '',
        ],
        [
            'key' => 'paypal_client_id',
            'value' => '',
        ],
        [
            'key' => 'paypal_secret_id',
            'value' => '',
        ],
        [
            'key' => 'footer_copyright_link',
            'value' => '',
        ],
        [
            'key' => 'privacy_policy',
            'value' => '',
        ],
        [
            'key' => 'terms_of_use',
            'value' => '',
        ],
        [
            'key' => 'about_us',
            'value' => '',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Start inserting settings');
        foreach ($this->settings as $index => $setting) {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Admin permissions was inserted Successfully');
    }
}
