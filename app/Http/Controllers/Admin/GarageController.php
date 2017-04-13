<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\GarageRepositoryInterface as GarageRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Models\Notification;
use App\Notifications\UnactiveGarage;
use App\Events\UnActiveGarageEvent;

class GarageController extends Controller
{
    protected $garageRepository;
    protected $userRepository;

    public function __construct(
        GarageRepository $garageRepository,
        UserRepository $userRepository
    )
    {
        $this->garageRepository = $garageRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $status = $request->input('status');
        $garages = $this->garageRepository->findAllBy('status', $request->status)->paginate(config('common.paging_number'));

        return view('admins.garages.index', compact('status', 'garages'));
    }

    public function show($id)
    {
        $garage = $this->garageRepository->find($id);

        return view('admins.garages.show_garage', compact('garage'));
    }

    public function update(Request $request, $id)
    {
        $garage = $this->garageRepository->find($id);
        $send_user = $this->userRepository->find($garage->user_id);
        //unactive garage
        if ($garage->status == config('common.garage.status.activated')) {
            $garage->status = config('common.garage.status.unactivated');
            $garage->save();
            //send noti for partner
            $url = action('Partner\GarageController@show', $garage->id);
            $message = trans('admin.message.unactive_garage') . $garage->name;
            //
            $send_user->notify(new UnactiveGarage($garage, $url, $message));
            $tmpNoti = $send_user->unreadNotifications()->first();
            $created_at = $tmpNoti->created_at;
            $notiId = $tmpNoti->id;
            
            event(new UnActiveGarageEvent($send_user, $notiId, $garage, $url, $message, $created_at));

            return redirect()->action('Admin\GarageController@index', ['status' => config('common.garage.status.unactivated')])
            ->with('success', trans('session.garages.garage_unactive_success'));
        } elseif ($garage->status == config('common.garage.status.unactivated')) {
            $garage->status = config('common.garage.status.activated');
            $garage->save();

            return redirect()->action('Admin\GarageController@index', ['status' => config('common.garage.status.activated')])
            ->with('success', trans('session.garages.garage_active_success'));
        } else {
            return redirect()->action('Admin\GarageController@index', ['status' => config('common.garage.status.activated')])->with('errors', trans('session.garages.garage_not_found'));
        }
    }

    public function destroy($id)
    {
        $this->garageRepository->delete($id);

        return redirect()->action('Admin\GarageController@index', ['status' => config('common.garage.status.activated')])
            ->with('success', trans('session.garages.garage_delete_success'));
    }

    public function detailGarage($id)
    {
        $garage = $this->garageRepository->find($id);

        return view('admins.garages.detail', compact('garage'));
    }
}
