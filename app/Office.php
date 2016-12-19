<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Baum;
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
    public function states()
    {
    	return $this->belongsTo('App\State','state_id');
    }
}
