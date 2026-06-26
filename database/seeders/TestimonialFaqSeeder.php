<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\Faq;
use Illuminate\Database\Seeder;

class TestimonialFaqSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::insert([
            [
                'name' => 'Sarah',
                'role' => 'Wedding',
                'content' => 'Pelayanan sangat cepat dan desainnya elegan banget! Revisinya juga cepet, cocok buat undangan pernikahan aku.',
                'rating' => 5,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Dewi',
                'role' => 'Birthday',
                'content' => 'Harga bersahabat, hasilnya mewah! Temen-temen pada bilang undangan ulang tahun anakku keren banget. Recommended!',
                'rating' => 5,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Rina',
                'role' => 'Aqiqah',
                'content' => 'Prosesnya cepet banget, kurang dari 24 jam udah jadi. Revisi sampe puas, makasih Va Invite!',
                'rating' => 5,
                'sort_order' => 3,
                'is_active' => true,
            ],
        ]);

        Faq::insert([
            [
                'question' => 'Apa itu undangan digital?',
                'answer' => 'Undangan digital adalah undangan berbentuk website\/link yang bisa dikirim via WhatsApp, Instagram, atau media lainnya. Tamu cukup klik link untuk melihat info acara, galeri foto, lokasi, dan konfirmasi kehadiran secara online.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah bisa revisi? Berapa kali?',
                'answer' => 'Tentu! Revisi bisa dilakukan tanpa batas sampai kamu benar-benar puas. Kami akan revisi sampai hari H acara kamu.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Berapa lama proses pengerjaannya?',
                'answer' => 'Proses pengerjaan kami sangat cepat, yakni antara 10 hingga 24 jam kerja setelah data lengkap kami terima.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Berapa lama masa aktif undangannya?',
                'answer' => 'Undangan digital aktif selama 1 tahun penuh sejak tanggal pembuatan. Tamu bisa akses kapan saja tanpa khawatir link mati.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'Bagaimana cara mengirimkan foto?',
                'answer' => 'Setelah order, kamu bisa kirim foto via WhatsApp. Format bebas (JPEG, PNG), kami akan atur tata letaknya biar makin elegan.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah tema bisa di-mix atau ganti warna?',
                'answer' => 'Tema tidak bisa di-mix atau diganti warna. Setiap tema sudah dirancang secara khusus dengan konsep yang matang agar hasilnya tetap maksimal.',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ]);
    }
}
