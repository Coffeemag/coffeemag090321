<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Http\Controllers\AttributeValueController;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Route;


class AttributeValues extends Component
{

    public AttributeValue $value;
    public $value;
    public $valueId;
    public $valueValue;
    public $valuePrice;
    public Request $request;

    public function render(Request $request)
    {
        return view('livewire.attribute-values',  ['values'=>Route::post('/get-values',function(Request $request){

        })]);
    }


    public function mount(Request $request)
    {
        Route::post('/get-values',function(Request $request){
            return view('livewire.attribute-values', [] );
        });

    }

}
