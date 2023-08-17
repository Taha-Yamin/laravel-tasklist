<?php
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
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
// class Task {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at


//     ){
        

//     }
// }
// $tasks= [
//     new Task(1,'Wake up','Wakeup for office',null,true,'2023-03-04 12:00:00','2023-03-04 12:00:00'),
//     new Task(2,'Leave Home','Leave for office','Why null',false,'2023-03-04 12:00:00','2023-03-04 12:00:00')
// ];
Route::get('/',function(){
    return view('index',[ 'tasks'=> Task::latest()->paginate()]);
});
Route :: get('/tasks',function() {
    return view('index',[
        'tasks'=> Task::latest()->paginate()
]);
    // return view('index',['tasks'=> Task::where('completed',true)->get()]);
})->name('tasks.index');




Route:: get('/tasks/{task}', function(Task $task) {
    // $task= collect($tasks)->firstWhere('id',$id);
    // if(!$task){
    //     abort(Response::HTTP_NOT_FOUND);
    // }
    // return view('show',['task'=>$task]);

    return view('show',['task'=> $task ]);
    
})->name('tasks.show');


Route::get('/create',function(){
    return view('create');
})->name('tasks.create');

Route::post('/tasks' , function(TaskRequest $request){
   
    $task=Task::create($request->validated());
    return redirect()->route('tasks.show',['task'=>$task->id])->with('success','Task Created Successfully!');
})->name('tasks.store');


Route:: get('/tasks/{task}/edit', function(Task $task) {
    
    return view('edit',[
        'task'=> $task
    ]);
    
})->name('tasks.edit');

Route::put('/tasks/{task}' , function(Task $task , TaskRequest $request){
    // dd($request->all());
    // $data= $request->validated();
    // $task->title=$data['title'];
    // $task->description=$data['description'];
    // $task->long_description=$data['long_description'];
    // $task->save();
    $task->update($request->validated());
    return redirect()->route('tasks.show',['task'=>$task->id])->with('success','Task Updated Successfully!');
})->name('tasks.update');


Route::delete('/tasks/{task}',function(Task $task){
    $task->delete();

    return redirect()->route('tasks.index')->with('success','Task Deleted Successfuly');

})->name('tasks.destroy');

route::put('/tasks/{task}/toggle-complete',function(Task $task){
    $task->toggleComplete();
    return redirect()->back()->with('success','Task Updated Successfully');
})->name('tasks.toggle-complete');

Route :: get('/404',function(){
 return view('404');
})->name('404');

Route::fallback(function(){
    return redirect()->route('404');
});