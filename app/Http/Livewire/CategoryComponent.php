<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

use Livewire\WithPagination;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;
    public $scategory_slug;

    public function mount($category_slug,$scategory_slug=null)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
        $this->scategory_slug = $scategory_slug;

        $this->min_price = 500;
        $this->max_price = 1000000;
    }

    public function store($products_id,$products_name,$products_price)
    {
        Cart::add($products_id,$products_name,1,$products_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('products.cart');
    }

    public function addToWishlist($products_id,$products_name,$products_price)
    {
        Cart::instance('wishlist')->add($products_id,$products_name,1,$products_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
    }

    public function removeFromWishlist($products_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $products_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }

    use WithPagination;
    public function render()
    {
        $category_id = null;
        $category_name = "";
        $filter = "";
        if($this->scategory_slug)
        {
            $scategory = Subcategory::where('slug',$this->scategory_slug)->first();
            $category_id = $scategory->id;
            $category_name = $scategory->name;
            $filter = "sub";
        }
        else
        {
            $category = Category::where('slug',$this->category_slug)->first();
            $category_id = $category->id;
            $category_name = $category->name;
            $filter = "";
        }

        if($this->sorting=='date')
        {
            $products = Product::where($filter.'category_id',$category_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->where('stock_status',['instock'])->orderBy('created_at','DESC',)->paginate($this->pagesize);

        }
        else if($this->sorting=='price')
        {
            $products = Product::where($filter.'category_id',$category_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->where('stock_status',['instock'])->orderBy('regular_price','ASC')->paginate($this->pagesize);

        }
        else if($this->sorting=='price-desc')
        {
            $products = Product::where($filter.'category_id',$category_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->where('stock_status',['instock'])->orderBy('regular_price','DESC')->paginate($this->pagesize);

        }
        else{
            $products = Product::where($filter.'category_id',$category_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->where('stock_status',['instock'])->paginate($this->pagesize);

        }

        $categories = Category::all();
        return view('livewire.category-component',['products'=> $products,'categories'=>$categories,'category_name'=>$category_name])->layout('layouts.base');
    }
}
