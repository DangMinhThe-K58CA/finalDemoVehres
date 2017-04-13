<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\GarageRepositoryInterface as GarageRepository;

class GarageController extends Controller
{
    protected $garageRepository;

    public function __construct(GarageRepository $repository)
    {
        $this->garageRepository = $repository;
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
        $garage->status = config('common.garage.status.activated');
        $garage->save();

        return redirect()->action('Admin\GarageController@index', ['status' => config('common.garage.status.activated')])
            ->with('success', trans('session.garages.garage_active_success'));

    }

    public function destroy($id)
    {
        $this->garageRepository->delete($id);

        return redirect()->action('Admin\GarageController@index', ['status' => config('common.garage.status.activated')])
            ->with('success', trans('session.garages.garage_delete_success'));
    }
}
