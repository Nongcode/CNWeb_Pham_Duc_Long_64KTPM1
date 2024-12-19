<?php

namespace App\Http\Controllers;

use App\Models\computer;
use App\Models\issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Sử dụng paginate thay vì all() để phân trang 
        $issues = issue::with('computer')->paginate(10);

        // Điều hướng trở về trang index
        return view('index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = computer::all(); // Lấy danh sách máy tính
        return view('create', compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate dữ liệu đưa vào
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required|date',
            'urgency' => 'required',
            'status' => 'required'
        ]);

        issue::create($request->all());

        // Điều hướng trở về trang index với thông báo thành công 
        return redirect()->route('issues.index')->with('success','Vấn đề đã được thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $issue = issue::findOrFail($id);
        $computers = computer::all();
        return view('edit', compact('issue', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Kiểm tra dữ liệu đầu vào 
         $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required|date',
            'urgency' => 'required',
            'status' => 'required'
        ]);

        // Tìm thuốc cần cập nhật 
        $issue = issue::findOrFail($id);
        
        // Cập nhật thông tin vấn đề thuốc
        $issue -> update($request->all());

        // Điều hướng trở về trang index với thông báo thành công 
        return redirect()->route('issues.index')->with('success', 'Chỉnh sửa thông tin vấn đề thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issue = issue::findOrFail($id);
        $issue -> delete();

        // Điều hướng trở về trang index với thông báo thành công 
        return redirect()->route('issues.index')->with('success', 'Xóa thông tin vấn đề thành công');
    }
}
