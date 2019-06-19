<?php

namespace App\Http\Controllers\Member;

use DB;
use Auth;
use App\Models\Klien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct() {
        
    }

    public function index()
    {
        $data['startDate'] = Date('d/m/Y', strtotime('-6 days'));
        $data['endDate'] = Date('d/m/Y');
        $data['pendapatan'] = Klien::where('idMember', Auth::guard('member')->user()->id)
        ->where("kliens.status", 'deal')
        ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
        ->sum("penghasilans.fee");
        $data['potensi_pendapatan'] = Klien::where('idMember', Auth::guard('member')->user()->id)
        ->where("kliens.status", 'pending')
        ->orWhere("kliens.status", 'negosiasi')
        ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
        ->sum("penghasilans.fee");
        $data['totalPendapatan'] = $data['pendapatan'] + $data['potensi_pendapatan'];
        $data['percentage'] = [
            'pendapatan' => ($data['pendapatan']/$data['totalPendapatan']*100),
            'potensi_pendapatan' => ($data['potensi_pendapatan']/$data['totalPendapatan']*100)
        ];
        $data['deal_klien'] = Klien::where('idMember', Auth::guard('member')->user()->id)
        ->where("kliens.status", 'deal')->count();
        $data['negosiasi_klien'] = Klien::where('idMember', Auth::guard('member')->user()->id)
        ->where("kliens.status", 'negosiasi')->count();
        $data['pending_klien'] = Klien::where('idMember', Auth::guard('member')->user()->id)
        ->where("kliens.status", 'pending')->count();
        $data['all_klien'] = $data['deal_klien'] + $data['negosiasi_klien'] + $data['pending_klien'];
        $data['chartPending'] = [];
        $data['chartNegosiasi'] = [];
        $data['chartDeal'] = [];
        $data['xAxis'] = [];
        $data['pendapatanChart'] = 0;
        $data['pendapatanChartPending'] = 0;
        $data['pendapatanChartNegosiasi'] = 0;
        $data['pendapatanChartDeal'] = 0;
        $intRow = 0;
        for ($i=6; $i >= 0; $i--) {
            $data['xAxis'][($intRow)] =  Date('M d', strtotime('-'.$i.' days'));
            $data['chartPending'][($intRow)] = Klien::where('idMember', Auth::guard('member')->user()->id)
            ->where('kliens.status', 'pending')
            ->whereDate('kliens.created_at', Date('Y-m-d', strtotime('-'.$i.' days')))
            ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
            ->sum('penghasilans.fee');
            $data['pendapatanChartPending'] += $data['chartPending'][($intRow)];
            $data['chartNegosiasi'][($intRow)] = Klien::where('idMember', Auth::guard('member')->user()->id)
            ->where('kliens.status', 'negosiasi')
            ->whereDate('kliens.created_at', Date('Y-m-d', strtotime('-'.$i.' days')))
            ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
            ->sum('penghasilans.fee');
            $data['pendapatanChartNegosiasi'] += $data['chartNegosiasi'][($intRow)];
            $data['chartDeal'][($intRow)] = Klien::where('idMember', Auth::guard('member')->user()->id)
            ->where('kliens.status', 'deal')
            ->whereDate('kliens.created_at', Date('Y-m-d', strtotime('-'.$i.' days')))
            ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
            ->sum('penghasilans.fee');
            $data['pendapatanChartDeal'] += $data['chartDeal'][($intRow)];
            $data['pendapatanChart'] += $data['chartPending'][($intRow)] + $data['chartNegosiasi'][($intRow)] + $data['chartDeal'][($intRow)];
            $intRow += 1;
        }
        return view('member.member_dashboard')->with($data);
    }
}
