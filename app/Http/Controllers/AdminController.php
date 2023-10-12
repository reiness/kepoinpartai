<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfilePartai;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $partaiData = ProfilePartai::all();
        $feedbackData = Feedback::all();
        return view('admin-dashboard', compact('users', 'partaiData', 'feedbackData'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User has been deleted successfully.');
    }

    public function editPartai($id)
{
    $partai = ProfilePartai::where('id_partai', $id)->first();

    if (!$partai) {
        return response()->json(['success' => false, 'message' => 'Partai not found']);
    }

    return response()->json(['success' => true, 'partai' => $partai]);
}


    public function updatePartai(Request $request, $id)
    {
        $partai = ProfilePartai::find($id);

        if (!$partai) {
            return redirect()->route('admin.partaiTable')->with('error', 'Partai not found.');
        }

        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'nama_partai' => 'required',
            'ketua_umum' => 'required',
            'jumlah_kasus_suap_gratifikasi' => 'integer',
            'nominal_suap_gratifikasi' => 'integer',
            'kasus_korupsi' => 'integer',
            'jumlah_kasus_korupsi' => 'integer',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.partaiTable')
                ->with('error', 'Invalid data. Please check your input.');
        }

            // Update the partai data
        $partai->nama_partai = $request->input('nama_partai');
        $partai->ketua_umum = $request->input('ketua_umum');
        $partai->jumlah_kasus_suap_gratifikasi = $request->input('jumlah_kasus_suap_gratifikasi');
        $partai->nominal_suap_gratifikasi = $request->input('nominal_suap_gratifikasi');
        $partai->kasus_korupsi = $request->input('kasus_korupsi');
        $partai->jumlah_kasus_korupsi = $request->input('jumlah_kasus_korupsi');
        $partai->save();

        return redirect()->route('admin.partaiTable')->with('success', 'Partai data has been updated.');
    }


    // Middleware for admin access
    public function __construct()
    {
        $this->middleware(['auth', 'auth.admin']);
    }
}
