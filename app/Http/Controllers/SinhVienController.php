<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;

class  SinhVienController extends Controller
{
    public function createData(Request $request)
    {
        $data = $request->all();
        SinhVien::create($data);
        return response()->json([
            'status'        => 1,
            'message'       => "Đã thêm sinh viên thành công!",
            // 'data'       => $request->all(),
        ]);
    }
    public function getData()
    {
        $data = SinhVien::get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function updateData(Request $request)
    {
        $sinh_vien  = SinhVien::where('id', $request->id)->first();
        if ($sinh_vien) {
            $sinh_vien->update($request->all());
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Sinh viên không tồn tại',
            ]);
        }
    }
    public function deleteData(Request $request)
    {

        $data = $request->all();

        $str = "";

        foreach ($data as $key => $value) {
            if (isset($value['check'])) {
                $str .= $value['id'] . ",";
            }

            $data_id = explode(",", rtrim($str, ","));

            foreach ($data_id as $k => $v) {
                $sinh_vien = SinhVien::where('id', $v);

                if ($sinh_vien) {
                    $sinh_vien->delete();
                } else {
                    return response()->json([
                        'status'    => false,
                        'message'   => 'Đã có lỗi sự cố!',
                    ]);
                }
            }
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Đã xóa thành công!',
        ]);
    }
    public function searchData(Request $request)
    {
        $ten_can_tim    = '%' . $request->ten_sinh_vien . '%';
        $data   = SinhVien::where('ten_sinh_vien', 'like', $ten_can_tim)->get();

        return response()->json([
            'data'          => $data,
        ]);
    }
}
