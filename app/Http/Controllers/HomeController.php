<?php

namespace App\Http\Controllers;

use App\Models\Data;
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
                'Sering merasa haus (Polidipsia)',
                'Sering buang air kecil (Poliuria) terutama di malam hari',
                'Rasa lapar berlebihan (Polifagia), meskipun sudah makan cukup',
                'Kelelahan ekstrem tanpa sebab yang jelas',
                'Penglihatan kabur atau penglihatan ganda',
                'Luka atau infeksi yang sulit sembuh, terutama di kaki',
                'Kulit kering dan gatal',
                'Penurunan berat badansecara drastis meskipun nafsu makan meningkat',
                'Kesemutan atau mati rasa di tangan dan di kaki (Neuropati)',
                'Perubahan warna kulit seperti menggelap di daerah lipatan, misalnya leher atau ketiak (Acanthosis nigricans)'
            ],
            'deskripsi' => [
                'Merupakan gejala klasik diabetes mellitus. Kadar gula darah yang tinggi membuat ginjal bekerja lebih keras untuk mengeluarkan kelebihan gula melalui urin, yang menyebabkan dehidrasi dan meningkatkan rasa haus',
                'Kadar gula darah yang tinggi menyebabkan ginjal menarik lebih banyak cairan untuk mengencerkan glukosa dalam darah, menghasilkan volume urin yang lebih banyak',
                'Terjadi ketika tubuh tidak dapat menggunakan glukosa sebagai sumber energi karena kekurangan insulin, sehingga otak memberi sinyal untuk terus makan meskipun tubuh tidak dapat memanfaatkan nutrisi dengan baik',
                'Kelelahan terjadi karena sel-sel tubuh tidak mendapatkan cukup energi akibat kurangnya insulin atau resistensi insulin, yang menyebabkan tubuh tidak dapat menggunakan glukosa dengan efektif',
                'Kadar gula darah yang tinggi dapat menyebabkan perubahan pada lensa mata, yang mengakibatkan penglihatan kabur. Jika dibiarkan, ini bisa berkembang menjadi kondisi mata yang lebih serius, seperti retinopati diabetik',
                ''
            ]
        ];

        return view('form', compact(
            'dataQuestions'
        ));
    }
}
