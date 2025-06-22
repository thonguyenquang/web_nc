<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipper;

class ShipperController extends Controller
{
    public function index() {
        $shippers = Shipper::orderBy('id','asc')->paginate(15);
        return view('admin.shipper.index', compact('shippers'));
    }
    public function create() {
        return view('admin.shipper.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'status' => 'required',
            'password' => 'required|min:6',
        ]);
        // Tạo user cho shipper
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'shipper',
        ]);
        // Tạo shipper và liên kết user_id
        Shipper::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => $request->status,
            'user_id' => $user->id,
        ]);
        return redirect()->route('admin.shippers.index')->with('success', 'Tạo shipper thành công!');
    }
    public function edit(Shipper $shipper) {
        return view('admin.shipper.edit', compact('shipper'));
    }
    public function update(Request $request, Shipper $shipper) {
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'status' => 'required',
        ]);
        $shipper->update($request->all());
        return redirect()->route('admin.shippers.index')->with('success', 'Cập nhật shipper thành công!');
    }
    public function destroy(Shipper $shipper) {
        $shipper->delete();
        return redirect()->route('admin.shippers.index')->with('success', 'Xóa shipper thành công!');
    }
}
