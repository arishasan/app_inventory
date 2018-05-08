<?php

use Illuminate\Database\Seeder;

class barangExport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'nama_barang' => 'Pocari Sweet',
        	'jenis_barang' => 'Minuman',
        	'Merek' => 'Pocari'
        ];

        DB::table('t_barangexport')->insert($data);

        $data = [
        	'nama_barang' => 'Kratingdaeng',
        	'jenis_barang' => 'Minuman',
        	'Merek' => 'Bulls'
        ];

        DB::table('t_barangexport')->insert($data);

        $data = [
        	'nama_barang' => 'Coca Cola',
        	'jenis_barang' => 'Minuman',
        	'Merek' => 'Coke'
        ];

        DB::table('t_barangexport')->insert($data);

        $data = [
        	'nama_barang' => 'Sprite',
        	'jenis_barang' => 'Minuman',
        	'Merek' => 'Coke'
        ];

        DB::table('t_barangexport')->insert($data);

        $data = [
        	'nama_barang' => 'Roti Sobek',
        	'jenis_barang' => 'Makanan',
        	'Merek' => 'Sarimas'
        ];

        DB::table('t_barangexport')->insert($data);
    }
}
