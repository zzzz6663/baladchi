<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

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




Route::get('/event', function () {
    event(new \App\Events\NewTest('hi'));

});
Route::get('/b/{user}', function(User $user) {
    Auth::login($user,true);
    return redirect()->route('panel.chat');


    // $img = Image::make(public_path('/media/temp/5.jpg'));
    // $img->save(public_path('/mediea/temp/3.jpg'),5);
    // return $img->response('jpg');

//     $original_image = public_path('/media/temp/5.jpg');
// $new_image = public_path('/media/temp/6.jpg');
// $image = imagecreatefromjpeg($original_image);
// imagejpeg($image , $new_image , 30);

});




Route::prefix('admin')->namespace('admin')->group(function () {
    // login admin
    Route::get('/login', 'AdminController@login')->name('admin.login');
    Route::post('/check_login', 'AdminController@check_login')->name('admin.check.login');
    Route::post('/get_brand_year_list', 'YearController@get_brand_year_list')->name('get_brand_year_list');
    Route::post('/change_subset_required/{subset}', 'QuestionController@change_subset_required')->name('change.subset.required')->middleware(['role:admin']);
    Route::post('/change_telic_required/{telic}', 'QuestionController@change_telic_required')->name('change.telic.required')->middleware(['role:admin']);
    Route::post('/question_active/{question}', 'QuestionController@question_active')->name('question.active')->middleware(['role:admin']);
    Route::any('/add_question_to_telic/{telic}', 'QuestionController@add_question_to_telic')->name('add.question.to.telic')->middleware(['role:admin']);
    Route::any('/add_question_to_subset/{subset}', 'QuestionController@add_question_to_subset')->name('add.question.to.subset')->middleware(['role:admin']);
    Route::any('/telic_copy_question/{telic}', 'TelicController@telic_copy_question')->name('telic.copy.question')->middleware(['role:admin']);
    Route::any('/subset_copy_question/{subset}', 'SubsetController@subset_copy_question')->name('subset.copy.question')->middleware(['role:admin']);
    Route::post('/sub_cat_list/{category}', 'CategoryController@sub_cat_list')->middleware(['role:admin']);
    Route::post('/change_advertise_status/{advertise}', 'AdvertiseController@change_advertise_status')->name('change.advertise.status')->middleware(['role:admin']);

    Route::any('/add_filter_to_telic/{telic}', 'FilterController@add_filter_to_telic')->name('add.filter.to.telic')->middleware(['role:admin']);
    Route::any('/add_filter_to_subset/{subset}', 'FilterController@add_filter_to_subset')->name('add.filter.to.subset')->middleware(['role:admin']);
    Route::post('/insert_attach_answer', 'CounselController@insert_attach_answer')->name('insert.attach.answer')->middleware(['role:admin']);
    Route::post('/confirm_counsel/{counsel}', 'CounselController@confirm_counsel')->name('confirm.counsel')->middleware(['role:admin']);
    Route::post('/confirm_comment/{comment}', 'CommentController@confirm_comment')->name('confirm.comment')->middleware(['role:admin']);
    Route::post('/user_authenticate/{user}', 'UserController@user_authenticate')->name('user.authenticate')->middleware(['role:admin']);
     Route::post('/confirm_resume/{resume}', 'ResumeController@confirm_resume')->name('confirm.resume')->middleware(['role:admin']);
    Route::resource('region', 'RegionController')->middleware(['role:admin']);
    Route::resource('telic', 'TelicController')->middleware(['role:admin']);
    Route::resource('subset', 'SubsetController')->middleware(['role:admin']);
    Route::resource('category', 'CategoryController')->middleware(['role:admin']);
    Route::resource('city', 'CityController')->middleware(['role:admin']);
    Route::resource('province', 'ProvinceController')->middleware(['role:admin']);
    Route::resource('filter', 'FilterController')->middleware(['role:admin']);
    Route::resource('question', 'QuestionController')->middleware(['role:admin']);
    Route::resource('brand', 'BrandController')->middleware(['role:admin']);
    Route::resource('report', 'ReportController')->middleware(['role:admin']);
    Route::resource('user', 'UserController')->middleware(['role:admin']);
    Route::resource('advertise', 'AdvertiseController')->middleware(['role:admin']);
    Route::resource('bill', 'BillController')->middleware(['role:admin']);
    Route::resource('skill', 'SkillController')->middleware(['role:admin']);
    Route::resource('counsel', 'CounselController')->middleware(['role:admin']);
    Route::resource('deposit', 'DepositController')->middleware(['role:admin']);
    Route::resource('comment', 'CommentController')->middleware(['role:admin']);
    Route::resource('talk', 'TalkController')->middleware(['role:admin']);
    Route::resource('allresumes', 'ResumeController')->middleware(['role:admin']);;
    Route::resource('setting', 'SettingController')->middleware(['role:admin']);;
    Route::resource('support', 'SupportController')->middleware(['role:admin']);;

    // Route::post('/new_adventure', 'UserController@new_adventure')->name('user.new.adventure');
});

