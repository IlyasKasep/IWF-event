<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\MediaPartner;
use App\Models\Order;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $speakers = Speaker::all();
        $sponsors = Sponsor::orderBy('price', 'desc')->get();
        $mediaPartners = MediaPartner::all();

        // Calculate dynamic ticket stock from 350 cap
        $totalQuota = 350;
        $paidTickets = Order::where('payment_status', 'paid')->sum('quantity');
        $remainingQuota = max(0, $totalQuota - $paidTickets);

        return view('landing', compact('speakers', 'sponsors', 'mediaPartners', 'remainingQuota', 'totalQuota'));
    }
}