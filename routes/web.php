<?php


//use App\Models\User;
//use App\Facades\Test;
//use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\GoogleLogin;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\ServerController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SandboxController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ErrorLogController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\CorporateController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IntenshipController;
use App\Http\Controllers\Admin\AutoDeployController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\ImpersonateController;
use App\Http\Controllers\Admin\MailTemplateController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Client\company\CompanyController;
use App\Http\Controllers\Client\student\StudentController;
use App\Http\Controllers\Client\university\UniversityController;




Route::get('/', [ClientController::class, 'home'])->name('app.home');
Route::get('/news', [ClientController::class, 'blogs'])->name('app.blogs');
Route::get('/news/{slug}', [ClientController::class, 'blog'])->name('app.blog');
Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('app.user.dashboard');

Route::get('/internships/{category}', [ClientController::class, 'internships'])->name('app.internships');
Route::get('/internship/{id}', [ClientController::class, 'detail_internship'])->name('app.internship.detail');
Route::get('/blog/{slug}', [ClientController::class, 'blog_detail'])->name('app.blog.detail');
Route::get('/search', [ClientController::class, 'search_internships'])->name('app.internship.search');


Route::get('/terms', [ClientController::class, 'terms'])->name('app.terms');
Route::get('/privacy', [ClientController::class, 'privacy'])->name('app.privacy');

Route::get('/auth/verify',[RegisterController::class,'verifyUser'])->name('app.auth.verify');

Route::get('/getlocation',[CompanyController::class,'getlocation'])->name('generate.location');

//Student
//Route::prefix('/student')->middleware(['student','auth'])->group(base_path('routes/student.php'));
Route::group(['middleware'=>['auth','student'],'prefix'=>'student'],function(){
    
    Route::get('/', [StudentController::class, 'home'])->name('student.home');
    Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::post('/profile/update', [StudentController::class, 'profile_update'])->name('student.profile.update');

    Route::get('/resume', [StudentController::class, 'resume'])->name('student.resume');
    Route::get('/resume/new', [StudentController::class, 'resume_new'])->name('student.resume.new');


    Route::get('/resume/education', [StudentController::class, 'resume_education'])->name('student.resume.education');
    Route::post('/resume/education/add', [StudentController::class, 'resume_education_add'])->name('student.resume.education.add');
    Route::get('/resume/education/edit/{id}', [StudentController::class, 'resume_education_edit'])->name('student.resume.education.edit');
    Route::put('/resume/education/{id}/update', [StudentController::class, 'resume_education_update'])->name('student.resume.education.update');
    Route::get('/resume/education/delete/{id}', [StudentController::class, 'resume_education_delete'])->name('student.resume.education.delete');
   

    Route::get('/resume/experience', [StudentController::class, 'resume_experience'])->name('student.resume.experience');
    Route::post('/resume/experience/add', [StudentController::class, 'resume_experience_add'])->name('student.resume.experience.add');
    Route::get('/resume/experience/edit/{id}', [StudentController::class, 'resume_experience_edit'])->name('student.resume.experience.edit');
    Route::put('/resume/experience/{id}/update', [StudentController::class, 'resume_experience_update'])->name('student.resume.experience.update');
    Route::get('/resume/experience/delete/{id}', [StudentController::class, 'resume_experience_delete'])->name('student.resume.experience.delete');


    Route::get('/resume/skills', [StudentController::class, 'resume_skills'])->name('student.resume.skills');
    Route::post('/resume/skills/add', [StudentController::class, 'resume_skills_add'])->name('student.resume.skills.add');
    Route::get('/resume/skills/edit/{id}', [StudentController::class, 'resume_skills_edit'])->name('student.resume.skills.edit');
    Route::put('/resume/skills/{id}/update', [StudentController::class, 'resume_skills_update'])->name('student.resume.skills.update');
    Route::get('/resume/skills/delete/{id}', [StudentController::class, 'resume_skills_delete'])->name('student.resume.skills.delete');


    Route::get('/resume/achivement', [StudentController::class, 'resume_achivement'])->name('student.resume.achivement');
    Route::post('/resume/achivement/add', [StudentController::class, 'resume_achivement_add'])->name('student.resume.achivement.add');
    Route::get('/resume/achivement/edit/{id}', [StudentController::class, 'resume_achivement_edit'])->name('student.resume.achivement.edit');
    Route::put('/resume/achivement/{id}/update', [StudentController::class, 'resume_achivement_update'])->name('student.resume.achivement.update');

    Route::get('/internship/favorite/add/{id}', [StudentController::class, 'add_favourite_internship'])->name('app.student.favourite.internship');
    Route::get('/internship/favorite/delete/{id}', [StudentController::class, 'delete_favourite_internship'])->name('app.student.favourite.internship.delete');

    Route::get('/internship/apply/add/{id}', [StudentController::class, 'apply_internship'])->name('app.student.apply.internship');


    Route::get('/internships/shortlisted', [StudentController::class, 'internships_shortlisted'])->name('student.internships.shortlisted');
    Route::get('/internships/applied', [StudentController::class, 'internships_applied'])->name('student.internships.applied');

    Route::get('/cover_letter', [StudentController::class, 'cover_letter'])->name('student.coverletter');

    Route::get('/password_management', [StudentController::class, 'password_management'])->name('student.password.management');
    Route::post('/password_management/update', [StudentController::class, 'password_update'])->name('student.password.update');
});






