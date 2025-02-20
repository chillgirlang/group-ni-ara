<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Appointment Backend Route - Mindanao
// Route for viewing all appointments
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');

// Route for displaying a form to create a new appointment
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');

// Route for storing a new appointment in the database
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

// Route for viewing a specific appointment's details
Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');

// Route for displaying a form to edit an appointment
Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');

// Route for updating an existing appointment
Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');

// Route for deleting an appointment
Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
