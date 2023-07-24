<?php
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
class Task {
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at


    ){
        

    }
}
$tasks= [
    new Task(1,'Wake up','Wakeup for office',null,true,'2023-03-04 12:00:00','2023-03-04 12:00:00'),
    new Task(2,'Leave Home','Leave for office','Why null',false,'2023-03-04 12:00:00','2023-03-04 12:00:00')
];

Route :: get('/tasks',function() use ($tasks){
    return view('index',['tasks'=>$tasks]);
})->name('tasks.index');

Route:: get('/tasks/{id}', function($id) use($tasks){
    $task= collect($tasks)->firstWhere('id',$id);
    if(!$task){
        abort(Response::HTTP_NOT_FOUND);
    }
    return view('show',['task'=>$task]);
})->name('tasks.show');



Route :: get('/404',function(){
 return view('404');
})->name('404');

Route::fallback(function(){
    return redirect()->route('404');
});