//Corporate
Route::group(['middleware'=>['auth', 'corporate'],'prefix'=>'corporate'],function(){

    Route::get('/', [CompanyController::class, 'home'])->name('company.home');
    Route::get('/profile', [CompanyController::class, 'profile'])->name('company.profile');
    Route::post('/profile/update', [CompanyController::class, 'profile_update'])->name('company.profile.update');

    Route::get('/internship', [CompanyController::class, 'internship'])->name('company.internship');

    Route::get('/internship/show/{id}', [CompanyController::class, 'internship_view'])->name('company.internship.view');
    Route::get('/internship/edit/{id}', [CompanyController::class, 'internship_edit'])->name('company.internship.edit');
    Route::put('/internship/{id}/update', [CompanyController::class, 'internship_update'])->name('company.internship.update');

    Route::get('/internship/new', [CompanyController::class, 'internship_new'])->name('company.internship.new');
    Route::post('/internship/new/add', [CompanyController::class, 'internship_new_add'])->name('company.internship.new.add');
    Route::get('/internship/delete/{id}', [CompanyController::class, 'internship_delete'])->name('company.internship.delete');

    Route::get('/internship/{id}/applications', [CompanyController::class, 'internship_applications'])->name('company.internship.applications');
    Route::get('/internship/user/{id}', [CompanyController::class, 'internship_user_resume'])->name('company.internship.user.resume');
    

    Route::get('/resumes', [CompanyController::class, 'resumes'])->name('company.resumes');
    Route::get('/password_management', [CompanyController::class, 'password_management'])->name('company.password.management');
    Route::post('/password_management/update', [CompanyController::class, 'password_update'])->name('company.password.update');

});









Auth::routes();
Route::get('/auth/google', [GoogleLogin::class, 'redirectToGoogle'])->name('app.auth.google.login');
Route::get('/auth/google/callback', [GoogleLogin::class, 'handleGoogleCallback'])->name('app.auth.google.callback');

Route::group(['middleware'=>['auth','admin'],'prefix'=>'admin'],function(){

    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('/profile',ProfileController::class);
    Route::resource('/setting',SettingController::class);


    //App Menu Controller Routes
    Route::resource('/menu',MenuController::class);
    Route::get('/menu/{menu}/builder',[MenuController::class,'builder'])->name('menu.builder');
    Route::post('/menu/{menu}/builder/order',[MenuController::class,'order_item'])->name('menu.builder.order.item');
    Route::get('/menu/{menu}/builder/create',[MenuController::class,'addMenuItem_create'])->name('menu.item.create');
    Route::post('/menu/{menu}/builder/create',[MenuController::class,'addMenuItem'])->name('menu.item.add');
    Route::get('/menu/{menu}/builder/{item}/edit',[MenuController::class,'editMenuItem'])->name('menu.item.edit');
    Route::put('/menu/{menu}/builder/{item}/edit',[MenuController::class,'updateMenuItem'])->name('menu.item.update');
    Route::delete('/menu/{menu}/builder/{item}/delete',[MenuController::class,'deleteMenuItem'])->name('menu.item.delete');


    //Post
    Route::resource('/post',PostController::class);

    //Access Control
    Route::resource('/user',UserController::class);
    Route::resource('/permission',PermissionController::class);
    Route::resource('/role',RoleController::class);

    //Error Logs
    Route::get('/logs',[ErrorLogController::class,'index'])->name('admin.logs');


    //Routes Controller
     Route::resource('/route',RouteController::class);


    //Activity Log
    Route::resource('/activity',ActivityLogController::class);

    //Mail Templates
    Route::resource('/mtemplate',MailTemplateController::class);

    //crm
    //Route::resource('/posts',PostController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/tag',TagController::class);
    Route::resource('/subscription',SubscriptionController::class);
    Route::resource('/inquiry',InquiryController::class);
    Route::resource('/chat',ChatController::class);
    Route::resource('/file',FileController::class);


    //Sandbox
    Route::get('/mail',[SandboxController::class,'mail'])->name('sandbox.mail');
    Route::get('/mail/simple',[SandboxController::class,'simpleMail'])->name('sandbox.mail.simple');
    Route::get('/mail/dispatch',[SandboxController::class,'dispatchMail'])->name('sandbox.mail.dispatch');
    Route::post('/mail/dispatch/custom',[SandboxController::class,'dispatchMailCustom'])->name('sandbox.mail.dispatch.custom');

    //Sandbox-Aws server
    Route::resource('/server',ServerController::class);

    //Imporsonate
    if ('production' != config('app.env')) {
        Route::get('/impersonate',[ImpersonateController::class,'index'])->name('impersonate.index');
        Route::get('/impersonate/enter/{user_id}',[ ImpersonateController::class, 'impersonate'])->name('impersonate.enter');
        Route::get('/impersonate/leave',[ ImpersonateController::class, 'impersonate_leave'])->name('impersonate.leave');
    }

     //Client
     Route::resource('/contact',ContactController::class);

    //Client
    Route::resource('/client',ClientController::class);

     //Projects
     Route::resource('/project',ProjectController::class);


     //Tasks
     Route::resource('/task',TaskController::class);

   

    //Corporate
    Route::resource('/corporate',CorporateController::class);
    Route::resource('/internship',IntenshipController::class);

});

