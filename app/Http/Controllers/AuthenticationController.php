<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Hash;
use Str;
use Session;
use Carbon\Carbon;

// Model Database
use App\Models\MsStaffModel;

class AuthenticationController extends Controller
{
    public function loginPage()
    {
        $UserLogin = session()->get('userLogin');
        
        if($UserLogin == null)
        {
            $titlePage = "Login";

            return view('main_contents.auth.auth_login', [
                'titlePage' => $titlePage,
            ]);
        }else{
            return redirect()->route('adm.dash');
        }
        
    }

    public function loginAct(Request $request)
    {
        $form_token = $request->token;
        $token_csrf = csrf_token();

        $data = null;

        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'tmp_username' => 'required',
                'tmp_password' => 'required',
            ]);

            if ($validator->fails())
            {
                $response_data['status'] = false;
                $response_code = "RC400";
                $message = "Form Tidak Tervalidasi Dengan Sistem";
            }else{
                if($form_token == $token_csrf)
                {
                    // Cek Data Dalam Database
                    $checkExistingData =  MsStaffModel::where('admin_username', $request->tmp_username)->first();
                    if($checkExistingData != null)
                    {
                        if(password_verify($request->tmp_password, $checkExistingData->admin_password))
                        {
                            if($checkExistingData->admin_status == 1 && $checkExistingData->admin_visible == 1)
                            {
                                $checkExistingData->last_login = Carbon::now('Asia/Jakarta');
                                $checkExistingData->save();

                                Session::put('userLogin', $checkExistingData);

                                $status = true;
                                $response_code = "RC200";
                                $message = "Anda Berhasil Login, Selamat Datang.";

                            }else{
                                $status = false;
                                $response_code = "RC401";
                                $message = "Account Anda Sudah Tidak Aktif..";
                            }
                        }else{
                            $status = false;
                            $response_code = "RC401";
                            $message = "Password Anda Tidak Sesuai..";
                        }
                    }else{
                        $status = false;
                        $response_code = "RC404";
                        $message = "Username Tidak Ditemukan Dalam Sistem..";
                    }
                }else {
                    $status = false;
                    $response_code = "RC405";
                    $message = "Token CSRF Tidak Sesuai Dengan Sistem";
                }
            }
        }else{
            $status = false;
            $response_code = "RC405";
            $message = "Format Request Tidak Sesuai Dengan Sistem";
        }

        $response_data['status'] = $status;
        $response_data['response_code'] = $response_code;
        $response_data['message'] = $message;
        $response_data['data'] = $data;

        return response()->json($response_data, 200);
    }    

    public function registerPage()
    {
        $titlePage = "Register";
        
        return view('main_contents.auth.auth_register', [
            'titlePage' => $titlePage,
        ]);
    }

    public function registerAct(Request $request)
    {
        $form_token = $request->token;
        $token_csrf = csrf_token();

        $data = null;

        if ($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'tmp_namauser' => 'required',
                'tmp_username' => 'required',
                'tmp_password' => 'required',
                'tmp_email' => 'required',
            ]);

            if ($validator->fails())
            {
                $response_data['status'] = false;
                $response_code = "RC400";
                $message = "Form Tidak Tervalidasi Dengan Sistem";
            }else{
                if($form_token == $token_csrf)
                {
                    // Cek Data Dalam Database
                    $checkExistingData =  MsStaffModel::where('admin_username', $request->tmp_username)->orWhere('admin_email', $request->tmp_email)->first();

                    if($checkExistingData == null)
                    {
                        // dd("SA-".random_int(1000, 9999)."-".time());                        
                        try {
                            DB::beginTransaction();

                            $AddUser = new MsStaffModel();

                            $AddUser->admin_id = "SA-".random_int(1000, 9999)."-".time();
                            $AddUser->admin_role = 1;
                            $AddUser->admin_username = $request->tmp_username;
                            $AddUser->admin_email = $request->tmp_email;
                            $AddUser->admin_password = password_hash($request->tmp_password , PASSWORD_DEFAULT);
                            $AddUser->admin_nama = $request->tmp_namauser;
                            $AddUser->admin_status = 1;
                            $AddUser->admin_visible = 1;
                            $AddUser->hard_delete = 1;

                            $AddUser->save();

                            DB::commit();

                            $status = true;
                            $response_code = "RC200";
                            $message = "Data Users Berhasil Disimpan..";

                        } catch (\Throwable $error) {
                            DB::rollback();
                            $status = false;
                            $response_code = "RC400";
                            $message = "Tidak Dapat Menyimpan Kedalam Database";
                        }
                    }else{
                        $status = false;
                        $response_code = "RC400";
                        $message = "Username dan Email Sudah Ada Dalam Sistem";
                    }                    
                }else{
                    $status = false;
                    $response_code = "RC405";
                    $message = "Token CSRF Tidak Sesuai Dengan Sistem";
                }
            }

        }else{
            $status = false;
            $response_code = "RC405";
            $message = "Format Request Tidak Sesuai Dengan Sistem";
        }

        $response_data['status'] = $status;
        $response_data['response_code'] = $response_code;
        $response_data['message'] = $message;
        $response_data['data'] = $data;

        return response()->json($response_data, 200);
    }

    public function forgotpasswordPage()
    {
        $titlePage = "Forgot Password";
        
        return view('main_contents.auth.auth_forgotpassword', [
            'titlePage' => $titlePage,
        ]);
    }

    public function logoutAct()
    {
        Session::flush();
        return redirect()->route('auth.login');
    }
}
