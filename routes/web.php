
<?php

//import de Java
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

//frontController

Route::get('/', [UploadController::class, 'index'])->name('upload.index');
Route::get('show/{id}', [UploadController::class, 'show'])->name('upload.show');  // SHOW IMG individual
Route::get('create', [UploadController::class, 'create'])->name('upload.create');  // Ruta para subir imágenes
Route::post('store', [UploadController::class, 'store'])->name('upload.store');  // Ruta de subida accesible a través de create



Route::get('/uploads/{upload}/view', [UploadController::class, 'view'])->name('photos.view');


