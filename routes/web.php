<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'name' => 'musyaffa',
        'roles' => ['Web Developer', 'UI/UX Designer', 'Fullstack Engineer'],
        'shortDesc' => 'Mahasiswa Informatika yang berfokus pada pengembangan website...',
        // ... variabel lainnya jika ingin dibuat dinamis dari database / controller
    ]);
});
