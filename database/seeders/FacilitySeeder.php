<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert([
            'name' => 'Kafana Stara Srbija',
            'type' => 'kafana',
            'num_seats' => 300,
            'contact' => '0602131233',
            'info' => 'Radni dan: 08:00-22:00, Vikend: 08:00-02:00',
            'address' => 'Carnojevica 33',
            'description' => 'Kafana Stara Srbija se nalazi u ulici Knjaževačka broj 3 u Nišu. Osnovan je 1995. godine sa željom da svojim kvalitetom zauzme stalno mesto na mapi najboljih restorana ovog dela Srbije.',
            'profile_image' => '/assets/profile_images/ukratko.jpg'
        ]);
        DB::table('facilities')->insert([
            'name' => 'Kafana Orač',
            'type' => 'kafana',
            'num_seats' => 200,
            'contact' => '0602131233',
            'info' => 'Radni dan: 08:00-22:00, Vikend: 08:00-02:00',
            'address' => 'Ilije Garasanina 43',
            'description' => 'Kafana Orač se nalazi u ulici Knjaževačka broj 3 u Nišu. Osnovan je 1995. godine sa željom da svojim kvalitetom zauzme stalno mesto na mapi najboljih restorana ovog dela Srbije.',
            'profile_image' => '/assets/profile_images/restoran-orac-05.jpg'
        ]);
        DB::table('facilities')->insert([
            'name' => 'Kafana Meze',
            'type' => 'kafana',
            'num_seats' => 300,
            'contact' => '0602131233',
            'info' => 'Radni dan: 08:00-22:00, Vikend: 08:00-02:00',
            'address' => 'Carnojevica 33',
            'description' => 'Шта је кафана? Традиционална задужбина у Срба, Место доброг провода и још боље ракије, место где људи уђу не познавајући никога а изађу са четири кума. На турском језику, кафана, значи кућа у којој се пије кафа. У XVI веку Турци освајају Европу, граде џамије, ханове, караван-сараје и куће у којима се пије кафа. Београд 1522. год. постаје први европски град који добија кафану. Временом "најважнија институција" добија нове димензије.',
            'profile_image' => '/assets/profile_images/meze.jpg'
        ]);
        DB::table('facilities')->insert([
            'name' => 'Kafana Želja Pro',
            'type' => 'kafana',
            'num_seats' => 300,
            'contact' => '0602131233',
            'info' => 'Radni dan: 08:00-22:00, Vikend: 08:00-02:00',
            'address' => 'Carnojevica 33',
            'description' => 'Vikendom se organizuju uzivo svirke, mozete rezervisati na broj ispod.....',
            'profile_image' => '/assets/profile_images/06711-nis-restoran-zelja-pro.jpg'
        ]);
        DB::table('facilities')->insert([
            'name' => 'Kafic Bla bla',
            'type' => 'kafic',
            'num_seats' => 300,
            'contact' => '0602131233',
            'info' => 'Radni dan: 08:00-22:00, Vikend: 08:00-02:00',
            'address' => 'Obilicev venac 14',
            'description' => 'Vikendom se organizuju uzivo svirke, mozete rezervisati na broj ispod.....',
            'profile_image' => '/assets/profile_images/bla_bla.jpg'
        ]);
        DB::table('facilities')->insert([
            'name' => 'Klub 2',
            'type' => 'klub',
            'num_seats' => 300,
            'contact' => '0602131233',
            'info' => 'Radni dan: 08:00-22:00, Vikend: 08:00-02:00',
            'address' => 'Obilicev venac 14',
            'description' => 'Klub 2 se nalazi u ulici Obilicev venac  broj 14 u Nišu. Osnovan je 1995. godine sa željom da svojim kvalitetom zauzme stalno mesto na mapi najboljih restorana ovog dela Srbije.',
            'profile_image' => '/assets/profile_images/club2.jpg'
        ]);
        DB::table('facilities')->insert([
            'name' => 'Club Process',
            'type' => 'klub',
            'num_seats' => 200,
            'contact' => '0602131233',
            'info' => 'Radni dan: 08:00-22:00, Vikend: 08:00-02:00',
            'address' => '7 jula',
            'description' => 'Club Process se nalazi u ulici 7 jula Nišu. Osnovan je 1995. godine sa željom da svojim kvalitetom zauzme stalno mesto na mapi najboljih restorana ovog dela Srbije.',
            'profile_image' => '/assets/profile_images/process.jpg'
        ]);
    }
}
