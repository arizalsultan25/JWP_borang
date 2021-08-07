<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jenis = $this->faker->randomElement(['kelas', 'lab']);
        if($jenis == 'lab'){
            $fasilitas = 'papan tulis, meja, kursi, infocus, peralatan lab';
            $gambar = $this->faker->randomElement(['lab-01.jpg', 'lab-02.jpg','lab-03.jpg','lab-04.jpg','lab-05.jpg','lab-06.jpg']);
        }else{
            $fasilitas = $this->faker->randomElement(['papan tulis, meja, kursi', 'papan tulis, meja, kursi, infocus', 'papan tulis, meja, kursi, komputer']);

            $gambar = $this->faker->randomElement(['kelas-01.jpg', 'kelas-02.jpg','kelas-03.jpg','kelas-04.jpg','kelas-05.jpg','kelas-06.jpg']);
        }

        return [
            // kolom
            'kode' => 'R' . rand(0,999),
            'nama_ruangan' => implode(' ', $this->faker->words(3)),
            'jenis' => $jenis,
            'daya_tampung' => rand(0,300),
            'fasilitas' => $fasilitas,
            'gambar' => $gambar,
            'keterangan' => implode('</br>', $this->faker->sentences(3)),
        ];
    }
}
