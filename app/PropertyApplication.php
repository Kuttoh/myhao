<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyApplication extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'property_applications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function property()
    {
        return $this->belongsTo(DeveloperProperty::class, 'developer_property_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function progress()
    {
        return $this->belongsTo(ApplicationProgress::class, 'progress_id');
    }

    public function financialInstitution()
    {
        return $this->belongsTo(FinancialInstitution::class, 'financial_institution_id');
    }
}
