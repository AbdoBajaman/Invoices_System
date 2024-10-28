<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\products;
use App\Models\sections;
use Illuminate\Http\Request;
// use App\invoices;
use Fx3costa\Laravelchartjs\Chartjs;
class HomeController extends Controller
{



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $sections = sections::all();

        $sectionProductCounts = [];


        foreach ($sections as $section) {
            $count = Products::where('section_id', $section->id)->count();
            $sectionProductCounts[$section->id] = [
                'section_name' => $section->section_name, // Assuming you have a name field
                'product_count' => $count,
            ];
        }

        // Debug the result
        // dd($sectionProductCounts);



     //invoices
      $count_all =invoices::count();
      $count_invoices1 = invoices::where('value_status', 1)->count();
      $count_invoices2 = invoices::where('value_status', 2)->count();
      $count_invoices3 = invoices::where('value_status', 3)->count();


      if($count_invoices2 == 0){
          $nspainvoices2=0;
      }
      else{
          $nspainvoices2 = $count_invoices2/ $count_all*100;
      }

        if($count_invoices1 == 0){
            $nspainvoices1=0;
        }
        else{
            $nspainvoices1 = $count_invoices1/ $count_all*100;
        }

        if($count_invoices3 == 0){
            $nspainvoices3=0;
        }
        else{
            $nspainvoices3 = $count_invoices3/ $count_all*100;
        }


        // $chartjs = app()->chartjs
        //     ->name('barChartTest')
        //     ->type('bar')
        //     ->size(['width' => 350, 'height' => 200])
        //     ->labels(['الفواتير الغير المدفوعة', 'الفواتير المدفوعة','الفواتير المدفوعة جزئيا'])
        //     ->datasets([
        //         [
        //             "label" => "الفواتير الغير المدفوعة",
        //             'backgroundColor' => ['#ec5858'],
        //             'data' => [$nspainvoices2]
        //         ],
        //         [
        //             "label" => "الفواتير المدفوعة",
        //             'backgroundColor' => ['#81b214'],
        //             'data' => [$nspainvoices1]
        //         ],
        //         [
        //             "label" => "الفواتير المدفوعة جزئيا",
        //             'backgroundColor' => ['#ff9642'],
        //             'data' => [$nspainvoices3]
        //         ],


        //     ])
        //     ->options([]);


        // $chartjs_2 = app()->chartjs
        //     ->name('pieChartTest')
        //     ->type('pie')
        //     ->size(['width' => 340, 'height' => 200])
        //     ->labels(['الفواتير الغير المدفوعة', 'الفواتير المدفوعة','الفواتير المدفوعة جزئيا'])
        //     ->datasets([
        //         [
        //             'backgroundColor' => ['#ec5858', '#81b214','#ff9642'],
        //             'data' => [$nspainvoices2, $nspainvoices1,$nspainvoices3]
        //         ]
        //     ])
        //     ->options([]);

        // dd($nspainvoices1.'2nd'.$nspainvoices2.'3rd'.$nspainvoices3);
        return view('home', compact('nspainvoices1', 'nspainvoices2', 'nspainvoices3','count_all','sectionProductCounts'));

    }
}
