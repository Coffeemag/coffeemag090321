<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Http\Controllers\AttributeValueController;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Route;


class AttributeValues extends Component
{

    public $values , $Attvalue, $Attprice, $attribute_id;

    public function render()
    {

        return view('livewire.attribute-values');
    }

    public function loadValue(){

        $this->values = Route::post('/get-values', [AttributeValueController::class, 'getValues']);
        $this->values = json_decode( $this->loadValue(), true);
    }
}
