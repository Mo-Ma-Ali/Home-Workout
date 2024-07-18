<?php
///////////////////////////////////////////////////
//////REMEMBER TO CLEAN THE CODE AT THE END////////
///////////////////////////////////////////////////
use App\Http\Controllers\Admin;
use App\Http\Controllers\challenge;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Coach;
use App\Http\Controllers\ExerciseCompletionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\verifyController;
use App\Http\Controllers\Workout\CategoryController;
use App\Http\Controllers\Workout\ExerciseController;
use App\Http\Controllers\Workout\LevelsController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Http;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|"project_id": "training-app-12f6c",
  "private_key_id": "cf401b8578f59fb7627c80cc8e0ebfa5367b883a",
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('Payment',[\App\Http\Controllers\Payment::class,'makePayment']);

Route::get('/testnotification', function () {

    $fcm = "dwkcDf0hSYOdSWj_OiCaol:APA91bFSrhbeUf5DcMLDePwoNe6y0VtjwU_gumWLN2uq4h1wISXp30j0XT1zNIIkpbv8NxZ9APRE9wirQlT7vk2ruoS_7NWOI08BTm0Y_M858zfBXwZu01ZURwE-i6CN3SWMzeY-r-7K";

    $title = "اشعار جديد";
    $description = "تيست تيست تيست";

    $credentialsFilePath = "/json/file.json";  // local
    $credentialsFilePath = Http::get(asset('json/file.json')); // in server
    $client = new GoogleClient();
    $client->setAuthConfig($credentialsFilePath);
    $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
    $client->refreshTokenWithAssertion();
    $token = $client->getAccessToken();

    $access_token = $token['access_token'];

    $headers = [
        "Authorization: Bearer $access_token",
        'Content-Type: application/json'
    ];

    $data = [
        "message" => [
            "token" => $fcm,
            "notification" => [
                "title" => $title,
                "body" => $description,
            ],
        ]
    ];
    $payload = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/v1/projects/training-app-12f6c/messages:send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable verbose output for debugging
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
        return response()->json([
            'message' => 'Curl Error: ' . $err
        ], 500);
    } else {
        return response()->json([
            'message' => 'Notification has been sent',
            'response' => json_decode($response, true)
        ]);
    }
})->name('testnotification');

