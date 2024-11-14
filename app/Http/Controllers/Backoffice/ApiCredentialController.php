<?php

namespace App\Http\Controllers\Backoffice;

use App\Helpers\AesEncryptionHelper;
use App\Http\Controllers\Controller;
use App\Models\ApiCredential;
use App\Models\User;
use Illuminate\Http\Request;

class ApiCredentialController extends Controller
{
    public function index()
    {
        $apiCredentials = ApiCredential::all();
        return view('backend.apicredentials.index', compact('apiCredentials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agent_url' => 'required|string|max:255',
            'agent_code' => 'required|string|max:255',
            'agent_signature' => 'required|string|max:255',
            'agent_password' => 'nullable|string',
            'agent_type' => 'required|in:sg,nexus,sgx',
        ]);

        if ($request->has('agent_status') && $request->agent_status == 1) {
            ApiCredential::where('agent_status', 1)->update(['agent_status' => 0]);
        }

        ApiCredential::create($request->all());

        return response()->json(['success' => true, 'message' => 'API Credential created successfully']);
    }


    public function edit($b)
    {
        $apiCredential = ApiCredential::findOrFail($b);
        return response()->json(['apiCredential' => $apiCredential]);
    }

    public function update(Request $request, $id)
    {
        $apiCredential = ApiCredential::findOrFail($id);

        if ($request->agent_status == 1) {
            ApiCredential::where('agent_status', 1)->update(['agent_status' => 0]);
        }

        $apiCredential->update([
            'agent_url' => $request->agent_url,
            'agent_code' => $request->agent_code,
            'agent_signature' => $request->agent_signature,
            'agent_password' => $request->agent_password,
            'agent_type' => $request->agent_type,
            'agent_status' => $request->agent_status,
        ]);

        return response()->json(['success' => true, 'message' => 'API Credential updated successfully']);
    }

    public function destroy($id)
    {
        ApiCredential::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'API Credential deleted successfully']);
    }
}
