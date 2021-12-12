<?php
namespace App\Models;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = ['name','guard_name','title','department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }


}
