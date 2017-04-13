<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use DB;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->paginate(config('common.paging_number'));

        return view('admins.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->userRepository->find($id);
        if ($user->role == config('common.user.role.partner')) {
            $user->role = config('common.user.role.user');
            $user->save();

            return redirect()->action('Admin\UserController@index')
            ->with('success', trans('session.users.unpartner_success'));
        } elseif ($user->role == config('common.user.role.user')) {
            $user->role = config('common.user.role.partner');
            $user->save();

            return redirect()->action('Admin\UserController@index')
            ->with('success', trans('session.users.make_partner_success'));
        } else {
            return redirect()->action('Admin\UserController@index')->with('errors', trans('session.users.user_not_found'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if ($user->role == config('common.user.role.admin'))
        {
            return redirect()->action('Admin\UserController@index')->with('warning', trans('session.users.no_delete_admin'));
        } else {
            DB::beginTransaction();
            try {
                $user->garages()->delete();
                $user->visits()->delete();
                $user->articles()->delete();
                $user->bookmarks()->delete();
                $user->delete();
                DB::commit();

                return redirect()->action('Admin\UserController@index')
                ->with('success', trans('session.users.user_delete_success'));
            } catch (\Exception $e) {
                DB::rollBack();

                return redirect()
                    ->action('Admin\UserController@index');
            }
        }
    }
}
