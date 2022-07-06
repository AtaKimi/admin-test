<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\GetJobsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Job;

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

Route::group(['middleware'=> 'auth:web'], function () {
	Route::prefix('admin')->group(function () {
		Route::get('dashboard', function () {
			$users_count = count(json_decode(file_get_contents('http://127.0.0.1:8000/api/users')));
			$jobs_count = count(json_decode(file_get_contents('http://127.0.0.1:8000/api/jobs')));
			$comments_count = count(json_decode(file_get_contents('http://127.0.0.1:8000/api/comments')));
			$events_count = count(json_decode(file_get_contents('http://127.0.0.1:8000/api/events')));
	
			return view(
				'dashboard',
				[
					'users_count' =>  $users_count,
					'jobs_count' =>  $jobs_count,
					'comments_count' =>  $comments_count,
					'events_count' =>  $events_count,
				]
			);
		})->name('dashboard');
	
		Route::get('user-management', function () {
			$users = json_decode(file_get_contents('http://127.0.0.1:8000/api/users'));
			return view('laravel-examples/user-management', ['users' => $users]);
		})->name('user-management');
	
		Route::get('job-management', function () {
			$jobs = json_decode(file_get_contents('http://127.0.0.1:8000/api/jobs'));
			foreach ($jobs as $job) {
				$job->requirments = explode(' ', $job->requirments);
				$job->tags = explode(' ', $job->tags);
			}
	
			return view('laravel-examples/job-management', ['jobs' => $jobs]);
		})->name('job-management');
	
		Route::get('comment-management', function () {
			$comments = json_decode(file_get_contents('http://127.0.0.1:8000/api/comments'));
			return view('laravel-examples/comment-management', ['comments' => $comments]);
		})->name('comment-management');
	
		Route::get('event-management', function () {
			$events = json_decode(file_get_contents('http://127.0.0.1:8000/api/events'));
			return view('laravel-examples/event-management', ['events' => $events]);
		})->name('event-management');
	
		Route::get('tables', function () {
			return view('tables');
		})->name('tables');
	});

	Route::get('dashboard', [HomeController::class, 'home']);
	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create'])->name('user-profile');
	Route::post('/user-profile', [InfoUserController::class, 'store']);
});



Route::group(['middleware' => 'guest'], function () {
	Route::get('/register', [RegisterController::class, 'create']);
	Route::post('/register', [RegisterController::class, 'store']);
	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');

Route::get('/', function () {
	$jobs = DB::table('jobs')->get();
	return view('job_list', ['jobs' => $jobs,]);
});

Route::get('/event', function () {
	$events = DB::table('events')->get();
	foreach ($events as $event) {
		$users = Event::find($event->id)->users()->get();
		$event->users = $users;
	}

	return view('event_list', ['events' => $events]);
});

Route::get('/job/{job}', [GetJobsController::class, 'getJob']);

Route::get('/user/{user}', function (User $user) {
	$user->events = $user->events()->get();
	$user->job_taken = User::find($user->id)->getJobTaken()->get() ?? '';
	return view('user_detail', ['user' => $user]);
});
