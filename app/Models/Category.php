<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'slug'];

    public function parent()
    {
        //karena relasinya dengan dirinya sendiri, maka class model nya adalah classnya sendiiri
        //belongsTo digunakan untuk refleksi ke data induknya
        return $this->belongsTo(Category::class);
    }

    //nama method local scope diawali dengan kata 'scope'
    //local scope digunakan untuk mengelompokkan query yang bisa digunakan kembali pada kondisi lain
    public function scopeGetParent($query)
    {
        //semua query yang menggunakan local scope akan ditambahkan kondisi whereNull
        return $query->whereNull('parent_id');
    }

    //MUTATOR
    //untuk memodifikasi data sebelum data disimpan ke database
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    //ACCESSOR
    //formatting yang dilakukan setelah data diterima database
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function child()
    {
        //menggunakan relasi one to many dengan foreignkey parent_id
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function product()
    {
        //Relasi one to many, kategori ini bisa digunakan oleh banyak produk
        return $this->hasMany(Product::class);
    }

    // Fungsi recursive (belum FIX)
    // public function childRecursive()
    // {
    //     return $this->child()->with('childRecursive');
    // }
}
