<?php

namespace App;

use App\Scope\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Baum;
use Auth;
class Office extends Baum\Node
{
  	protected $table = 'offices';

    // 'parent_id' column name
    protected $parentColumn = 'parent_id';

    // 'lft' column name
    protected $leftColumn = 'lft';

    // 'rgt' column name
    protected $rightColumn = 'rgt';

    // 'depth' column name
    protected $depthColumn = 'depth';

    // guard attributes from mass-assignment
    protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    /*protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }*/

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);
            //$builder->whereIn('id', Auth::user()->options['allowedOffices']);
        });
    }

    public function states()
    {
    	return $this->belongsTo('App\State','state_id');
    }

    public function scopeActive($query){
        return $query->where('is_active',1);
    }
}
