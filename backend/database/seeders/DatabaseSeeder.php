<?php
namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $jsonString = '[
            {"id":"cnVhbmdhbi0wMDE=","kode_ruang":"GDA-101","nama_ruangan":"Ruang Kuliah 101","nama_gedung":"Gedung A","kapasitas_ruang":40,"jenis_ruang":"kelas"},
            {"id":"cnVhbmdhbi0wMDI=","kode_ruang":"GDA-102","nama_ruangan":"Ruang Kuliah 102","nama_gedung":"Gedung A","kapasitas_ruang":40,"jenis_ruang":"kelas"},
            {"id":"cnVhbmdhbi0wMDM=","kode_ruang":"GDA-103","nama_ruangan":"Ruang Kuliah 103","nama_gedung":"Gedung A","kapasitas_ruang":35,"jenis_ruang":"kelas"}
        ]';

        $classrooms = json_decode($jsonString, true);

        foreach ($classrooms as $room) {
            Classroom::create($room);
        }
    }
}