Route::get('GetCategory',[\App\Http\Controllers\ProductController::class,'GetCategoryProduct']);
Route::get('GetProduct/{id}',[\App\Http\Controllers\ProductController::class,'GetProductFromId']);
Route::post('register',[\App\Http\Controllers\UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('/admin',[Admin::class,'logAdmin']);
Route::get('logout',[UserController::class,'logout'])->middleware('auth:sanctum');
Route::post('forgot',[UserController::class,'forgot']);
Route::post('check_code',[UserController::class,'verfiyReset']);
Route::post('reset',[UserController::class,'reset']);
Route::post('verify',[verifyController::class,'verify'])->name('verify')->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function (){
    //ReportForProgress
    Route::get('DailyProgress',[\App\Http\Controllers\ReportController::class,'DailyForProgress']);////
    Route::get('WeeklyProgress',[\App\Http\Controllers\ReportController::class,'WeeklyForProgress']);
    Route::get('MonthlyProgress',[\App\Http\Controllers\ReportController::class,'MonthlyForProgress']);
    Route::get('annualProgress',[\App\Http\Controllers\ReportController::class,'annualForProgress']);
    //ReportFororder
    Route::get('Dailyorder',[\App\Http\Controllers\ReportController::class,'DailyForOrder']);/////
    Route::get('Weeklyorder',[\App\Http\Controllers\ReportController::class,'WeeklyForOrder']);
    Route::get('Monthlyorder',[\App\Http\Controllers\ReportController::class,'MonthlyForOrder']);
    Route::get('annualorder',[\App\Http\Controllers\ReportController::class,'annualFororder']);
    //ReportForExercise
    Route::get('DailyExe',[\App\Http\Controllers\ReportController::class,'DailyForExercise']);/////
    Route::get('WeeklyExe',[\App\Http\Controllers\ReportController::class,'WeeklyForExercise']);
    Route::get('MonthExe',[\App\Http\Controllers\ReportController::class,'MonthlyForExercise']);
    Route::get('annualExe',[\App\Http\Controllers\ReportController::class,'annualForExercise']);
    Route::get('GetExercise/{id}',[\App\Http\Controllers\ReportController::class,'GetExerciseWhereid']);

    Route::get('addpoint/{id}',[\App\Http\Controllers\AwardController::class,'EndOfExerciseToAddPoint']);//////
    Route::get('buywithpoints/{id}/{id1}',[\App\Http\Controllers\AwardController::class,'BuyWithPoint']);
    Route::post('addproduct',[\App\Http\Controllers\ProductController::class,'addproduct'])->middleware('admin');
    Route::get('updatepayment/{id}',[\App\Http\Controllers\OrderController::class,'UpdatePayment'])->middleware('admin');
    Route::get('DeleteOrder/{id}/{id1}',[\App\Http\Controllers\OrderController::class,'DeleteOrder']);
    Route::get('searchproduct/{id}',[\App\Http\Controllers\ProductController::class,'SearchProduct']);
    Route::get('getorderwithproduct/{id}',[\App\Http\Controllers\OrderController::class,'Getorderwithproducet']);
    Route::post('addtocart/{id}',[\App\Http\Controllers\OrderController::class,'AddToCart']);
    Route::get('getorder/{id}',[\App\Http\Controllers\OrderController::class,'GetOrder']);
    ///////
    Route::get('/user',[UserController::class,'getUser']);
    ///////
    Route::get('/allchallenges',[challenge::class,'returnAll']);
    Route::get('getchallenge/{name}',[\App\Http\Controllers\challenge::class,'Getchallenge']);
    //////
    Route::get('getChallInfo/{challenge_id}',[challenge::class,'getChallInfo']);
    ////////
    Route::get('/enroll/{challenge_id}',[challenge::class,'enroll']);
    ////////
    Route::put('/completed/{challenge_id}/{id}',[challenge::class,'endOfChallenge']);
    //Route::post('add',[\App\Http\Controllers\Admin::class,'Add']);
    /////
    Route::get('getCoach',[\App\Http\Controllers\Coach::class,'GetCoach']);
    ////
    Route::post('advice',[\App\Http\Controllers\Coach::class,'advice'])->middleware('couch');
    ////
    Route::get('Get/{id}',[\App\Http\Controllers\Coach::class,'getadvice']);
    ///////
    Route::get('getrequest',[\App\Http\Controllers\Coach::class,'getrequest'])->middleware('couch');
    /////
    Route::get('experience/{id}/{rating}',[\App\Http\Controllers\Coach::class,'good']);
    /////
    Route::post('Favorite',[UserController::class,'Favorite']);

    Route::get('AllFavorite',[UserController::class,'AllFavorit']);

    ///////
    Route::get('GetFavorite/{id}',[UserController::class,'GetFavorite']);
    ///////
    Route::get('/deleteFav/{id}',[UserController::class,'delFavorite']);
    ///////
    Route::post('challenge',[\App\Http\Controllers\challenge::class,'addchallenge'])->middleware('admin');
    ////////
    Route::post('/is_done',[TestController::class,'verfiyCategory']);
    ///////
    Route::get('/record',[TestController::class,'getRecord']);
    //////
    Route::post('add',[\App\Http\Controllers\UserController::class,'Add']);
    ///////
    Route::get('exercise',[ExerciseController::class,'index']);
    //////
    Route::post('exercise',[ExerciseController::class,'store'])->middleware('admin');
    ////
    Route::get('search/{id}',[ExerciseController::class,'Search']);
    ////requestAdvice
    Route::resource('level', LevelsController::class);
    ////
    Route::resource('categaroy',CategoryController::class);

    Route::post('requestAdvice',[Coach::class,'requestAdvice']);///////
    //////
    Route::post('/verifyExercise',[ExerciseCompletionController::class,'verifyExercise']);
    //////
    Route::get('/getExerciseRecord',[ExerciseCompletionController::class,'getExerciseRecord']);
    /////
    Route::post('/getExerciseRecord',[ExerciseCompletionController::class,'recordForCouch'])->middleware('couch');
    ///
    Route::post('TargetWeight',[\App\Http\Controllers\ProgressController::class,'TargetWeight']);
    Route::get('GetDetails/{id}',[\App\Http\Controllers\ProgressController::class,'GetDetails']);
    Route::post('calculate',[\App\Http\Controllers\ProgressController::class,'calculate']);
    Route::get('Plan/{id}',[UserController::class,'GetPlan']);
    Route::get('GetWeek',[UserController::class,'GetWeek']);
    Route::get('PlanForUser/{id}',[UserController::class,'PlanForUser']);
    Route::post('UpdatePlane/{id}',[UserController::class,'UpdatePlane']);
    Route::get('GetWeightLossExercises',[UserController::class,'GetWeightLossExercise']);
    Route::get('PlanForWeightLoss/{id}',[UserController::class,'PlanforWeightLoss']);
    Route::post('UpdatePlaneForWeightLoss/{id}',[UserController::class,'UpdatePlaneForWeightLoss']);
});
Route::post('/chat', [ChatController::class, 'chat']);
//Route::get('getexe',[ExerciseController::class,'Getexe']);
Route::post('image',[UserController::class,'image']);
Route::get('adminLogout',[Admin::class,'logout'])->middleware('admin');
//Route::get('addFavorite/{id}',[UserController::class,'Favorite']);
//Route::post('advice',[\App\Http\Controllers\coach::class,'advice']);///////

