<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use URL;
use Validator;
use App\User;
use Helper;

class UsersController extends Controller {

    public function __construct() {
        Validator::extend('complexPassword', function($attribute, $value, $parameters) {
            $password = $parameters[1];

            if (preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[!@#$%^&*()])(?=\S*[\d])\S*$/', $password)) {
                return true;
            }
            return false;
        });
    }

    public function index(Request $request) {

        $qpArr = $request->all();
        $users = User::select('id', 'name', 'email');


        $users = $users->paginate(Session::get('paginatorCount'));

        //change page number after delete if no data has current page
        if ($users->isEmpty() && isset($qpArr['page']) && ($qpArr['page'] > 1)) {
            $page = ($qpArr['page'] - 1);
            return redirect('/users?page=' . $page);
        }

        return view('pages/users/index')->with(compact('users', 'qpArr'));
    }

    public function create(Request $request) {
        $qpArr = $request->all();
        return view('pages/users/create', compact('qpArr'));
    }

    public function store(Request $request) {
        $qpArr = $request->all();
        $pageNumber = $qpArr['filter'];

        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|complex_password:,' . $request->password,
            'conf_password' => 'required|same:password'
        ];

        $messages = array(
            'password.complex_password' => 'Weak Password! Follow password combination instruction above!',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('users/create' . $pageNumber)
                            ->withInput($request->except('password', 'conf_password'))
                            ->withErrors($validator);
        }

        $target = new User;
        $target->name = $request->name;
        $target->email = $request->email;
        $target->password = $request->password;



        if ($target->save()) {
            Session::flash('success', 'Users Create Succesfully');
            return redirect('users');
        } else {
            Session::flash('error', 'Users could not be Created');
            return redirect('users/create' . $pageNumber);
        }
    }

    public function edit(Request $request, $id) {
//       $this->authorize('edit',$user);

        $user = User::find($id);


        if (empty($user)) {
            Session::flash('error', 'Invalid data id');
            return redirect('users');
        }
        //passing param for custom function
        $qpArr = $request->all();

        return view('pages/users/edit')->with(compact('user', 'qpArr'));
    }

    public function update(Request $request, $id) {

        $target = User::find($id);
        //begin back same page after update
        $qpArr = $request->all();
        $pageNumber = $qpArr['filter'];
        //end back same page after update
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'conf_password' => 'same:password',
        ];


        if (!empty($request->password)) {
            $rules['password'] = 'complex_password:,' . $request->password;
            $rules['conf_password'] = 'same:password';
        }

        $messages = array(
            'password.complex_password' => __('label.WEAK_PASSWORD_FOLLOW_PASSWORD_INSTRUCTION'),
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('users/' . $id . '/edit' . $pageNumber)
                            ->withInput($request->all)
                            ->withErrors($validator);
        }

        $target->name = $request->name;
        $target->email = $request->email;
        if (!empty($request->password)) {
            $target->password = $request->password;
        }


        if ($target->save()) {
            Session::flash('success', 'Users Update Succesfully');
            return redirect('users');
        } else {
            Session::flash('error', 'Users could not be Updated');
            return redirect('users/' . $id . '/edit' . $pageNumber);
        }
    }

    public function destroy(Request $request, $id) {
        $target = User::find($id);
        //begin back same page after update
        $qpArr = $request->all();
        $pageNumber = !empty($qpArr['page']) ? '?page=' . $qpArr['page'] : '?page=';
        //end back same page after update

        if (empty($target)) {
            Session::flash('error','Invalid Data ID');
        }
        
        if ($target->delete()) {
            Session::flash('error','Users Delete Succesfully');
        } else {
            Session::flash('error', 'Users could not be Deleted');
        }
        return redirect('users' . $pageNumber);
    }

    public function setRecordPerPage(Request $request) {
        $referrerArr = explode('?', URL::previous());
        $queryStr = '';
        if (!empty($referrerArr[1])) {
            $queryParam = explode('&', $referrerArr[1]);
            foreach ($queryParam as $item) {
                $valArr = explode('=', $item);
                if ($valArr[0] != 'page') {
                    $queryStr .= $item . '&';
                }
            }
        }

        $url = $referrerArr[0] . '?' . trim($queryStr, '&');

        if ($request->record_per_page > 999) {
            Session::flash('error', "No of Record Must be less than 999");
            return redirect($url);
        }

        if ($request->record_per_page < 1) {
            Session::flash('error', "No of Record Must be Greater than 1");
            return redirect($url);
        }

        $request->session()->put('paginatorCount', $request->record_per_page);
        return redirect($url);
    }

}
