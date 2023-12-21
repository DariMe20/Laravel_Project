<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\AgendaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::get('/', [HomeController::class,'index'])->name('home');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [EventController::class, 'index']);  //afisare lista evenimente pe pagina de start
    Route::resource('events', EventController::class);  // Ruta de resurse va genera CRUD-URI
    Route::get('/', [TicketController::class, 'index']); 
    Route::resource('tickets', TicketController::class);
    Route::get('/', [SponsorController::class, 'index']); 
    Route::resource('sponsors', SponsorController::class);
    Route::get('/', [SpeakerController::class, 'index']);
    Route::resource('speakers', SpeakerController::class);
    Route::get('/', [PartnerController::class, 'index']);
    Route::resource('partners', PartnerController::class);
    Route::get('/', [AgendaController::class, 'index']);
    Route::resource('agendas', AgendaController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('events/{event}/manage-speakers', [EventController::class, 'manageSpeakers'])->name('events.manageSpeakers');
Route::post('events/{event}/add-speaker', [EventController::class, 'addSpeaker'])->name('events.addSpeaker');
Route::delete('events/{event}/remove-speaker/{speaker}', [EventController::class, 'removeSpeaker'])->name('events.removeSpeaker');
Route::get('events/{event}/speakers', [EventController::class, 'showSpeakers'])->name('events.showSpeakers');
Route::get('events/{event}/sponsors', [EventController::class, 'showSponsors'])->name('events.showSponsors');
Route::get('events/{event}/partners', [EventController::class, 'showPartners'])->name('events.showPartners');

Route::get('events/{event}/manage-sponsors', [EventController::class, 'manageSponsors'])->name('events.manageSponsors');
Route::post('events/{event}/add-sponsor', [EventController::class, 'addSponsor'])->name('events.addSponsor');
Route::delete('events/{event}/remove-sponsor/{sponsor}', [EventController::class, 'removeSponsor'])->name('events.removeSponsor');
Route::get('events/{event}/manage-partners', [EventController::class, 'managePartners'])->name('events.managePartners');
Route::post('events/{event}/add-partner', [EventController::class, 'addPartner'])->name('events.addPartner');
Route::delete('events/{event}/remove-partner/{partner}', [EventController::class, 'removePartner'])->name('events.removePartner');

Route::get('cart', [TicketController::class, 'cart'])->name('cart.index');
Route::get('add-to-cart/{id}', [TicketController::class, 'addToCart']);
Route::patch('update-cart', [TicketController::class, 'update_cart']); // Modify the cart
Route::delete('remove-from-cart', [TicketController::class, 'remove']); // Remove from the cart



});
?>

