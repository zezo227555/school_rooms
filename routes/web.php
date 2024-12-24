<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsUserLogedIn;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login_form'])->name('auth.login_form');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::middleware(IsUserLogedIn::class)->group(function (){

    Route::get('/', function () {
        $computer_rooms_available = Room::where('type', '=', 'معمل حاسوب')->where('available', '=', 1)->get();
        $class_rooms_available = Room::where('type', '=', 'فصل')->where('available', '=', 1)->get();
        $stage_rooms_available = Room::where('type', '=', 'مدرج')->where('available', '=', 1)->get();
        $computer_rooms = Room::where('type', '=', 'معمل حاسوب')->where('available', '=', 0)->get();
        $class_rooms = Room::where('type', '=', 'فصل')->where('available', '=', 0)->get();
        $stage_rooms = Room::where('type', '=', 'مدرج')->where('available', '=', 0)->get();
        $admin = User::where('role', '=', 'مسؤول نظام')->get();
        $student = User::where('role', '=', 'طالب')->get();
        $teacher = User::where('role', '=', 'عضو هيئة تدريس')->get();
        return view('welcome', [
            'computer_rooms_available' => $computer_rooms_available,
            'class_rooms_available' => $class_rooms_available,
            'stage_rooms_available' => $stage_rooms_available,
            'computer_rooms' => $computer_rooms,
            'class_rooms' => $class_rooms,
            'stage_rooms' => $stage_rooms,
            'admin' => $admin,
            'student' => $student,
            'teacher' => $teacher,
        ]);
    })->name('main');

    // users
    Route::resource('user', UserController::class);
    Route::get('user/show_user/{user_id}', [UserController::class, 'show_user'])->name('user.show_user');

    // rooms
    Route::resource('room', RoomController::class);
    Route::get('reports', [RoomController::class,'report'])->name('room.report');
    Route::get('reports/show', [RoomController::class,'report_show'])->name('room.report_show');

    // booking
    Route::resource('booking', BookingController::class);
    Route::get('booking/select/time_table', [BookingController::class, 'time_table'])->name('booking.time_table');
    Route::get('booking/select/month', [BookingController::class, 'select_the_month_table'])->name('booking.select_the_month_table');
    Route::get('booking/select/time', [BookingController::class, 'select_time'])->name('booking.select_time');

    // emails
    Route::get('booking/{booking_id}/message_form', [BookingController::class, 'message_form'])->name('booking.message_form');
    Route::post('booking/send_massege', [BookingController::class, 'send_massege'])->name('booking.send_massege');
    Route::get('booking/multiple_message/form', [BookingController::class, 'multiple_message_form'])->name('booking.multiple_message_form');
    Route::post('booking/multiple_message/send', [BookingController::class, 'multiple_message_send'])->name('booking.multiple_message_send');

    // rating
    Route::resource('reating', RatingController::class);
    Route::get('reating/booking/{booking_id}/create', [RatingController::class, 'create'])->name('reating.create');
});


