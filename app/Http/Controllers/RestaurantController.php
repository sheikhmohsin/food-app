<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function listingApi(Request $request)
    {
        try {
            $search = null;
            if($request->has('search')) {
                $search = $request->get('search');
                $records = $this->listing($search);
            } else {
                $records = $this->listing();
            }
            return ['status' => 200, 'message' => 'success', 'error' => false, 'data' => $records];
        } catch(\Exception $e) {
            return ['status' => $e->getCode(), 'message' => $e->getMessage(), 'error' => true];
        }
    }

    private function listing($search = null)
    {
        if($search) {
            $restaurant = Restaurant::with(['category', 'sub_category', 'first_review', 'tags'])->where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->get()->toArray();
        } else {
            $restaurant = Restaurant::with(['category', 'sub_category', 'first_review', 'tags'])->get();
        }

        return $restaurant;
    }

    public function showApi($id)
    {
        $restaurant = $this->show($id);
        if($restaurant) {
            return ['status' => 200, 'message' => 'success', 'error' => false, 'data' => $restaurant];
        } else {
            abort(404, 'Record not found.');
        }
    }

    private function show($id)
    {
        $restaurant = Restaurant::where('id', $id)->with(['category', 'sub_category', 'city', 'state', 'country', 'reviews', 'tags'])->get();
        if(count($restaurant)) {
            return $restaurant->first();
        }
        return false;
    }
}
