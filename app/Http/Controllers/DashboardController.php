<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // --- 1. TEMPÉRATURE ---
        $temp = (float)shell_exec("cat /sys/class/thermal/thermal_zone0/temp") / 1000;

        // --- 2. RAM (Utilisée / Totale) ---
        $free = shell_exec('free -m');
        $lines = explode("\n", (string)$free);
        $stats = preg_split('/\s+/', $lines[1]);
        $totalRam = $stats[1] / 1000; // en MB converti en GB
        $usedRam = $stats[2] / 1000;  // idem

        // --- 3. STOCKAGE (Utilisé / Total) ---
        $diskTotal = disk_total_space("/") / (1024 * 1024 * 1024); // Converti en Go
        $diskFree = disk_free_space("/") / (1024 * 1024 * 1024);
        $diskUsed = $diskTotal - $diskFree;
        $diskPercent = ($diskUsed / $diskTotal) * 100;

        // --- 4. UTILISATION CPU ---
        // On utilise 'top' en mode "batch" pour avoir un instantané
        $cpuRaw = shell_exec("top -bn1 | grep 'Cpu(s)'");
        // On extrait le pourcentage d'utilisation (100% - idle)
        preg_match('/(\d+\.\d+)\s+id/', $cpuRaw, $matches);
        $cpuUsage = 100 - (float)$matches[1];

        return view('home', [
            'users' => \App\Models\User::all(),
            'temp' => round($temp, 1),
            'cpu' => round($cpuUsage, 1),
            'ramUsed' => $usedRam,
            'ramTotal' => $totalRam,
            'diskUsed' => round($diskUsed, 1),
            'diskTotal' => round($diskTotal, 1),
            'diskPercent' => round($diskPercent),
        ]);
    }
}
