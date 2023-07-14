<?php

namespace App\Imports;

use App\Models\Option;
use App\Models\Category;
use App\Models\Question;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OptionsImport implements ToCollection
{
    use Importable;
// --------------------------------------------------
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){

            $category = Category::firstOrCreate([
                'category_name'      =>   $row[0],
                'description'        =>   $row[1],
                'nb_question'        =>   $row[2],
            ]);
            $question = Question::create([
                'question_name'        =>   $row[3],
                'category_id'          =>   $category->id,
            ]);
            $option = Option::create([
                'question_id'        =>   $question->id,
                'option_1'           =>   $row[4],
                'option_2'           =>   $row[5],
                'option_3'           =>   $row[6],
                'option_4'           =>   $row[7],
                'correct_answer'     =>   $row[8],
            ]);
        }
    }

}
