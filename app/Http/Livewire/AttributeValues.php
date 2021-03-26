<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Http\Controllers\AttributeValueController;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Route;


class AttributeValues extends Component
{

    public $attributeId;
    public AttributeValue $value;
    public $valueId;
    public $valueValue;
    public $valuePrice;


    public function render()
    {
        return view('livewire.attribute-values',  ['values'=>Route::post('/get-values',function($attributeId){

        })]);
    }


    public function mount(AttributeValue $value)
    {
        $this->valueId = $value->id;
        $this->valueValue = $value->value;
        $this->valuePrice = $value->price;
    }

}
