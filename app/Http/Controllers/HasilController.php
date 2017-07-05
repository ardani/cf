<?php

namespace App\Http\Controllers;

use App\Hasil;
use App\Pengetahuan;
use App\Penyakit;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    private $hasil;
    private $penyakit;
    private $pengetahuan;
    public function __construct(Hasil $hasil, Penyakit $penyakit, Pengetahuan $pengetahuan)
    {
        $this->middleware('auth');
        $this->hasil = $hasil;
        $this->penyakit = $penyakit;
        $this->pengetahuan = $pengetahuan;
    }

    public function index()
    {
        $data['hasils'] = $this->hasil->paginate(30);
        return view('pages.hasil', $data);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        // -------- perhitungan certainty factor (CF) ---------
        // --------------------- START ------------------------
        $this->hasil->truncate();
        $penyakits = $this->penyakit->orderBy('kode_penyakit')->get();
        foreach ($penyakits as $penyakit) {
            $mbtemp = 0;
            $mdtemp = 0;
            foreach ($penyakit->pengetahuan as $pengetahuan) {
                $mbold = $mbtemp;
                $mdold = $mdtemp;
                $mbnew = $pengetahuan->mb;
                $mdnew = $pengetahuan->md;
                for ($i=0; $i < count($request->kode_gejala);$i++) {
                    $kode_gejala = $request->kode_gejala[$i];
                    if ($pengetahuan->kode_gejala == $kode_gejala){
                        $mbtemp = $mbold + ($mbnew * (1 - $mbold));
                        $mdtemp = $mdold + ($mdnew * (1 - $mdold));
                    }
                }
            }
            $cf = $mbtemp - $mdtemp;
            $this->hasil->create([
                'kode_penyakit' => $penyakit['kode_penyakit'],
                'nilai' => $cf
            ]);
        }

        // --------------------- END -------------------------

        echo "<h2>Hasil Diagnosis</h2>
          <table>
          <tr><td>Keluhan</td>   <td> ";
        for ($i=0; $i < count($_POST['gejala']);$i++) {
            $gejala = $_POST['gejala'][$i];
            $sql4 = mysql_query("SELECT * FROM gejala where kode_gejala = '$gejala'");
            $r4=mysql_fetch_array($sql4);
            echo $r4[nama_gejala]."<br>";
        }
        echo "</td></tr>
          <tr><td width=120>Kesimpulan</td>   <td> ";
        $sql3 = mysql_query("SELECT * FROM hasil order by nilai desc limit 1");
        while ($r3=mysql_fetch_array($sql3)){
            $sql4 = mysql_query("SELECT * FROM penyakit where kode_penyakit = '$r3[kode_penyakit]'");
            $r4=mysql_fetch_array($sql4);
            $rtot = mysql_fetch_array(mysql_query("SELECT sum(nilai) as total FROM hasil"));
            $persentase = ($r3[nilai] / $rtot[total]) * 100;
            if ($r3[nilai]!="0.00"){
                //echo "Jenis penyakit yang diderita <b>".$r4[nama_penyakit]."</b> - ".round($persentase,2)." % (".$r3[nilai].")<br>";
                echo "Jenis penyakit yang diderita adalah <b>".$r4[nama_penyakit]."</b>";
            }
        }
        echo "</td></tr>
          </table>";
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
