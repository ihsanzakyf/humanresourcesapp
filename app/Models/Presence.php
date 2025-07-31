<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presence extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'presences';

    protected $fillable = [
        'employee_id',
        'check_in',
        'check_out',
        'date',
        'status',
    ];

    public static function getIndexPresences()
    {
        $sql = "
        SELECT
            p.id,
            p.employee_id,
            p.check_in,
            p.check_out,
            p.date,
            p.status,
            p.created_at,
            p.updated_at,
            p.deleted_at,
            e.fullname AS employee_fullname
        FROM presences p
        LEFT JOIN employees e ON p.employee_id = e.id
        WHERE p.deleted_at IS NULL
        AND e.deleted_at IS NULL
        ORDER BY p.date ASC
    ";

        return DB::select($sql);
    }


    public static function filteringPresences($bulan, $tahun, $start, $end)
    {
        $sql = "
        SELECT
            p.id,
            p.employee_id,
            p.check_in,
            p.check_out,
            p.date,
            p.status,
            p.created_at,
            p.updated_at,
            p.deleted_at,
            e.fullname AS employee_fullname
        FROM presences p
        LEFT JOIN employees e ON p.employee_id = e.id
        WHERE p.deleted_at IS NULL
        AND e.deleted_at IS NULL
    ";
        $bindings = [];

        if (!empty($bulan)) {
            $sql .= " AND MONTH(p.created_at) = ?";
            $bindings[] = $bulan;
        }

        if (!empty($tahun)) {
            $sql .= " AND YEAR(p.created_at) = ?";
            $bindings[] = $tahun;
        }

        if (!empty($start) && !empty($end)) {
            $sql .= " AND p.date BETWEEN ? AND ?";
            $bindings[] = $start;
            $bindings[] = $end;
        }

        $sql .= " ORDER BY p.date ASC";

        return DB::select($sql, $bindings);
    }
}