Route::prefix('panel')->middleware(['auth',"role:user"])->group(function () {

    Route::get('/dashboard', 'PanelController@dashboard')->name('panel.dashboard');
    Route::get('/advertises', 'PanelController@advertises')->name('panel.advertises');
    Route::any('/edit_advertise/{advertise}', 'PanelController@edit_advertise')->name('panel.edit.advertise');
    Route::get('/faves', 'PanelController@faves')->name('panel.faves');
    Route::any('/account', 'PanelController@account')->name('panel.account');
    Route::get('/transactions', 'PanelController@transactions')->name('panel.transactions');
    Route::get('/support', 'PanelController@support')->name('panel.support');
    Route::get('/faqs', 'PanelController@faqs')->name('panel.faqs');
    Route::get('/talk', 'PanelController@talk')->name('panel.talk');
    Route::get('/wallet', 'PanelController@wallet')->name('panel.wallet');
    Route::get('/notes', 'PanelController@notes')->name('panel.notes');
    Route::get('/baladchi', 'PanelController@baladchi')->name('panel.baladchi');
    Route::any('/visitor', 'PanelController@visitor')->name('panel.visitor');
    Route::get('/resumes', 'PanelController@resumes')->name('panel.resume');
    Route::get('/chat', 'PanelController@chat')->name('panel.chat');
    Route::any('/assist', 'PanelController@assist')->name('panel.assist');
    Route::any('/deposit', 'PanelController@deposit')->name('panel.deposit');
    Route::post('/cancel_deposit/{deposit}', 'PanelController@cancel_deposit')->name('panel.cancel.deposit');
    Route::post('/accept_deposit/{deposit}', 'PanelController@accept_deposit')->name('panel.accept.deposit');




    Route::any('/new_counsel1', 'PanelController@new_counsel1')->name('panel.new.counsel1');
    Route::any('/new_counsel2/{counsel}', 'PanelController@new_counsel2')->name('panel.new.counsel2');
    Route::any('/new_counsel3/{counsel}', 'PanelController@new_counsel3')->name('panel.new.counsel3');




    Route::any('/counsel', 'PanelController@counsel')->name('panel.counsel');
    Route::post('/finish_counsel/{counsel}', 'PanelController@finish_counsel')->name('finish.counsel');
    Route::get('/counsel_answers/{counsel}', 'PanelController@counsel_answers')->name('counsel.answers');
    Route::get('/counsel_perview/{counsel}', 'PanelController@counsel_perview')->name('counsel.perview');
    Route::any('/panel_new_question/{counsel}', 'PanelController@panel_new_question')->name('panel.new.question');
    Route::post('/counselquestion_destrory/{counselquestion}', 'PanelController@counselquestion_destrory')->name('counselquestion.destrory');
    Route::post('/show_counsel/{counsel}', 'PanelController@show_counsel')->name('show.counsel');
    Route::post('/destroy_counsel/{counsel}', 'PanelController@destroy_counsel')->name('destroy.counsel');
    Route::post('/active_counsel/{counsel}', 'PanelController@active_counsel')->name('active.counsel');
    Route::post('/confirm_talk/{talk}', 'PanelController@confirm_talk')->name('confirm.talk');
    Route::any('/edit_counsel/{counsel}', 'PanelController@edit_counsel')->name('edit.counsel');
    Route::post('/insert_new_memo/{advertise}', 'PanelController@insert_new_memo')->name('insert.new.memo');

    Route::resource('resume', 'ResumeController');


    Route::any('/baladchi_form1', 'PanelController@baladchi_form1')->name('baladchi.form1');
    Route::any('/baladchi_form2', 'PanelController@baladchi_form2')->name('baladchi.form2');
    Route::any('/baladchi_form3', 'PanelController@baladchi_form3')->name('baladchi.form3');

    Route::get('/ad_logs/{advertise}', 'PanelController@ad_logs')->name('ad.logs');
    Route::post('/insert_report', 'PanelController@insert_report')->name('insert.report');
    Route::post('/insert_note/{advertise}', 'PanelController@insert_note')->name('insert.note');
    Route::post('/send_chat/{advertise}', 'PanelController@send_chat')->name('send.chat');
    Route::post('/send_direct/{user}', 'PanelController@send_direct')->name('send.direct');
    Route::post('/get_chat', 'PanelController@get_chat')->name('get.chat');
    Route::post('/check_seen', 'PanelController@check_seen')->name('check.seen');
    Route::post('/get_direct', 'PanelController@get_direct')->name('get.direct');
    Route::post('/seen_message/{advertise}', 'PanelController@seen_message')->name('seen.message');
    Route::post('/change_head', 'PanelController@change_head')->name('change.head');
    Route::post('/remove_note/{note}', 'PanelController@remove_note')->name('remove.note');
    Route::post('/insert_new_donate', 'PanelController@insert_new_donate')->name('insert.new.donate');

    // Route::post('/send_chat/{advertise}', 'PanelController@send_chat')->name('send.chat');
    Route::post('/delete_advertise/{advertise}', 'PanelController@delete_advertise')->name('delete.advertise');
    Route::post('/credit_check', 'PanelController@credit_check')->name('credit.check');
    Route::post('/remove_ad_img/{image}', 'PanelController@remove_ad_img')->name('remove.ad.img');
});


