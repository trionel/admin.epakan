<?php
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    
    public function run()
    {
        // pengaturan bahasa faker
    	$faker = Faker::create('id_ID');

        // input data dummy sebanyak perulangan
    	for($x = 1; $x <= 20 ; $x++){

            // data dummy
            $tgl_hari_ini   = date('Y-m-d');
            $jenis          = $faker->randomElement(["Pemasukan","Pengeluaran"]);
            $kategori       = $faker->randomElement(["1","2","3","4","5"]);
            $nominal        = $faker->randomElement(["10000","50000","100000","500000","1000000","1500000"]);
            $keterangan     = "";

            // insert ke database
            DB::table('transaksi')->insert([
                'tanggal' => $tgl_hari_ini,
                'jenis' => $jenis,
                'kategori_id' => $kategori,
                'nominal' => $nominal,
                'keterangan' => $keterangan
            ]);

        }


    }
}
