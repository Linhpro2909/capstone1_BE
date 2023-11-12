<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeTaiSinhVien extends Model
{
    use HasFactory;
    protected $table='de_tai_sinh_viens';
    protected $fillable=[
           'ten_sinh_vien',
           'ma_so_sinh_vien',
           'ten_de_tai',
           'mo_ta',
           'ngon_ngu_lap_trinh',
           'tinh_trang',
    ];
}
