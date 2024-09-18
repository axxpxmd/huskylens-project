<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Patient;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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
                'Polyuria',
                'Polydipsia',
                'Polyphagia',
                'Diabetic Neuropathy ',
                'Unexplained Weight Loss',
                'Acanthosis Nigricans',
                'Fatigue',
                'Blurry Vision',
                'Recurrent Infections',
                'Slow Healing Wounds'

            ],
            'deskripsi' => [
                'Excessive urination is a hallmark symptom of diabetes, caused by elevated blood glucose levels. The kidneys attempt to expel excess glucose through urine, leading to increased frequency and volume of urination',
                'Excessive thirst accompanies polyuria. The significant loss of fluids through urine causes dehydration, triggering intense thirst as the body attempts to compensate for fluid loss',
                'Excessive hunger is another common symptom. Despite elevated glucose levels in the bloodstream, the body’s cells cannot absorb and utilize glucose effectively due to insufficient insulin or insulin resistance, causing the body to signal for more food',
                'Diabetic peripheral neuropathy is characterized by nerve damage, particularly in the extremities (hands and feet). This can manifest as numbness, tingling, or pain and is a result of long-term hyperglycemia, which damages nerve fibers.',
                'Sudden and unintentional weight loss occurs despite an increase in appetite. This happens because the body, unable to use glucose for energy due to insulin dysfunction, begins to break down muscle and fat stores to meet energy demands',
                'This condition presents as darkened, velvety patches of skin, commonly found in the neck, armpits, or groin areas. Acanthosis nigricans is often associated with insulin resistance, a precursor to type 2 diabetes.',
                'Fatigue in diabetes is not merely a general tiredness. It stems from the body’s inability to efficiently use glucose for energy. When glucose cannot enter the cells due to insulin deficiency or resistance, energy levels drop, leading to chronic exhaustion',
                'Visual disturbances in diabetes are typically caused by fluctuations in blood sugar levels, which can alter the shape of the eye’s lens. This swelling of the lens leads to temporary blurry vision. Over time, prolonged hyperglycemia may cause retinopathy, leading to permanent vision impairment',
                'Diabetic individuals are prone to recurrent infections, particularly in the skin, urinary tract, and oral cavity. Hyperglycemia impairs the immune system, making it difficult for the body to fight off infections. Additionally, high glucose levels in tissues create an ideal environment for bacterial and fungal growth.',
                'Impaired wound healing is a characteristic feature of diabetes. High blood sugar damages blood vessels and restricts blood flow to the affected areas, reducing the supply of oxygen and nutrients essential for tissue repair. This also compromises the immune response, making wounds more susceptible to infections and further delaying the healing process.'
            ]
        ];

        $provinsi = Provinsi::select('id', 'n_provinsi')->get();

        return view('form', compact(
            'dataQuestions',
            'provinsi'
        ));
    }

    public function getKotaByProvinsi($provinsi_id)
    {
        $kota = Kota::select('id', 'provinsi_id', 'n_kota')->where('provinsi_id', $provinsi_id)->get();

        return $kota;
    }

    public function getKecamatanByKota($kota_id)
    {
        $kecamatans = Kecamatan::select('id', 'kota_id', 'n_kecamatan')->where('kota_id', $kota_id)->get();

        return $kecamatans;
    }

    public function submitForm(Request $request)
    {
        // Get Data
        $name = $request->patient_name;
        $contact = $request->contact;
        $provinsi_id = $request->provinsi_id;
        $kota_id = $request->kota_id;
        $kecamatan_id = $request->kecamatan_id;

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
            'provinsi_id' => $provinsi_id,
            'kota_id' => $kota_id,
            'result' => $result,
            'kecamatan_id' => $kecamatan_id
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
        } elseif ($totalResult >= 75 && $totalResult <= 85) {
            $color = 'text-warning';
        } else {
            $color = 'text-danger';
        }

        $provinsi_id = $data->provinsi_id;
        $kota_id = $data->kota_id;
        $kecamatan_id = $data->kecamatan_id;

        $data_rumah_sakit = Http::get('https://rs-bed-covid-api.vercel.app/api/get-hospitals?provinceid=' . $provinsi_id . 'prop&cityid=' . $kota_id . '&type=2');
        $res_data_rumah_sakit = $data_rumah_sakit->json();
        $detail_rumah_sakit = $res_data_rumah_sakit['hospitals'];

        $data->update([
            'final_result' => $totalResult
        ]);

        return view('result', compact(
            'id',
            'detail_rumah_sakit',
            'color',
            'id_data',
            'data',
            'result',
            'totalDataAlat',
            'totalDataForm',
            'totalResult'
        ));
    }

    public function printReport($patient_id)
    {
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->setPaper('a4', 'portrait');

        $data = Patient::find($patient_id);

        // Check
        if ($data->final_result >= 85) {
            $risk_level = 'Low';
        } elseif ($data->final_result >= 75 && $data->final_result <= 85) {
            $risk_level = 'Moderate';
        } else {
            $risk_level = 'High';
        }

        if ($data->final_result >= 75) {
            $status = 'Negative';
            $text = 'Continue with regular health check-ups and maintain a healthy lifestyle';
        } else {
            $status = 'Positive';
            $text = 'Schedule a consultation with your healthcare provider for further tests and management';
        }

        $pdf->loadView('report', compact(
            'data',
            'risk_level',
            'status',
            'text'
        ));

        return $pdf->stream("test" . ".pdf");
    }

    public function sendEmail($patient_id)
    {
        $data = Patient::find($patient_id);

        $email    = $data->contact;
        $mailFrom = config('app.mail_from');
        $mailName = config('app.mail_name');

        // Check
        if ($data->final_result >= 85) {
            $risk_level = 'Low';
        } elseif ($data->final_result >= 75 && $data->final_result <= 85) {
            $risk_level = 'Moderate';
        } else {
            $risk_level = 'High';
        }

        if ($data->final_result >= 75) {
            $status = 'Negative';
            $text = 'Continue with regular health check-ups and maintain a healthy lifestyle';
        } else {
            $status = 'Positive';
            $text = 'Schedule a consultation with your healthcare provider for further tests and management';
        }


        $dataEmail = array(
            'name' => $data->name,
            'final_result' => $data->final_result,
            'provinsi' => $data->provinsi->n_provinsi,
            'kota' => $data->kota->n_kota,
            'kecamatan' => $data->kecamatan->n_kecamatan,
            'risk_level' => $risk_level,
            'status' => $status,
            'text_status' => $text
        );

        // print
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->setPaper('legal', 'portrait');
        $pdf->loadView('report', compact(
            'data'
        ));

        // get content PDF
        $content = $pdf->download()->getOriginalContent();

        Mail::send('mail', $dataEmail, function ($message) use ($email, $mailFrom, $mailName, $content, $data) {
            $message->to($email)->subject('Diabetes Detection');
            $message->attachData($content, $data->name . '.pdf');
            $message->from($mailFrom, $mailName);
        });

        return redirect()->back()->withSuccess('Email sent successfully!');
    }

    public function aboutUnited()
    {
        return view('about-united');
    }

    public function aboutDiabeted()
    {
        return view('about-diabetes');
    }
}
