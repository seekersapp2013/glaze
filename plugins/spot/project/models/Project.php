<?php namespace Spot\Project\Models;

use Model;

/**
 * Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'spot_project_project';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];


    /**
     * @var array Relations
     */
    public $belongsTo = [
        'user' => [
            '\RainLab\User\Models\User',
        ],
    ];

    public $attachOne = [
        'file' => ['System\Models\File', 'delete' => true ]
    ];


}
