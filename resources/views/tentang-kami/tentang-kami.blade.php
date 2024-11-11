@extends('layouts.master')

@section('title', 'Tentang Kami')

@section('content')
    <section class="mt-16 py-0 pb-7 lg:py-16 px-8 lg:px-16 bg-gray-50 flex flex-col items-center">
        <div class="w-full flex justify-center mb-8" data-aos="fade-right" data-aos-duration="1000">
            <img src="assets/image-universitas.png" alt="About Us" class="w-auto h-auto rounded-lg shadow-lg max-w-xl" />
        </div>
        <div class="lg:w-full px-0 lg:px-3 text-justify" data-aos="fade-left" data-aos-duration="1000">
            <h2 class="text-3xl font-semibold mb-6">Tentang Kami</h2>
            <p class="text-lg mb-4">
                Kami adalah Fakultas Kedokteran Gigi Universitas Baiturrahmah yang berdedikasi untuk menyediakan pendidikan
                berkualitas dalam bidang Kedokteran Gigi. Dengan pengajaran yang inovatif dan fasilitas modern, kami
                berkomitmen untuk mempersiapkan mahasiswa kami menjadi profesional yang terampil dan peduli.
            </p>
            <h3 class="text-xl font-semibold mb-2">Visi</h3>
            <p class="mb-4">
                Menjadi fakultas yang unggul, berakhlakul karimah dan berdaya saing internasional dengan penguatan digital
                dentistry dalam pengembangan Ipteksdokgi di bidang phytodentistry.
            </p>
            <h3 class="text-xl font-semibold mb-2">Misi</h3>
            <ol class="mb-4 list-decimal list-inside ml-4">
                <li class="flex items-start mb-2">
                    <span class="mr-2">1.</span>
                    <span>Menyelenggarakan dan mengembangkan pendidikan akademik dan profesi yang berkualitas, berakhlakul
                        karimah dan berdaya saing internasional dengan penguatan digital dentistry dalam pengembangan
                        IPTEKSDOKGI di bidang phytodentistry.</span>
                </li>
                <li class="flex items-start mb-2">
                    <span class="mr-2">2.</span>
                    <span>Melaksanakan penelitian yang inovatif dengan penguatan digital dentistry dalam pengembangan
                        IPTEKSDOKGI di bidang phytodentistry.</span>
                </li>
                <li class="flex items-start mb-2">
                    <span class="mr-2">3.</span>
                    <span>Melaksanakan pengabdian kepada masyarakat untuk meningkatkan kesehatan gigi dan mulut masyarakat
                        dengan pemanfaatan riset di bidang digital dentistry dan phytodentistry.</span>
                </li>
                <li class="flex items-start mb-2">
                    <span class="mr-2">4.</span>
                    <span>Melaksanakan dan mengembangkan sistem manajemen mutu dalam penyelenggaraan pendidikan, penelitian,
                        dan pengabdian kepada masyarakat untuk meningkatkan mutu layanan dan kepuasan stakeholders.</span>
                </li>
                <li class="flex items-start mb-2">
                    <span class="mr-2">5.</span>
                    <span>Mengembangkan jejaring kerjasama yang strategis, sinergis dan berkelanjutan dengan stakeholders di
                        dalam dan di luar.</span>
                </li>
            </ol>

            <h3 class="text-xl font-semibold mb-2">Tata Nilai</h3>
            <p class="mb-4">
                Fakultas Kedokteran Gigi Unbrah menyadari pentingnya pembudayaan tata nilai dalam menetapkan visi dan misi.
                Tata
                nilai menjadi arahan dan pegangan bagi sikap dan perilaku sivitas akademika dan karyawan FKG Unbrah dalam
                menjalankan kegiatan sehari-hari. Dalam rangka mencapai keunggulan visi, sivitas akademika FKG Unbrah
                berpedoman pada nilai-nilai akhlakul karimah yang diamalkan oleh Nabi Muhammad SAW.
            </p>
            <ul class="list-disc list-inside ml-4 mb-4">
                <li><strong>Sidiq (jujur):</strong> sivitas akademika dalam melaksanakan tugasnya berpedoman pada prinsip
                    kejujuran dan mempertahankannya dalam segala situasi.</li>
                <li><strong>Amanah (dapat dipercaya):</strong> sivitas akademika mampu mengemban amanah dan kepercayaan yang
                    diberikan, serta bertanggung jawab dalam tindakan untuk mencapai visi misi yang telah ditetapkan.</li>
                <li><strong>Tabligh (menyampaikan):</strong> sivitas akademika selalu meningkatkan kompetensi diri dan dapat
                    menyampaikan solusi alternatif baru terhadap setiap permasalahan dalam pencapaian visi misi yang telah
                    ditetapkan.</li>
                <li><strong>Fathanah (cerdas):</strong> sivitas akademika mampu mencari ide-ide baru dengan tetap berpedoman
                    pada kaidah etika keilmuan dan profesionalisme.</li>
                <li><strong>Tawadhu (rendah hati):</strong> sivitas akademika mampu menerima kritik dengan terbuka, bekerja
                    di
                    tim secara kolaboratif, dan menghargai pekerjaan orang lain.</li>
                <li><strong>Dedikasi:</strong> sivitas akademika memiliki dedikasi atau jiwa pengabdian yang bersedia
                    mengorbankan waktu, tenaga, dan pikirannya demi keberhasilan kerjanya di nilai-nilai ini.</li>
            </ul>
        </div>
    </section>
@endsection
