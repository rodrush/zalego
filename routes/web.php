<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\UnitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(  ['middleware'=>['web','auth','verified']],
    function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/branch',[BranchController::class, 'index'])->name('branch');
        Route::post('/store', [BranchController::class, 'store'])->name('store');
        Route::get('/edit-branch/{id}',[BranchController::class, 'edit'])->name('edit');
        Route::put('/update-branch/{id}',[BranchController::class, 'update'])->name('update');
        Route::delete('/delete-branch/{id}', [BranchController::class, 'deleteBranch'])->name('delete-branch');
        Route::get('/show-branch/{id}', [BranchController::class, 'showBranch'])->name('show-branch');


        Route::get('/exams', [ExamController::class, 'exams'])->name('exams'); 
        Route::post('/exam',[ExamController::class, 'exam'])->name('exam');
        Route::put('/update/{id}',[ExamController::class, 'update'])->name('update');
        Route::get('/edit-exam/{id}',[ExamController::class, 'editExam'])->name('edit-exam');
        Route::delete('/delete-exam/{id}', [ExamController::class, 'deleteExam'])->name('delete-exam');
        Route::get('/show-exam/{id}', [ExamController::class, 'showExam'])->name('show-exam');

        Route::get('school',[SchoolController::class, 'school'])->name('school');
        Route::post('/store-school',[SchoolController::class, 'store'])->name('store-school');
        Route::put('/update-school/{id}',[SchoolController::class, 'updateSchool'])->name('update-school');
        Route::get('/edit-school/{id}',[SchoolController::class, 'editSchool'])->name('edit-school');
        Route::delete('/delete-school/{id}', [SchoolController::class, 'deleteSchool'])->name('delete-school');
        Route::get('/show-school/{id}', [SchoolController::class, 'showSchool'])->name('show-school');
        
        Route::get('lesson',[LessonController::class, 'lesson'])->name('lesson');
        Route::post('/store-lesson',[LessonController::class, 'store'])->name('store-lesson');
        Route::get('/create-lesson',[LessonController::class, 'create'])->name('create-lesson');
        Route::put('/update-lesson/{id}',[LessonController::class, 'updateLesson'])->name('update-lesson');
        Route::get('/edit-lesson/{id}',[LessonController::class, 'editLesson'])->name('edit-lesson');
        Route::delete('/delete-lesson/{id}', [LessonController::class, 'deleteLesson'])->name('delete-lesson');
        Route::get('/show-lesson/{id}', [LessonController::class, 'showLesson'])->name('show-lesson');

        Route::get('/course',[CourseController::class, 'index'])->name('course');
        Route::get('/course-create',[CourseController::class, 'create'])->name('course-create');
        Route::post('/store-course',[CourseController::class, 'store'])->name('store-course');
        Route::get('/edit-course/{id}',[CourseController::class, 'edit'])->name('edit-course');
        Route::put('/update-course/{id}',[CourseController::class,'update'])->name('update-course');
        Route::get('/show-course/{id}',[CourseController::class,'show'])->name('show-course');
        Route::delete('/destroy-course/{id}',[CourseController::class,'destroy'])->name('destroy-course');
         

        Route::resource('unit', UnitController::class);
        Route::get('/query-bulding',[UnitController::class,'queryBuilding'])->name('query-building');
        Route::resource('syllabus', SyllabusController::class);
    }); 

    