<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Capsule\Manager as DB;

class Product extends Model {
    use SoftDeletes;

    /* public function findProducts($filter = []) {
        $query = DB::table($this->table);
        foreach ($filter as $key => $value) {
            $query->where($key, '=', $value);
        }
        return $query->get();
    }

    public function findProduct($filter = []) {
        $query = DB::table($this->table);
        foreach ($filter as $key => $value) {
            $query->where($key, '=', $value);
        }
        return $query->first();
    }

    public function createProduct($data) {
        $newProduct = new Product;
        foreach ($data as $key => $value) {
            $newProduct->{$key} = $value;
        }
        $newProduct->save();
        return $newProduct;
    }

    public function updateProduct($filter, $data) {
        $query = DB::table($this->table);
        foreach ($filter as $key => $value) {
            $query->where($key,$value);
        }
        return $query->update($data);
    } */
}