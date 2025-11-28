<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'articles';

    protected $primaryKey = 'id'; 
    
    protected $allowedFields = ['title', 'content'];

    protected $returnType = 'App\Entities\Article';

    protected $validationRules = [
        'title'   => 'required|max_length[255]',
        'content' => 'required',
    ];

    protected $validationMessages = [
        'title' => [
            'required'   => 'The {field} field is required.',
            'max_length' => 'The {field} cannot exceed {param} characters.',
        ],
        'content' => [
            'required' => 'The {field} field is required.',
        ],
    ];

}