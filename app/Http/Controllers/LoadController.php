<?php

namespace App\Http\Controllers;

use App\Models\Load;
use Illuminate\Http\Request;
use Validator;

class LoadController extends Controller
{
/**
 * Отбражение списка маршрутов
 * @return [type] [description]
 */
    public function index()
    {

        $points = Load::with('points')
            ->join('points', 'points.load_id', '=', 'loads.id')
            ->orderBy('points.date', 'DESC')
        // ->dd();
            ->get(['points.name AS route', 'points.date', 'loads.name', 'loads.weight']);

        return view('home', compact('points'));
    }

/**
 * Помещает новую запись в базу данных
 * @param  Request $request [description]
 * @return json
 */
    public function store(Request $request)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'from'   => 'required',
            'to'     => 'required',
            'load'   => 'required',
            'weight' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $load = Load::create([
            'name'   => $input['load'],
            'weight' => $input['weight'],
        ]);
        $point = $load->points()->create([
            'name' => $input['from'] . '-' . $input['to'],
            'date' => date('Y-m-d'),
        ]);

        $date = date('d-m-Y', strtotime($point->date));

        return json_encode(['date' => $date, 'route' => $point->name, 'name' => $load->name, 'weight' => $load->weight], 200);
    }

}
