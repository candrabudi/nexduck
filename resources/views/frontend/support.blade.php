@extends('frontend.layouts.app')
@section('title', 'Tim Support yang bisa anda hubungi!')
@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="container mx-auto py-10 px-4">
        <div class="flex border-b mb-6 justify-center">
            <button
                class="tab-button text-gray-600 py-2 px-4 border-b-2 font-medium hover:text-blue-500 hover:border-blue-500 focus:outline-none focus:text-blue-500 focus:border-blue-500"
                data-tab="about-me">
                Tentang Kami
            </button>
            <button
                class="tab-button text-gray-600 py-2 px-4 border-b-2 font-medium hover:text-blue-500 hover:border-blue-500 focus:outline-none focus:text-blue-500 focus:border-blue-500"
                data-tab="bantuan">
                Bantuan
            </button>
            <button
                class="tab-button text-gray-600 py-2 px-4 border-b-2 font-medium hover:text-blue-500 hover:border-blue-500 focus:outline-none focus:text-blue-500 focus:border-blue-500"
                data-tab="peraturan">
                Peraturan
            </button>
            <button
                class="tab-button text-gray-600 py-2 px-4 border-b-2 font-medium hover:text-blue-500 hover:border-blue-500 focus:outline-none focus:text-blue-500 focus:border-blue-500"
                data-tab="privacy-policy">
                Kebijakan Privasi
            </button>
        </div>

        <div id="about-me" class="tab-content hidden bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Tentang ONICTOTO</h1>

            <!-- Konten Tentang -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Tentang Kami</h2>
                <p class="text-gray-700 leading-relaxed">
                    ONICTOTO hadir untuk melayani para pecinta togel di seluruh Indonesia.
                </p>
                <p class="text-gray-700 leading-relaxed mt-4">
                    ONICTOTO hanya menyelenggarakan <strong>Lottery</strong> dari negara-negara yang menyediakan hasil lottery yang legal dan sah, seperti:
                </p>
                <ul class="list-disc list-inside text-gray-700 mt-2">
                    <li>SINGAPORE49</li>
                    <li>SINGAPORE45</li>
                    <li>HONGKONG</li>
                    <li>SYDNEY</li>
                </ul>
                <p class="text-gray-700 leading-relaxed mt-4">
                    ONICTOTO telah beroperasi sejak tahun <strong>2015</strong> dengan menyelenggarakan pembukaan akun taruhan togel yang dilakukan secara online.
                </p>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Kami berkomitmen untuk memberikan pelayanan terbaik dan memuaskan kepada seluruh member kami. Dengan didukung oleh staff yang profesional dan handal, ONICTOTO menjadi agen judi togel online terbaik dan terpercaya saat ini.
                </p>
            </div>
        </div>

        <!-- Konten Tab -->
        <div id="privacy-policy" class="tab-content bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Kebijakan Privasi</h1>

            <!-- Konten Kebijakan Privasi -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Informasi Apa yang Kami Kumpulkan?</h2>
                <p class="text-gray-700 leading-relaxed">
                    Kami mengumpulkan informasi dari Anda ketika Anda melakukan pendaftaran pada situs kami, pada pengisian form pendaftaran.
                    Anda akan diminta untuk memasukkan: nama, alamat e-mail, nomor telepon, atau nomor rekening. Anda mungkin, bagaimanapun,
                    dapat mengunjungi situs kami secara anonim (tidak dikenal).
                </p>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Selain itu, kami juga melakukan pencatatan informasi Anda ke dalam sistem kami. Informasi yang dicatat pada umumnya
                    meliputi alamat protokol internet (IP Address), tanggal/waktu, referal, informasi demografis, dan informasi lainnya.
                </p>
        
                <h2 class="text-xl font-semibold text-gray-700 mt-6">Langkah Keamanan</h2>
                <p class="text-gray-700 leading-relaxed mt-2">
                    Kami menerapkan berbagai langkah-langkah keamanan untuk menjaga keamanan informasi pribadi Anda ketika Anda login,
                    mengirim, atau mengakses informasi pribadi Anda.
                </p>
        
                <h2 class="text-xl font-semibold text-gray-700 mt-6">Apakah Kami Memberikan Informasi Anda kepada Pihak Luar?</h2>
                <p class="text-gray-700 leading-relaxed mt-2">
                    Tidak! Kami tidak menjual, memperdagangkan, atau mengalihkan kepada pihak luar informasi pribadi Anda. Ini tidak
                    termasuk pihak ketiga terpercaya yang membantu kami dalam mengoperasikan website kami, melakukan bisnis kami, atau
                    melayani Anda, asalkan pihak-pihak ini setuju untuk menjaga informasi tetap rahasia.
                </p>
        
                <h2 class="text-xl font-semibold text-gray-700 mt-6">Kebijakan Privasi Online</h2>
                <p class="text-gray-700 leading-relaxed mt-2">
                    Kebijakan privasi hanya berlaku online untuk informasi yang dikumpulkan melalui website kami dan bukan untuk
                    informasi yang dikumpulkan secara offline.
                </p>
            </div>
        </div>

        <div id="bantuan" class="tab-content hidden bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Bantuan</h1>

            <!-- Konten FAQ -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Bagaimana saya membuka account di ONICTOTO?</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Pendaftaran terbuka untuk setiap orang yang berusia 18 tahun ke atas.
                    </p>
                    <ol class="list-decimal list-inside text-gray-700">
                        <li>Klik REGISTER di menu website ONICTOTO.com</li>
                        <li>Login menggunakan ID dan password yang telah dibuat, lalu klik menu deposit untuk melihat nomor
                            rekening tujuan.</li>
                        <li>Setelah deposit, Customer Service kami akan memproses, dan balance Anda akan bertambah otomatis.
                        </li>
                        <li>Gunakan menu deposit/withdraw untuk transaksi lebih cepat.</li>
                    </ol>
                </div>

                <!-- Card 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Berapa minimum deposit?</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Minimum deposit adalah Rp. 10.000,-.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Berapa minimum taruhan?</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Minimum taruhan adalah Rp. 1.000,- untuk permainan angka 4d/3d/2d, dan Rp. 5.000,- untuk permainan
                        lainnya.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Berapa maksimum taruhan?</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Nilai maksimum untuk taruhan disesuaikan dari game yang dipilih.
                    </p>
                </div>

                <!-- Card 5 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Kapan saya bisa memasang taruhan?</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Anda bisa memasang taruhan saat pasaran yang dipilih sedang online. Harap perhatikan jadwal online
                        dan offline setiap pasaran.
                    </p>
                </div>

                <!-- Card 6 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Bisakah saya membatalkan taruhan saya?</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Tidak bisa. Setelah konfirmasi, taruhan Anda akan tetap diproses.
                    </p>
                </div>

                <!-- Card 7 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Bagaimana cara saya deposit?</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Semua transaksi deposit menggunakan transfer bank BCA, Mandiri, BNI, dan BRI.
                    </p>
                </div>

                <!-- Card 8 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Bisakah saya melakukan deposit/withdraw dari bank
                        lain?</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Bisa, tetapi transfer bank dalam negeri ke BCA atau Mandiri akan diterima keesokan hari atau hari
                        kerja berikutnya.
                        Penarikan dana ke bank lain akan dikenakan biaya Rp. 6.500,-.
                    </p>
                </div>

                <!-- Card 9 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Mengapa saya tidak bisa melakukan deposit lagi?
                    </h2>
                    <p class="text-gray-700 leading-relaxed">
                        Hubungi CS kami, kemungkinan ada permohonan deposit sebelumnya yang belum diproses.
                    </p>
                </div>

                <!-- Card 10 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Bagaimana cara saya withdraw?</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Untuk proses lebih cepat, silakan isi FORM WITHDRAW di menu yang tersedia.
                    </p>
                </div>

                <!-- Card 11 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Apakah data pribadi saya aman di ONICTOTO?</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Semua informasi yang Anda masukkan di ONICTOTO akan sangat dirahasiakan.
                    </p>
                </div>
            </div>
        </div>


        <div id="peraturan" class="tab-content hidden bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Peraturan</h1>

            <!-- Konten Peraturan -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Minimal Usia</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Minimal usia untuk bergabung adalah <strong>18 tahun</strong>.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Jam Tutup Pasaran</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Harap memperhatikan jam tutup setiap pasaran karena jadwal tutup dapat berbeda-beda. Semua pasangan
                        taruhan hanya sah jika terjadi sebelum jam tutup pasaran.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Konfirmasi Taruhan</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Pasangan yang sudah dikonfirmasi tidak dapat dibatalkan. Harap cek kembali di menu <strong>history
                            transaksi</strong> sebelum memasang taruhan.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Kecurangan atau Penipuan</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Semua pasangan akan dibatalkan oleh pihak ONICTOTO jika terdeteksi adanya kecurangan atau penipuan
                        yang dilakukan oleh member.
                    </p>
                </div>

                <!-- Card 5 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Perubahan Pasaran dan Hadiah</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Pasaran dan hadiah setiap pasaran dapat berubah sewaktu-waktu. Harap perhatikan informasi terbaru
                        sebelum bermain.
                    </p>
                </div>

                <!-- Card 6 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Kecurangan Deposit</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Jika terjadi kecurangan deposit atau transaksi lainnya, ONICTOTO berhak memberikan peringatan hingga
                        menutup akun member.
                    </p>
                </div>

                <!-- Card 7 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Jam Deposit dan Withdraw</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Deposit dan withdraw dapat dilakukan setiap hari selama <strong>24 jam</strong>, kecuali bank yang
                        bersangkutan sedang offline.
                    </p>
                </div>

                <!-- Card 8 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Aturan Permainan Live Casino</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Tidak menerima permainan investasi seperti MEGA WHEEL, CRAZY TIME, dan lainnya. Jika ditemukan
                        pelanggaran, saldo dalam akun akan dihanguskan.
                    </p>
                </div>

                <!-- Card 9 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Batas Maksimal Betting Invest</h2>
                    <ul class="list-disc list-inside text-gray-700">
                        <li>40 LINE (2D)</li>
                        <li>400 LINE (3D)</li>
                        <li>3000 LINE (4D)</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed mt-2">
                        Jika melanggar, kami berhak memberikan peringatan hingga pemblokiran akun secara permanen.
                    </p>
                </div>

                <!-- Card 10 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Persetujuan Member</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Dengan bergabung sebagai member ONICTOTO, Anda telah menyetujui seluruh syarat dan peraturan yang
                        berlaku.
                    </p>
                </div>

                <!-- Card 11 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Catatan</h2>
                    <p class="text-gray-700 leading-relaxed">
                        SELAMAT BERMAIN DAN TERIMA KASIH.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    tabButtons.forEach(btn => {
                        btn.classList.remove('text-blue-500', 'border-blue-500');
                        btn.classList.add('text-gray-600', 'border-transparent');
                    });
                    tabContents.forEach(content => content.classList.add('hidden'));
                    button.classList.add('text-blue-500', 'border-blue-500');
                    button.classList.remove('text-gray-600');
                    document.getElementById(button.dataset.tab).classList.remove('hidden');
                });
            });
        });
    </script>
@endsection
