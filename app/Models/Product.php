<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image'];

    /** Method Search */
    public function search($filter = null)
    {   /** Utiliza o use para poder utilizar o $filter passado */
        $results = $this->where(function($query) use($filter){

            if($filter){
                $query->where('name', 'LIKE', "%{$filter}%");
                // Podemos utilizar mais de uma where
                //$query->where('description', 'LIKE', "%{$filter}%");
            }

        })
        // Mostra a Query SQL
        //->toSql();
        ->paginate();
        return $results;

    }
}
