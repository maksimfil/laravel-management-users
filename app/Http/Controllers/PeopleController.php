<?php

namespace App\Http\Controllers;

use App\Models\People;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    public function index()
    {
        return People::all();
    }

    public function show($id)
    {
        $person = People::find($id);
        if (is_null($person)) {
            return \response()->json(['status' => 0,
                'message' => 'This person doesn\'t exist']);
        } else {
            return People::find($id);
        }
    }

    public function store(Request $request)
    {
        $person = new People();
        $person->first_name = $request->get('first_name');
        $person->last_name = $request->get('last_name');
        $person->email = $request->get('email');
        $person->phone_number = $request->get('phone_number');
        $person->password = encrypt($request->get('password'));
        $person->save();
        return 'Successful added!';
    }

    public function destroy($id)
    {
        $person = People::find($id);
        if (is_null($person)) {
            return \response()->json(['status' => 0,
                'message' => 'This person doesn\'t exist']);
        } else {
            $deletedPerson = People::find($id);
            $deletedPerson->delete();
            return 'Successful deleted!';
        }

    }

    public function update($id, Request $request)
    {
        $person = People::find($id);
        if (is_null($person)) {
            return \response()->json(['status' => 0,
                'message' => 'This person doesn\'t exist']);
        } else {
            $updatedPerson = People::find($id);
            $updatedPerson->first_name = $request->get('first_name');
            $updatedPerson->last_name = $request->get('last_name');
            $updatedPerson->email = $request->get('email');
            $updatedPerson->phone_number = $request->get('phone_number');
            $updatedPerson->password = encrypt($request->get('password'));
            $updatedPerson->update();
            return 'Successful update!';
        }
    }

    public function changePassword($id, Request $request)
    {
        $person = People::find($id);
        if (is_null($person)) {
            return \response()->json(['status' => 0,
                'message' => 'This person doesn\'t exist']);
        } else {
            $updatedPerson = People::find($id);
            $updatedPerson->password = encrypt($request->get('new_password'));
            $updatedPerson->update();
            return 'Successful patched!';
        }

    }
}
