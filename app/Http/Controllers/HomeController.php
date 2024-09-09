<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Patient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getIdData()
    {
        $data = Data::select('id_data')->orderBy('created_at', 'DESC')->first();

        return $data;
    }

    public function formQuesioner()
    {
        $dataQuestions = [
            'pertanyaan' => [
                'Polydipsia (Excessive thirst)',
                'Polyuria (Frequent urination)',
                'Polyphagia (Excessive hunger)',
                'Extreme fatigue',
                'Blurred vision',
                'Neuropathy (Nerve damage)',
                'Acanthosis nigricans',
                'Sudden weight loss',
                'Slow healing of wounds or frequent infections',
                'Difficulty concentrating'
            ],
            'deskripsi' => [
                'High blood sugar forces the kidneys to work harder to eliminate the excess glucose through urine, which leads to dehydration and a persistent feeling of thirst',
                'The elevated sugar in the blood pulls more water into the kidneys, increasing urine output. This causes frequent urination as the body tries to get rid of the excess glucose.',
                'When the body can’t use glucose for energy due to a lack of insulin, the cells remain “hungry,” triggering the brain to increase appetite, even though the body can’t effectively use the food consumed.',
                'The body’s inability to properly use glucose for energy, either due to insufficient insulin or insulin resistance, leaves cells without fuel. This results in constant tiredness, even without physical exertion.',
                'High blood sugar causes changes in the shape of the eye’s lens, making vision blurry. If blood sugar levels stay high for an extended period, this can lead to more serious eye issues, like diabetic retinopathy.',
                'Prolonged high blood sugar damages the small blood vessels that supply nerves, particularly in the feet. This leads to numbness, tingling, burning sensations, or pain—a condition called diabetic neuropathy.',
                'This skin condition, where areas like the neck or armpits become darkened and thickened, often signals insulin resistance, a hallmark of type 2 diabetes.',
                'In type 1 diabetes, when the body cannot use glucose for energy, it starts breaking down fat and muscle, leading to rapid, unintended weight loss.',
                'Elevated blood sugar weakens the immune system and damages blood vessels, slowing down the body’s ability to heal wounds and making infections, particularly in the feet, more likely. This can result in diabetic ulcers.',
                'Blood sugar that is too high (hyperglycemia) or too low (hypoglycemia) disrupts brain function, leading to difficulty focusing, confusion, or even fainting in severe cases.'
            ]
        ];

        return view('form', compact(
            'dataQuestions'
        ));
    }

    public function submitForm(Request $request)
    {
        // Get Data
        $name = $request->patient_name;
        $contact = $request->contact;

        $result = 0;
        for ($i = 0; $i < 10; $i++) {
            $data = 'answer' . $i;

            $answer =  $request->input($data);

            if ($answer == 0) {
                $result += 5;
            }
        }

        $result = Patient::updateOrCreate([
            'name' => $name,
            'contact' => $contact,
            'result' => $result
        ]);

        return view('check', compact(
            'result'
        ));
    }

    public function getResult(Request $request)
    {
        $id = $request->id;
        $id_data = $request->id_data;

        // Cek data alat
        if ($id_data == 1 || $id_data == 3) {
            $result = true;
            $totalDataAlat = 50;
        } else {
            $result = false;
            $totalDataAlat = 0;
        }

        // cek data kuesioner
        $data = Patient::find($id);
        $totalDataForm = $data->result;

        $totalResult = $totalDataAlat + $totalDataForm;

        if ($totalResult >= 85) {
            $color = 'text-success';
        } elseif($totalResult >= 75 && $totalResult <= 85) {
            $color = 'text-warning';
        }else{
            $color = 'text-danger';
        }


        return view('result', compact(
            'color',
            'id_data',
            'data',
            'result',
            'totalDataAlat',
            'totalDataForm',
            'totalResult'
        ));
    }
}