Route::middleware('auth')->group(function () {
    Route::post('/get_phone/{user}', 'HomeController@get_phone')->name('get.phone');
    Route::post('/check_fave/{advertise}', 'AdvertiseController@check_fave')->name('check.fave');
    Route::post('/check_fave_user/{user}', 'HomeController@check_fave_user')->name('check.fave.user');
    Route::post('/save_add_pictures', 'AdvertiseController@save_add_pictures')->name('save.add.pictures');
    Route::post('/insert_new_advertise/{advertise?}', 'AdvertiseController@insert_new_advertise')->name('insert.new.advertise');
    Route::post('/get_advertise_form/{advertise?}', 'AdvertiseController@get_advertise_form')->name('get.advertise.form');
    Route::get('/new_advertise', 'AdvertiseController@new_advertise')->name('new.advertise');
    Route::post('/search_brand/{telic}', 'AdvertiseController@search_brand') ;
    Route::post('/send_bill', 'BillController@send_bill')->name('send.bill') ;
    Route::get('/bill_verify', 'BillController@bill_verify')->name('bill.verify') ;
    Route::get('/result_pay/{bill}', 'BillController@result_pay')->name('result.pay') ;

    Route::get('/checkout/{advertise?}', 'BillController@checkout')->name('checkout.pay') ;
    Route::get('/counsel_quiz/{counsel}', 'HomeController@counsel_quiz')->name('counsel.quiz');
    Route::post('/insert_comment', 'HomeController@insert_comment')->name('insert.comment');
    Route::post('/insert_star', 'HomeController@insert_star')->name('insert.star');
    Route::post('/remove_star', 'HomeController@remove_star')->name('remove.star');

});

Route::get('/choose', 'HomeController@choose')->name('choose');

Route::get('/all_comment/{user}', 'HomeController@all_comment')->name('all.comment');;
Route::get('/single_user/{user}', 'HomeController@single_user')->name('single.user');;
Route::get('/single_ad/{advertise}', 'AdvertiseController@single_ad')->name('single.ad');;
Route::any('/filters', 'AdvertiseController@filters')->name('filters');;
Route::get('/ads', 'AdvertiseController@ads')->name('ads');;
// Route::get('/single_advertise/{advertise}', 'AdvertiseController@single_advertise')->name('single.advertise');;
Route::post('/check_password', 'HomeController@check_password');
Route::post('/update_password', 'HomeController@update_password');
Route::post('/check_code', 'HomeController@check_code');
Route::post('/resend_code', 'HomeController@resend_code');
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::post('/check_user_exist', 'HomeController@check_user_exist');
Route::post('/reload_captcha', 'HomeController@reload_captcha')->name('reload.captcha');

Route::post('/get_province_list', 'HomeController@get_province_list');
Route::post('/get_city_list', 'HomeController@get_city_list');
Route::post('/get_cat', 'HomeController@get_cat');
Route::post('/get_skill', 'HomeController@get_skill');
Route::post('/get_city/{province}', 'HomeController@get_city');
Route::post('/get_city/{province}', 'HomeController@get_city');
Route::post('/get_region/{city}', 'HomeController@get_region');
Route::get('/clear', 'HomeController@clear')->name('clear');
Route::get('/make_dir', 'HomeController@make_dir')->name('make.dir');

//صفحات وب سایت
//صفحات وب سایتس
//صفحات وبس سایت
Route::get('/sitemap', 'HomeController@sitemap')->name('sitemap');
Route::get('/', 'HomeController@index')->name('login');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/support', 'HomeController@support')->name('support');
Route::get('/baladchiha', 'HomeController@baladchiha')->name('baladchiha');
Route::post('/counsel_answer/{counsel}', 'HomeController@counsel_answer')->name('counsel.answer');

Route::get('/counsels', 'HomeController@counsels')->name('counsels');
Route::get('/single_counsel/{counsel}', 'HomeController@single_counsel')->name('single.counsel');
Route::get('/custom_travel', 'HomeController@custom_travel')->name('custom.travel');
Route::post('/share_log_submit/{advertise}', 'HomeController@share_log_submit')->name('share.log.submit');



Route::get('/go_to', 'HomeController@go_to')->name('go.to');
Route::get('/logout', 'HomeController@logout')->name('logout');


