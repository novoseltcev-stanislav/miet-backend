<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request): Factory|View|Application
    {
        $customers = Customer::query();
        $filters = [
            'is_blocked' => function($customers, $request) {
                return $customers->where('is_blocked', $request->get('is_blocked'));
            },
            'email' => function($customers, $request) {
                return $customers->where('email', 'like', '%' . $request->get('email') . '%');
            },
            'phone_number' => function($customers, $request) {
                return $customers->where('phone_number', 'like', '%' . $request->get('phone_number') . '%');
            },
            'name' => function($customers, $request) {
                $name = $request->get('name');
                return $customers->where('name', 'like', '%' . $name . '%')->orWhere('surname', 'like', '%' . $name . '%');

            }
        ];
        foreach ($request->keys() as $key) {
            if ($request->__isset($key)) {
                try {
                    $customers = $filters[$key]($customers, $request);
                } catch (\Exception) {}
            }
        }
        return view('customers', [
            'customers' => $customers->paginate(20, ['*'], 'page', intval($request->__isset('page') ? $request->get('page'): 1))
        ]);
    }

    public function show(int $id): Application|Factory|View
    {
        return view('customer', [
            'customer' => Customer::query()->findOrFail($id)
        ]);
    }
}
