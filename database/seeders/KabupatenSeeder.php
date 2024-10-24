<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_kabupaten = [
            [
                'nama_kabupaten' => 'Pacitan',
                'latitude' => '-8.180641905',
                'longitude' => '111.110465',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0325',
                'bobot_fahp'=>'0.0209',
            ],
            [
                'nama_kabupaten' => 'Ponorogo',
                'latitude' => '-7.865551273',
                'longitude' => '111.466938',
                'status_ahp'=>'Sedang',
                'color_ahp' =>'#d4cc39',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0597',
                'bobot_fahp'=>'0.0261',
            ],
            [
                'nama_kabupaten' => 'Trenggalek',
                'latitude' => '-7.866367973',
                'longitude' => '111.4668488',
                'status_ahp'=>'Sedang',
                'color_ahp' =>'#d4cc39',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0623',
                'bobot_fahp'=>'0.0290',
            ],
            [
                'nama_kabupaten' => 'Tulungagung',
                'latitude' => '-8.090863592',
                'longitude' => '111.966489',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0142',
                'bobot_fahp'=>'0.0251',
            ],
            [
                'nama_kabupaten' => 'Blitar',
                'latitude' => '-8.178916132',
                'longitude' => '112.3120825',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0157',
                'bobot_fahp'=>'0.0268',
            ],
            [
                'nama_kabupaten' => 'Kediri',
                'latitude' => '-7.765510344',
                'longitude' => '112.1988415',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0163',
                'bobot_fahp'=>'0.0275',
            ],
            [
                'nama_kabupaten' => 'Malang',
                'latitude' => '-8.223454573',
                'longitude' => '112.5245813',
                'status_ahp'=>'Sedang',
                'color_ahp' =>'#d4cc39',
                'status_fahp'=>'Tinggi',
                'color_fahp'=>'#d64545',
                'bobot_ahp'=>'0.0614',
                'bobot_fahp'=>'0.0535',
            ],
            [
                'nama_kabupaten' => 'Lumajang',
                'latitude' => '-8.127078856',
                'longitude' => '113.2330116',
                'status_ahp'=>'Sedang',
                'color_ahp' =>'#d4cc39',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0385',
                'bobot_fahp'=>'0.0277',
            ],
            [
                'nama_kabupaten' => 'Jember',
                'latitude' => '-8.173174838',
                'longitude' => '113.7012749',
                'status_ahp'=>'Tinggi',
                'color_ahp'=>'#d64545',
                'status_fahp'=>'Tinggi',
                'color_fahp'=>'#d64545',
                'bobot_ahp'=>'0.0918',
                'bobot_fahp'=>'0.0622',
            ],
            [
                'nama_kabupaten' => 'Banyuwangi',
                'latitude' => '-8.217195459',
                'longitude' => '114.3855275',
                'status_ahp'=>'Sedang',
                'color_ahp' =>'#d4cc39',
                'status_fahp'=>'Tinggi',
                'color_fahp'=>'#d64545',
                'bobot_ahp'=>'0.0454',
                'bobot_fahp'=>'0.0510',
            ],
            [
                'nama_kabupaten' => 'Bondowoso',
                'latitude' => '-7.913755887',
                'longitude' => '113.8288521',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0183',
                'bobot_fahp'=>'0.0298',
            ],
            [
                'nama_kabupaten' => 'Situbondo',
                'latitude' => '-7.70355413',
                'longitude' => '114.0115975',
                'status_ahp'=>'Sedang',
                'color_ahp' =>'#d4cc39',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0463',
                'bobot_fahp'=>'0.0365',
            ],
            [
                'nama_kabupaten' => 'Probolinggo',
                'latitude' => '-7.761205073',
                'longitude' => '113.1875188',
                'status_ahp'=>'Sedang',
                'color_ahp' =>'#d4cc39',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0443',
                'bobot_fahp'=>'0.0342',
            ],
            [
                'nama_kabupaten' => 'Pasuruan',
                'latitude' => '-7.602194313',
                'longitude' => '112.7769398',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0250',
                'bobot_fahp'=>'0.0373',
            ],
            [
                'nama_kabupaten' => 'Sidoarjo',
                'latitude' => '-7.446396954',
                'longitude' => '112.7070186',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0241',
                'bobot_fahp'=>'0.0270',
            ],
            [
                'nama_kabupaten' => 'Mojokerto',
                'latitude' => '-7.531500741',
                'longitude' => '112.4851305',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0170',
                'bobot_fahp'=>'0.0190',
            ],
            [
                'nama_kabupaten' => 'Jombang',
                'latitude' => '-7.550781933',
                'longitude' => '112.2328855',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0136',
                'bobot_fahp'=>'0.0287',
            ],
            [
                'nama_kabupaten' => 'Nganjuk',
                'latitude' => '-7.603746849',
                'longitude' => '111.9027148',
                'status_ahp'=>'Sedang',
                'color_ahp' =>'#d4cc39',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0616',
                'bobot_fahp'=>'0.0283',

            ],
            [
                'nama_kabupaten' => 'Madiun',
                'latitude' => '-7.621324159',
                'longitude' => '111.6321856',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0109',
                'bobot_fahp'=>'0.0209',

            ],
            [
                'nama_kabupaten' => 'Magetan',
                'latitude' => '-7.653700388',
                'longitude' => '111.3319861',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0316',
                'bobot_fahp'=>'0.0200',

            ],
            [
                'nama_kabupaten' => 'Ngawi',
                'latitude' => '-7.406891207',
                'longitude' => '111.4325328',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0109',
                'bobot_fahp'=>'0.0214',

            ],
            [
                'nama_kabupaten' => 'Bojonegoro',
                'latitude' => '-7.124751256',
                'longitude' => '111.7960578',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0168',
                'bobot_fahp'=>'0.0281',
            ],
            [
                'nama_kabupaten' => 'Tuban',
                'latitude' => '-6.894643815',
                'longitude' => '112.0421795',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0138',
                'bobot_fahp'=>'0.0247',
            ],
            [
                'nama_kabupaten' => 'Lamongan',
                'latitude' => '-7.110688181',
                'longitude' => '112.44014',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0105',
                'bobot_fahp'=>'0.0118',
            ],
            [
                'nama_kabupaten' => 'Gresik',
                'latitude' => '-7.165512004',
                'longitude' => '112.6525875',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0199',
                'bobot_fahp'=>'0.0315',
            ],
            [
                'nama_kabupaten' => 'Bangkalan',
                'latitude' => '-7.025405731',
                'longitude' => '112.7552868',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0105',
                'bobot_fahp'=>'0.0209',
            ],
            [
                'nama_kabupaten' => 'Sampang',
                'latitude' => '-7.190362858',
                'longitude' => '113.2533737',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0103',
                'bobot_fahp'=>'0.0208',
            ],
            [
                'nama_kabupaten' => 'Pamekasan',
                'latitude' => '-7.153779601',
                'longitude' => '113.4724685',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0079',
                'bobot_fahp'=>'0.0089',
            ],
            [
                'nama_kabupaten' => 'Sumenep',
                'latitude' => '-7.009649999',
                'longitude' => '113.8597443',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0155',
                'bobot_fahp'=>'0.0265',
            ],
            [
                'nama_kabupaten' => 'Kota Kediri',
                'latitude' => '-7.847858057',
                'longitude' => '112.0179011',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Sedang',
                'color_fahp'=>'#d4cc39',
                'bobot_ahp'=>'0.0141',
                'bobot_fahp'=>'0.0250',
            ],
            [
                'nama_kabupaten' => 'Kota Blitar',
                'latitude' => '-8.095379362',
                'longitude' => '112.1602692',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0065',
                'bobot_fahp'=>'0.0164',
            ],
            [
                'nama_kabupaten' => 'Kota Malang',
                'latitude' => '-7.964943232',
                'longitude' => '112.6444619',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0115',
                'bobot_fahp'=>'0.0130',
            ],
            [
                'nama_kabupaten' => 'Kota Probolinggo',
                'latitude' => '-7.775877677',
                'longitude' => '113.2076489',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0053',
                'bobot_fahp'=>'0.0059',
            ],
            [
                'nama_kabupaten' => 'Kota Pasuruan',
                'latitude' => '-7.646705444',
                'longitude' => '112.903232',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0050',
                'bobot_fahp'=>'0.0056',
            ],
            [
                'nama_kabupaten' => 'Kota Mojokerto',
                'latitude' => '-7.470571271',
                'longitude' => '112.4409152',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0060',
                'bobot_fahp'=>'0.0159',
            ],
            [
                'nama_kabupaten' => 'Kota Madiun',
                'latitude' => '-7.630566402',
                'longitude' => '111.531478',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0309',
                'bobot_fahp'=>'0.0192',
            ],
            [
                'nama_kabupaten' => 'Kota Surabaya',
                'latitude' => '-7.206449001',
                'longitude' => '112.8246079',
                'status_ahp'=>'Sedang',
                'color_ahp' =>'#d4cc39',
                'status_fahp'=>'Tinggi',
                'color_fahp'=>'#d64545',
                'bobot_ahp'=>'0.0407',
                'bobot_fahp'=>'0.0549',
            ],
            [
                'nama_kabupaten' => 'Kota Batu',
                'latitude' => '-7.882862609',
                'longitude' => '112.5329899',
                'status_ahp'=>'Rendah',
                'color_ahp' =>'#32c256',
                'status_fahp'=>'Rendah',
                'color_fahp'=>'#32c256',
                'bobot_ahp'=>'0.0332',
                'bobot_fahp'=>'0.0218',
            ],
        ];

        DB::table('kabupaten')->insert($data_kabupaten);
    }
}
