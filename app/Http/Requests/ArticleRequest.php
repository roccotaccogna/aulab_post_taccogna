<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|unique:articles|min:5',
            'body' => 'required|min:10',
            'image' => 'image|required',
            'category' => 'required',
            'tags' => 'required'
        ];
    }
    public function messages(){
        return [
            'title.required' => 'Il Titolo è richiesto',
            'subtitle.required' => 'Il Sottotitolo è richiesto',
            'body.required' => 'Il corpo del testo è richiesto',
            'image.required' => 'Immagine richiesta',
            'category.required' => 'Categoria richiesta',
            'title.min' => 'Il titolo deve avere minimo 5 caratteri',
            'subtitle.min' => 'Il sottotitolo deve avere minimo 5 caratteri',
            'body.min' => 'Il corpo del testo deve avere minimo 10 caratteri'
        ];
    }
}
