<?php

namespace Database\Seeders;

use App\Models\Command;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // if exist delete all
        Command::truncate();
        // insert new
        Command::create([
            'command' => '/help',
            'description' =>
'Bot ini digunakan untuk mitigasi dan evakuasi Banjir di Lamongan
Daftar perintah yang tersedia:
/start - Memulai Percakapan
/help - Menampilkan daftar perintah
/tips_mitigasi - Menampilkan saran mitigasi untuk mencegah banjir
/tips_evakuasi - Menampilkan saran pada saat terjadinya banjir
/cek_cuaca - Menampilkan Cuaca Terkini
/cek_banjir - Menampilkan Status Banjir Terkini
/lokasi_evakuasi - Menampilkan Lokasi evakuasi untuk Korban Banjir'
        ]);
        Command::create([
            'command' => '/tips_mitigasi',
            'description' =>
'1. Pemantauan Cuaca: Perhatikan perkiraan cuaca secara teratur dan perhatikan peringatan banjir yang dikeluarkan oleh lembaga-lembaga terkait. Dengan mengetahui cuaca yang akan datang, Anda dapat mempersiapkan diri dengan lebih baik.

2. Pembuatan Saluran Air: Pastikan saluran air di sekitar rumah Anda bersih dan tidak tersumbat. Buang sampah dengan benar dan hindari pembuangan limbah ke saluran air. Jika memungkinkan, bangun saluran air tambahan untuk mengalirkan air hujan jauh dari rumah Anda.

3. Peninggian Bangunan: Jika tinggal di daerah yang rentan terhadap banjir, pertimbangkan untuk meninggikan bangunan Anda. Peninggian tanah di sekitar bangunan atau pemasangan dinding penahan air juga bisa membantu.

4. Penyekatan Air: Selama banjir, gunakan penyekat air seperti pasir atau karung pasir untuk mengalihkan arus air yang mengancam rumah Anda. Tempatkan penyekat ini di pintu dan jendela, serta sumber-sumber air lainnya yang dapat memasuki rumah.

5. Pemasangan Pompa Air: Instalasi pompa air atau alat pengering di ruang bawah tanah atau lantai bawah rumah Anda dapat membantu mengeluarkan air yang masuk akibat banjir.

6. Asuransi Banjir: Pertimbangkan untuk mendapatkan asuransi banjir. Ini dapat memberikan perlindungan finansial dalam hal kerusakan yang disebabkan oleh banjir.

7. Evakuasi Dini: Jika Anda menerima peringatan evakuasi, segeralah mengungsi ke tempat yang lebih tinggi dan aman. Jangan mengambil risiko tinggal di rumah saat banjir semakin parah.

8. Pertolongan Pertama: Pelajari teknik pertolongan pertama untuk situasi banjir, termasuk cara menyelamatkan diri sendiri dan orang lain jika terjebak dalam air banjir. Juga, simpan perlengkapan darurat seperti peralatan pertolongan pertama dan makanan serta air bersih yang cukup.

9. Kesadaran Komunitas: Berpartisipasi dalam program kesadaran komunitas mengenai banjir. Ini dapat melibatkan pelatihan, latihan evakuasi, dan pembuatan rencana darurat untuk meminimalkan dampak banjir.

10. Drainase Lingkungan: Dukung dan ikuti upaya pemerintah atau kelompok masyarakat setempat dalam memperbaiki sistem drainase dan pengendalian banjir di wilayah Anda. Aktif berpartisipasi dalam program penghijauan dan pelestarian lingkungan juga dapat membantu mengurangi risiko banjir.
',
        ]);
        Command::create([
            'command' => '/tips_evakuasi',
            'description' =>
'1. Ikuti Peringatan dan Petunjuk Evakuasi: Perhatikan peringatan dan petunjuk evakuasi yang diberikan oleh otoritas setempat, termasuk pihak berwenang dan lembaga penyedia informasi cuaca. Jika diberikan perintah evakuasi, segera lakukan tindakan yang diperlukan.

2. Siapkan Tas Evakuasi: Siapkan tas evakuasi sebelum banjir terjadi. Isi tas dengan barang-barang penting seperti makanan, air minum, pakaian ganti, obat-obatan, baterai cadangan, senter, peta, dokumen penting, serta barang-barang lain yang mungkin Anda perlukan selama evakuasi.

3. Identifikasi Rute Evakuasi: Ketahui rute evakuasi yang aman dan pastikan Anda tahu cara mencapainya. Hindari jalur yang mungkin terendam air atau terhalang oleh puing-puing. Jika memungkinkan, cari alternatif rute yang lebih tinggi dan aman.

4. Bawa Barang Penting: Selain tas evakuasi, bawa juga barang penting seperti ponsel, charger, dokumen identitas, dan dokumen keuangan yang diperlukan. Simpan barang-barang ini dalam wadah kedap air atau bungkus dengan plastik agar tetap kering.

5. Tetap Tenang dan Berhati-hati: Tetap tenang saat melakukan evakuasi dan berhati-hati terhadap kondisi sekitar. Hindari kontak langsung dengan air banjir karena bisa saja terdapat bahaya tersembunyi seperti aliran kuat, benda tajam, atau kontaminan.

6. Bantu Orang Lain: Jika Anda memiliki kesempatan, bantu orang lain yang membutuhkan bantuan saat evakuasi. Terutama perhatikan anak-anak, lansia, dan orang-orang dengan kebutuhan khusus.

7. Jangan Menunggu Terlalu Lama: Jangan menunda evakuasi terlalu lama. Banjir dapat dengan cepat memperburuk kondisi, dan tinggal terlalu lama dapat membahayakan keselamatan Anda. Jika Anda merasa ada ancaman atau perintah evakuasi diberikan, segera tinggalkan daerah tersebut.

8. Tempat Evakuasi yang Aman: Ketahui lokasi tempat evakuasi yang aman, seperti pusat evakuasi, gedung bertingkat tinggi, atau rumah keluarga atau teman yang tinggi. Hindari tempat yang terletak di lembah atau dekat dengan sungai atau saluran air besar.

9. Komunikasi dengan Keluarga: Informasikan rencana evakuasi Anda kepada keluarga atau teman-teman terdekat. Pastikan Anda memiliki cara untuk tetap berkomunikasi dengan mereka selama evakuasi, seperti melalui ponsel atau media sosial.'
        ]);
        Command::create([
            'command' => '/cek_banjir',
            'description' =>
            'tidak ada banjir untuk saat ini',
        ]);

        Command::create([
            'command' => '/lokasi_evakuasi',
            'description' =>
            'tidak ada lokasi evakuasi untuk saat ini',
        ]);
    }
}
