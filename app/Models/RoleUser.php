<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /** @use HasFactory<\Database\Factories\RoleUserFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_user';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idrole_user';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'iduser',
        'idrole',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    /**
     * Get the user that owns the role user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    /**
     * Get the role that owns the role user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole', 'idrole');
    }

    /**
     * Get the temu dokter for the role user.
     */
    public function temu_dokter()
    {
        return $this->hasMany(TemuDokter::class, 'idrole_user', 'idrole_user');
    }

    /**
     * Get the rekam medis for the role user.
     */
    public function rekam_medis()
    {
        return $this->hasMany(RekamMedis::class, 'dokter_pemeriksa', 'idrole_user');
    }
}
