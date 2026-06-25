{{--
    Portfolio musyaffa - Web Developer & UI/UX Designer
    Handcrafted with Tailwind CSS & Alpine.js
    File: resources/views/portfolio.blade.php
    Redesigned to be fully responsive (Mobile & Desktop) and match Photo 2
--}}
<!DOCTYPE html>
<html class="scroll-smooth font-sans antialiased" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $name ?? 'musyaffa' }} | Web Developer & UI/UX Designer</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui'],
                        mono: ['"JetBrains Mono"', 'ui-monospace', 'SFMono-Regular'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js (Untuk Interaksi Client-Side Dinamis & Responsive) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        
        .clay-card {
            border: 2.5px solid #131b2e;
            box-shadow: 6px 6px 0px 0px rgba(19, 27, 46, 1);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .clay-card-hover:hover {
            transform: translate(-3px, -3px);
            box-shadow: 9px 9px 0px 0px rgba(19, 27, 46, 1);
        }
        .clay-btn-shadow {
            border: 2.5px solid #131b2e;
            box-shadow: 4px 4px 0px 0px rgba(19, 27, 46, 1), inset 2px 2px 4px rgba(255, 255, 255, 0.4);
            transition: all 0.15s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .clay-btn-hover:hover {
            transform: translate(-1.5px, -1.5px);
            box-shadow: 5.5px 5.5px 0px 0px rgba(19, 27, 46, 1), inset 2px 2px 4px rgba(255, 255, 255, 0.4);
        }
        .clay-btn-hover:active {
            transform: translate(2px, 2px);
            box-shadow: 1.5px 1.5px 0px 0px rgba(19, 27, 46, 1);
        }
        .clay-inset {
            box-shadow: inset 4px 4px 8px rgba(0,0,0,0.08), inset -4px -4px 8px rgba(255,255,255,0.7);
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>
<body 
    class="bg-[#faf8ff] text-[#131b2e] font-sans antialiased selection:bg-[#22c55e] selection:text-[#131b2e] min-h-screen"
    x-data="{ 
        mobileMenuOpen: false, 
        toastOpen: false, 
        toastMessage: '', 
        triggerToast(msg) {
            this.toastMessage = msg;
            this.toastOpen = true;
            setTimeout(() => { this.toastOpen = false; }, 3000);
        }
    }"
>

    <!-- Floating Toast Notification for copy events and simulator -->
    <div 
        x-show="toastOpen" 
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95"
        class="fixed bottom-6 right-6 z-50 bg-white border-[2.5px] border-[#131b2e] rounded-2xl px-5 py-4 shadow-[4px_4px_0px_0px_rgba(19,27,46,1)] flex items-center gap-3"
    >
        <div class="bg-[#22c55e] text-white border-2 border-[#131b2e] p-1.5 rounded-lg flex items-center justify-center">
            <svg class="w-4 h-4 stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <p class="text-xs sm:text-sm font-black text-[#131b2e]" x-text="toastMessage"></p>
    </div>

    {{-- 1. HEADER NAVIGATION --}}
    <nav class="sticky top-0 z-40 w-full px-4 sm:px-8 py-4 max-w-7xl mx-auto backdrop-blur-md bg-transparent">
        <div class="flex items-center justify-between bg-white border-[2.5px] border-[#131b2e] rounded-2xl px-5 sm:px-6 py-3.5 w-full shadow-[6px_6px_0px_0px_rgba(19,27,46,1)] transition-all hover:shadow-[8px_8px_0px_0px_rgba(19,27,46,1)]">
            
            <!-- Logo -->
            <a href="#" class="flex items-center gap-2.5 cursor-pointer group">
                <div class="bg-[#ff82c2] p-2 border-2 border-[#131b2e] rounded-xl shadow-[3px_3px_0px_0px_rgba(19,27,46,1)] flex items-center justify-center transform group-hover:rotate-6 transition-transform">
                    <svg class="w-5 h-5 text-[#131b2e]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.15"></path></svg>
                </div>
                <span class="text-xl sm:text-2xl font-extrabold tracking-tight text-[#131b2e]">
                    {{ $name ?? 'musyaffa' }}
                </span>
            </a>

            <!-- Desktop Links -->
            <div class="hidden md:flex items-center gap-8">
                <a href="#tentang" class="text-[#131b2e] font-bold text-sm tracking-wide relative hover:text-[#006e2f] transition-colors">Tentang</a>
                <a href="#keahlian" class="text-[#131b2e] font-bold text-sm tracking-wide relative hover:text-[#006e2f] transition-colors">Keahlian</a>
                <a href="#portofolio" class="text-[#131b2e] font-bold text-sm tracking-wide relative hover:text-[#006e2f] transition-colors">Portofolio</a>
                <a href="#kontak" class="text-[#131b2e] font-bold text-sm tracking-wide relative hover:text-[#006e2f] transition-colors">Kontak</a>
            </div>

            <!-- Action Button -->
            <div class="hidden md:flex items-center gap-4">
                <a href="#kontak" class="text-sm font-extrabold text-[#131b2e] hover:text-[#006e2f] transition-colors">Kontak</a>
                <button 
                    @click="triggerToast('Simulasi: CV Musyaffa berhasil diunduh!')"
                    class="bg-[#22c55e] text-[#131b2e] border-2 border-[#131b2e] px-5 py-2 rounded-xl text-sm font-extrabold shadow-[3px_3px_0px_0px_rgba(19,27,46,1)] clay-btn-hover cursor-pointer flex items-center gap-2"
                >
                    <svg class="w-4 h-4 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Unduh CV
                </button>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <div class="md:hidden">
                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen" 
                    class="w-12 h-12 flex items-center justify-center border-2 border-[#131b2e] rounded-full bg-white text-[#131b2e] shadow-[2px_2px_0px_0px_rgba(19,27,46,1)] hover:shadow-[3px_3px_0px_0px_rgba(19,27,46,1)] active:translate-x-[1px] active:translate-y-[1px] cursor-pointer transition-all"
                >
                    <template x-if="!mobileMenuOpen">
                        <svg class="w-5 h-5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </template>
                    <template x-if="mobileMenuOpen">
                        <svg class="w-5 h-5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </template>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div 
            x-show="mobileMenuOpen" 
            x-cloak 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-[-10px]"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-[-10px]"
            class="md:hidden mt-2"
        >
            <div class="bg-white border-[2.5px] border-[#131b2e] rounded-2xl p-5 shadow-[5px_5px_0px_0px_rgba(19,27,46,1)] flex flex-col gap-4">
                <a href="#tentang" @click="mobileMenuOpen = false" class="text-[#131b2e] font-bold text-base border-b border-gray-100 pb-2 transition-colors hover:text-[#006e2f]">Tentang</a>
                <a href="#keahlian" @click="mobileMenuOpen = false" class="text-[#131b2e] font-bold text-base border-b border-gray-100 pb-2 transition-colors hover:text-[#006e2f]">Keahlian</a>
                <a href="#portofolio" @click="mobileMenuOpen = false" class="text-[#131b2e] font-bold text-base border-b border-gray-100 pb-2 transition-colors hover:text-[#006e2f]">Portofolio</a>
                <a href="#kontak" @click="mobileMenuOpen = false" class="text-[#131b2e] font-bold text-base border-b border-gray-100 pb-2 transition-colors hover:text-[#006e2f]">Kontak</a>
                <div class="flex flex-col gap-3 pt-2">
                    <button 
                        @click="mobileMenuOpen = false; triggerToast('Simulasi: CV Musyaffa berhasil diunduh!')"
                        class="bg-[#22c55e] text-[#131b2e] border-2 border-[#131b2e] py-3 rounded-xl text-center text-sm font-extrabold shadow-[3px_3px_0px_0px_rgba(19,27,46,1)] hover:scale-[1.01] flex items-center justify-center gap-2 cursor-pointer"
                    >
                        <svg class="w-4 h-4 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Unduh Curriculum Vitae
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-8 space-y-16 sm:space-y-24 pb-20 overflow-x-hidden">

        {{-- 2. HERO SECTION --}}
        <section id="beranda" class="flex flex-col lg:flex-row items-center justify-between py-12 lg:py-20 gap-12 mt-4 select-none text-left scroll-mt-24">
            <div class="flex-1 space-y-6 md:space-y-8 z-10">
                <div class="inline-flex items-center gap-2 bg-[#22c55e] text-[#131b2e] border-2 border-[#131b2e] px-4 py-1.5 rounded-full text-xs font-black shadow-[3px_3px_0px_0px_rgba(19,27,46,1)]">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-[#131b2e]"></span>
                    </span>
                    <span class="font-mono tracking-wide">bersedia untuk magang</span>
                </div>

                <div class="space-y-3">
                    <p class="text-lg font-extrabold text-[#006e2f] tracking-wide font-mono leading-none">Halo semuanya, Saya</p>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.1] text-[#131b2e]">
                        {{ $name ?? 'musyaffa' }}
                    </h1>
                    <div class="flex flex-wrap gap-2.5 pt-2">
                        @foreach($roles ?? ['Web Developer', 'UI/UX Designer', 'Fullstack Engineer'] as $index => $role)
                            <span class="text-[#131b2e] border-2 border-[#131b2e] px-3.5 py-1 rounded-lg text-xs sm:text-sm font-extrabold shadow-[2px_2px_0px_0px_rgba(19,27,46,1)] {{ $index === 0 ? 'bg-[#40c2fd]' : ($index === 1 ? 'bg-[#ff82c2]' : 'bg-[#e2e8f0]') }}">
                                {{ $role }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <p class="text-base sm:text-lg font-semibold text-[#3d4a3d] max-w-xl leading-relaxed">
                    {{ $shortDesc ?? 'Mahasiswa Informatika yang berfokus pada pengembangan website dan teknologi modern untuk menciptakan solusi digital yang bermanfaat..' }}
                </p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#portofolio" class="inline-flex items-center gap-3 px-8 py-4 bg-[#007f2d] border-[3px] border-[#131b2e] rounded-2xl text-white font-black shadow-[5px_5px_0px_0px_rgba(19,27,46,1)] clay-btn-hover transition-all">
                        Lihat Portofolio
                        <svg class="w-5 h-5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>

                    <a href="#kontak" class="inline-flex items-center gap-3 px-8 py-4 bg-[#40c2fd] border-[3px] border-[#131b2e] rounded-2xl text-[#131b2e] font-black shadow-[5px_5px_0px_0px_rgba(19,27,46,1)] clay-btn-hover transition-all">
                        Hubungi Saya
                    </a>
                </div>
            </div>

            <!-- Profile Photo Frame -->
            <div class="flex-1 w-full max-w-[280px] sm:max-w-[340px] relative mx-auto lg:mx-0">
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-[#ff82c2] rounded-full floating-element blur-sm opacity-50"></div>
                <div class="absolute -bottom-6 -left-6 w-28 h-28 bg-[#40c2fd] rounded-full floating-element delay-3000 blur-sm opacity-40"></div>

                <div class="relative bg-white border-[3px] border-[#131b2e] rounded-3xl p-4 shadow-[8px_8px_0px_0px_rgba(19,27,46,1)] transition-all duration-300 z-10">
                    <div class="w-full aspect-[4/5] rounded-2xl overflow-hidden border-2 border-[#131b2e] bg-[#faf8ff] relative">
                    <img src="{{ asset('images/profile.png') }}"alt="Foto Profil" class="w-full h-full object-cover">
                    </div>
                    <div class="mt-4 flex items-center justify-between px-1">
                        <div>
                            <p class="text-[10px] font-black text-[#5c6d5c] uppercase font-mono tracking-wider">Lokasi</p>
                            <p class="font-extrabold text-[#131b2e] text-sm flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-[#006e2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Malang, Indonesia
                            </p>
                        </div>
                        <a href="https://github.com" target="_blank" class="p-2.5 border-2 border-[#131b2e] bg-white hover:bg-slate-50 active:translate-y-0.5 rounded-xl shadow-[3px_3px_0px_0px_rgba(19,27,46,1)] text-xs font-black flex items-center gap-1.5 transition-all">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            GitHub
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- 3. ABOUT SECTION --}}
        <section id="tentang" class="py-4 select-none text-left scroll-mt-24">
            <div class="mb-12 max-w-2xl space-y-4">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#131b2e]">
                    Tentang <span class="text-[#006e2f] inline-block border-b-4 border-[#22c55e]">Saya</span>
                </h2>
                <p class="text-base sm:text-lg font-semibold text-[#3d4a3d]">
                    Perkenalan singkat, riwayat akademik, dan pengalaman organisasi yang pernah saya lalui.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                <!-- Left Details -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="bg-white border-[2.5px] border-[#131b2e] rounded-3xl p-6 sm:p-8 shadow-[6px_6px_0px_0px_rgba(19,27,46,1)]">
                        <h3 class="text-xl font-extrabold text-[#131b2e] mb-4 flex items-center gap-2">
                            <span class="w-3.5 h-3.5 bg-[#0a5c36] rounded-full border border-[#131b2e]"></span> Perkenalan
                        </h3>
                        <p class="text-sm sm:text-base font-semibold leading-relaxed text-[#3d4a3d]">
                            {{ $introduction ?? 'Mahasiswa aktif Program Studi Teknologi Informasi yang memiliki minat dan kemampuan dalam pengembangan perangkat lunak, pengelolaan basis data, serta implementasi teknologi berbasis web. Memiliki pengalaman mengerjakan proyek akademik yang melibatkan pengembangan website, integrasi database, dan penerapan konsep pemrograman berorientasi objek. Aktif dalam kegiatan organisasi yang membantu mengembangkan kemampuan komunikasi, koordinasi, dan kerja sama tim. Terbiasa bekerja secara teliti, disiplin, dan bertanggung jawab dalam menyelesaikan tugas maupun proyek. Memiliki semangat belajar yang tinggi serta motivasi untuk terus mengembangkan keterampilan teknis dan profesional melalui kesempatan magang di bidang Teknologi Informasi.' }}
                        </p>
                    </div>

                    <div class="bg-[#ff82c2]/10 border-[2.5px] border-[#131b2e] rounded-3xl p-6 sm:p-8 shadow-[6px_6px_0px_0px_rgba(19,27,46,1)]">
                        <h3 class="text-xl font-extrabold text-[#131b2e] mb-4">Minat &amp; Bidang Fokus</h3>
                        <div class="flex flex-wrap gap-2.5">
                            @foreach($interests ?? ['Desain Taktil & Neobrutalisme', 'Animasi Web Interaktif', 'Arsitektur Backend', 'Teknologi Hijau'] as $interest)
                                <span class="bg-white border-2 border-[#131b2e] px-3.5 py-1.5 rounded-xl text-xs sm:text-sm font-extrabold shadow-[2px_2px_0px_0px_rgba(19,27,46,1)] flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-[#ff82c2]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                    {{ $interest }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Timelines -->
                <div class="lg:col-span-7 space-y-8">
                    <!-- Pendidikan -->
                    <div class="space-y-4">
                        <h3 class="text-2xl font-extrabold text-[#131b2e] flex items-center gap-2">
                            <svg class="w-6 h-6 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"></path></svg>
                            Riwayat Pendidikan
                        </h3>
                        <div class="space-y-4">
                            @foreach($education ?? [
                                ['school' => 'Universitas Brawijaya', 'degree' => 'D3 Teknologi Informasi', 'period' => '2024 - Sekarang', 'desc' => 'Mendalami rekayasa kebutuhan perangkat lunak dan interaksi manusia-komputer.'],
                                ['school' => 'MA Negeri 3 Palembang', 'degree' => 'Ilmu Pengetahuan Sosial', 'period' => '2021 - 2024', 'desc' => 'Dasar pemrograman web, algoritma dasar, transaksional database.']
                            ] as $edu)
                                <div class="bg-white border-2 border-[#131b2e] rounded-2xl p-5 sm:p-6 shadow-[4px_4px_0px_0px_rgba(19,27,46,1)]">
                                    <div class="flex justify-between items-start gap-4">
                                        <div>
                                            <h4 class="font-extrabold text-base sm:text-lg text-[#131b2e]">{{ $edu['school'] }}</h4>
                                            <p class="text-xs sm:text-sm font-black text-[#5c6d5c]">{{ $edu['degree'] }}</p>
                                        </div>
                                        <span class="bg-[#e2e8f0] border-2 border-[#131b2e] px-2.5 py-1 rounded-lg text-xs font-black shrink-0">{{ $edu['period'] }}</span>
                                    </div>
                                    <p class="text-xs sm:text-sm font-semibold text-[#3d4a3d] mt-3 border-t border-slate-100 pt-2.5">{{ $edu['desc'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Pengalaman -->
                    <div class="space-y-4">
                        <h3 class="text-2xl font-extrabold text-[#131b2e] flex items-center gap-2">
                            <svg class="w-6 h-6 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Pengalaman Organisasi
                        </h3>
                        <div class="space-y-4">
                            @foreach($experience ?? [
                                ['role' => 'BEM Fakultas Vokasi', 'company' => 'Staff Ahli Badan Jaminan Mutu Organisasi', 'period' => 'Feb 2025 - Dec 2025']
                                ['role' => 'Himpunan Mahasiswa Teknologi Informasi', 'company' => 'Staff Magang Departemen Minat dan Bakat, Staff Ahli Departemen Minat dan Bakat', 'period' => 'Sep 2024 - Nov 2025', 'desc' => 'Dua pilar: Desain figma interaktif dan deployment web responsif klien.']
                            ] as $exp)
                                <div class="bg-white border-2 border-[#131b2e] rounded-2xl p-5 sm:p-6 shadow-[4px_4px_0px_0px_rgba(19,27,46,1)]">
                                    <div class="flex justify-between items-start gap-4">
                                        <div>
                                            <h4 class="font-extrabold text-base sm:text-lg text-[#131b2e]">{{ $exp['role'] }}</h4>
                                            <p class="text-xs sm:text-sm font-black text-[#5c6d5c]">{{ $exp['company'] }}</p>
                                        </div>
                                        <span class="bg-[#e2e8f0] border-2 border-[#131b2e] px-2.5 py-1 rounded-lg text-xs font-black shrink-0">{{ $exp['period'] }}</span>
                                    </div>
                                    <p class="text-xs sm:text-sm font-semibold text-[#3d4a3d] mt-3 border-t border-slate-100 pt-2.5">{{ $exp['desc'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 4. KEAHLIAN/SKILLS SECTION --}}
        <section id="keahlian" class="py-4 select-none text-left scroll-mt-24">
            <div class="mb-12 max-w-2xl space-y-4">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#131b2e]">
                    Keahlian &amp; <span class="text-[#a43073] inline-block border-b-4 border-[#ff82c2]">Kemampuan</span>
                </h2>
                <p class="text-base sm:text-lg font-semibold text-[#3d4a3d]">
                    Kategori keahlian yang terbagi secara mendalam untuk penataan aplikasi full-stack yang andal.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $skillsList = [
                        ['category' => 'Frontend', 'items' => ['HTML' => '90%', 'CSS' => '85%', 'JavaScript' => '80%', 'Bootstrap' => '75%'], 'color' => 'bg-[#40c2fd]'],
                        ['category' => 'Backend', 'items' => ['PHP' => '85%', 'Laravel' => '82%'], 'color' => 'bg-[#ff82c2]'],
                        ['category' => 'Database', 'items' => ['MySQL' => '80%', 'SQLite' => '75%'], 'color' => 'bg-[#ffc83b]'],
                        ['category' => 'Tools', 'items' => ['Git' => '85%', 'GitHub' => '80%', 'VS Code' => '92%'], 'color' => 'bg-[#22c55e]']
                    ];
                @endphp

                @foreach($skillsList as $cat)
                    <div class="bg-white border-[2.5px] border-[#131b2e] rounded-[2rem] p-6 shadow-[5px_5px_0px_0px_rgba(19,27,46,1)]">
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-xs font-black tracking-wider uppercase font-mono bg-[#faf8ff] border-2 border-[#131b2e] px-2.5 py-1 rounded-lg">
                                {{ $cat['category'] }}
                            </span>
                            <span class="w-3.5 h-3.5 rounded-full {{ $cat['color'] }} border-2 border-[#131b2e]"></span>
                        </div>

                        <div class="space-y-4">
                            @foreach($cat['items'] as $skillName => $skillPercent)
                                <div class="p-3 bg-[#faf8ff] border-2 border-[#131b2e]/10 hover:border-[#131b2e] rounded-xl transition-all">
                                    <div class="flex justify-between items-center text-xs mb-1.5">
                                        <span class="font-extrabold text-[#131b2e]">{{ $skillName }}</span>
                                        <span class="text-[10px] font-mono font-black text-slate-500">{{ $skillPercent }}</span>
                                    </div>
                                    <div class="w-full h-2 bg-slate-100 rounded-full p-0.5 overflow-hidden">
                                        <div class="h-full rounded-full bg-[#131b2e]" style="width: {{ $skillPercent }}"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- 5. PROJECTS SECTION --}}
        <section id="portofolio" class="py-4 select-none text-left scroll-mt-24">
            <div class="mb-12 max-w-2xl space-y-4">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#131b2e]">
                    Proyek <span class="text-[#006e2f] inline-block border-b-4 border-[#22c55e]">Unggulan</span>
                </h2>
                <p class="text-base sm:text-lg font-semibold text-[#3d4a3d]">
                    Karya portofolio terpilih dengan detail teknologi lengkap serta link live demo interaktif.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $projectsList = [
                        ['name' => 'E-Commerce KaryaKita', 'tag' => 'Laravel / PHP', 'desc' => 'Toko online terintegrasi transaksi database, pencatatan transaksi untuk produk kreatif pengrajin lokal.', 'image' => 'https://images.unsplash.com/photo-1563013544-824ae1d704d3?auto=format&fit=crop&q=80&w=800', 'tech' => ['PHP', 'Laravel', 'MySQL', 'Tailwind CSS']],
                        ['name' => 'AeroCast Weather Dashboard', 'tag' => 'Frontend', 'desc' => 'Pencarian perkiraan cuaca kota, visualisasi modern grafik kelembaban, serta penataan modern taktil.', 'image' => 'https://images.unsplash.com/photo-1504608524841-42fe6f032b4b?auto=format&fit=crop&q=80&w=800', 'tech' => ['HTML', 'CSS', 'JavaScript', 'Bootstrap']],
                        ['name' => 'FocusTask Suite', 'tag' => 'Fullstack', 'desc' => 'Dasbor pengelola tugas harian, prioritas berbasis SQLite, serta visualisasi charts produktivitas.', 'image' => 'https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?auto=format&fit=crop&q=80&w=800', 'tech' => ['Laravel', 'SQLite', 'Tailwind', 'ChartJS']]
                    ];
                @endphp

                @foreach($projectsList as $proj)
                    <div class="bg-white border-[2.5px] border-[#131b2e] rounded-[2rem] overflow-hidden shadow-[6px_6px_0px_0px_rgba(19,27,46,1)] flex flex-col justify-between group transition-all duration-300 hover:translate-y-[-4px] hover:shadow-[8px_8px_0px_0px_rgba(19,27,46,1)]">
                        <div>
                            <div class="relative bg-slate-100 aspect-[4/3] border-b-2 border-[#131b2e] overflow-hidden">
                                <img src="{{ $proj['image'] }}" alt="{{ $proj['name'] }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                <span class="absolute top-3.5 right-3.5 bg-[#40c2fd] border-2 border-[#131b2e] px-2.5 py-1 rounded-xl text-[10px] font-black uppercase shadow-[2px_2px_0px_0px_rgba(19,27,46,1)]">
                                    {{ $proj['tag'] }}
                                </span>
                            </div>

                            <div class="p-6 space-y-3.5">
                                <h3 class="text-xl sm:text-2xl font-extrabold text-[#131b2e] line-clamp-1 group-hover:text-[#006e2f] transition-colors">
                                    {{ $proj['name'] }}
                                </h3>
                                <p class="text-xs sm:text-sm font-semibold text-[#5c6d5c] leading-relaxed line-clamp-3">
                                    {{ $proj['desc'] }}
                                </p>
                                <div class="flex flex-wrap gap-1.5 pt-1">
                                    @foreach($proj['tech'] as $tech)
                                        <span class="bg-[#faf8ff] border border-[#131b2e]/15 px-2 py-1 rounded-lg text-[10px] font-black tracking-wide text-[#131b2e] font-mono">
                                            #{{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="p-6 pt-0 border-t border-[#131b2e]/5 mt-4 flex items-center justify-between gap-4">
                            <a href="https://github.com" target="_blank" class="flex-1 text-center py-2.5 px-3 border-2 border-[#131b2e] bg-white rounded-xl text-xs font-black text-[#131b2e] shadow-[2.5px_2.5px_0px_0px_rgba(19,27,46,1)] hover:bg-slate-50 active:translate-y-[1px] transition-all">
                                Repo Github
                            </a>
                            <a href="#" onclick="alert('Demo disimulasikan')" class="flex-1 text-center py-2.5 px-3 border-2 border-[#131b2e] bg-[#22c55e] rounded-xl text-xs font-black text-[#131b2e] shadow-[2.5px_2.5px_0px_0px_rgba(19,27,46,1)] hover:opacity-95 active:translate-y-[1px] transition-all">
                                Live Demo
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- 6. CONTACT SECTION (Redesigned to match Photo 2 exactly and be completely responsive) --}}
        <section id="kontak" class="py-4 select-none text-left scroll-mt-24 max-w-3xl mx-auto">
            <div class="bg-white border-[2.5px] border-[#131b2e] rounded-[2rem] p-6 sm:p-10 shadow-[8px_8px_0px_0px_rgba(19,27,46,1)] space-y-6 sm:space-y-8">
                
                <!-- Header Content -->
                <div class="space-y-3">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#131b2e]">
                        Mari berkolaborasi
                    </h2>
                    <p class="text-sm sm:text-base font-semibold text-[#3d4a3d] leading-relaxed max-w-2xl">
                        Punya project, ide, atau sekadar ingin sapa? Saya terbuka untuk diskusi &amp; kerja sama. Hubungi saya lewat email atau WhatsApp di bawah ini.
                    </p>
                </div>

                <!-- Social Media Circular Icons -->
                <div class="flex items-center gap-4">
                    <a 
                        href="https://github.com" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        aria-label="GitHub"
                        class="w-12 h-12 flex items-center justify-center bg-white border-[2.5px] border-[#131b2e] rounded-full shadow-[3px_3px_0px_0px_rgba(19,27,46,1)] hover:translate-x-[-1.5px] hover:translate-y-[-1.5px] hover:shadow-[4.5px_4.5px_0px_0px_rgba(19,27,46,1)] active:translate-x-[1.5px] active:translate-y-[1.5px] active:shadow-[1px_1px_0px_0px_rgba(19,27,46,1)] transition-all cursor-pointer"
                    >
                        <svg class="w-5 h-5 text-[#131b2e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    </a>

                    <a 
                        href="https://linkedin.com" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        aria-label="LinkedIn"
                        class="w-12 h-12 flex items-center justify-center bg-white border-[2.5px] border-[#131b2e] rounded-full shadow-[3px_3px_0px_0px_rgba(19,27,46,1)] hover:translate-x-[-1.5px] hover:translate-y-[-1.5px] hover:shadow-[4.5px_4.5px_0px_0px_rgba(19,27,46,1)] active:translate-x-[1.5px] active:translate-y-[1.5px] active:shadow-[1px_1px_0px_0px_rgba(19,27,46,1)] transition-all cursor-pointer"
                    >
                        <svg class="w-5 h-5 text-[#131b2e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    </a>

                    <a 
                        href="https://instagram.com" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        aria-label="Instagram"
                        class="w-12 h-12 flex items-center justify-center bg-white border-[2.5px] border-[#131b2e] rounded-full shadow-[3px_3px_0px_0px_rgba(19,27,46,1)] hover:translate-x-[-1.5px] hover:translate-y-[-1.5px] hover:shadow-[4.5px_4.5px_0px_0px_rgba(19,27,46,1)] active:translate-x-[1.5px] active:translate-y-[1.5px] active:shadow-[1px_1px_0px_0px_rgba(19,27,46,1)] transition-all cursor-pointer"
                    >
                        <svg class="w-5 h-5 text-[#131b2e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                </div>

                <!-- Direct Contact Medium Cards -->
                <div class="space-y-4">
                    
                    <!-- GMAIL Card -->
                    <div class="group relative flex flex-col sm:flex-row sm:items-center justify-between p-5 bg-white border-[2.5px] border-[#131b2e] rounded-2xl shadow-[5px_5px_0px_0px_rgba(19,27,46,1)] transition-all duration-300 hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-[7px_7px_0px_0px_rgba(19,27,46,1)]">
                        <a 
                            href="mailto:syaffazaki@gmail.com" 
                            class="flex items-center gap-4 flex-1"
                        >
                            <!-- Square-ish Rounded Icon Area -->
                            <div class="w-12 h-12 bg-white border-[2px] border-[#131b2e] rounded-xl flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_rgba(19,27,46,1)]">
                                <svg class="w-5 h-5 text-[#131b2e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </div>
                            
                            <!-- Card text -->
                            <div>
                                <span class="block text-[10px] font-black uppercase text-slate-400 font-mono tracking-widest leading-none mb-1">GMAIL</span>
                                <span class="block text-sm sm:text-base font-extrabold text-[#131b2e] break-all">syaffazaki@gmail.com</span>
                            </div>
                        </a>

                        <!-- Hover interactions / click indicators -->
                        <div class="flex items-center gap-2 mt-4 sm:mt-0 sm:self-center">
                            <button 
                                @click="navigator.clipboard.writeText('syaffazaki@gmail.com'); triggerToast('Email berhasil disalin ke clipboard!')"
                                title="Salin Email"
                                class="p-2 border border-[#131b2e]/10 hover:border-[#131b2e] rounded-lg text-slate-500 hover:text-[#131b2e] transition-colors cursor-pointer"
                            >
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                            </button>
                            <a 
                                href="mailto:syaffazaki@gmail.com"
                                class="p-2 text-[#131b2e] transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"
                                aria-label="Kirim Email"
                            >
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7,7 17,7 17,17"></polyline></svg>
                            </a>
                        </div>
                    </div>

                    <!-- WHATSAPP Card -->
                    <div class="group relative flex flex-col sm:flex-row sm:items-center justify-between p-5 bg-white border-[2.5px] border-[#131b2e] rounded-2xl shadow-[5px_5px_0px_0px_rgba(19,27,46,1)] transition-all duration-300 hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-[7px_7px_0px_0px_rgba(19,27,46,1)]">
                        <a 
                            href="https://wa.me/6281234567890" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="flex items-center gap-4 flex-1"
                        >
                            <!-- Square-ish Rounded Icon Area -->
                            <div class="w-12 h-12 bg-white border-[2px] border-[#131b2e] rounded-xl flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_rgba(19,27,46,1)]">
                                <svg class="w-5 h-5 text-[#131b2e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            </div>

                            <!-- Card text -->
                            <div>
                                <span class="block text-[10px] font-black uppercase text-slate-400 font-mono tracking-widest leading-none mb-1">WHATSAPP</span>
                                <span class="block text-sm sm:text-base font-extrabold text-[#131b2e]">+62 812-3456-7890</span>
                            </div>
                        </a>

                        <!-- Hover interactions / click indicators -->
                        <div class="flex items-center gap-2 mt-4 sm:mt-0 sm:self-center">
                            <button 
                                @click="navigator.clipboard.writeText('+6281234567890'); triggerToast('Nomor WhatsApp berhasil disalin ke clipboard!')"
                                title="Salin Nomor WhatsApp"
                                class="p-2 border border-[#131b2e]/10 hover:border-[#131b2e] rounded-lg text-slate-500 hover:text-[#131b2e] transition-colors cursor-pointer"
                            >
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                            </button>
                            <a 
                                href="https://wa.me/6281234567890"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="p-2 text-[#131b2e] transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"
                                aria-label="Buka WhatsApp"
                            >
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7,7 17,7 17,17"></polyline></svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    {{-- 7. FOOTER --}}
    <footer class="w-full rounded-t-[3rem] border-t-[2.5px] border-[#131b2e] bg-slate-100 py-12 text-left">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-[#5c6d5c] text-xs sm:text-sm font-semibold">
            <span>© 2026 {{ $name ?? 'musyaffa' }}. Handcrafted with Blade &amp; Tailwind.</span>
            <span class="flex items-center gap-1.5">
                Made with <span class="text-[#22c55e]">💚</span> in Malang, Indonesia
            </span>
        </div>
    </footer>

</body>
</html>
