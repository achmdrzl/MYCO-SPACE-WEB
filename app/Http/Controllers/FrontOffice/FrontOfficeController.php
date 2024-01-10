<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontOfficeController extends Controller
{
    public function index()
    {
        return view('frontoffice.homepage');
    }

    // SPACES FUNCTIONS
    public function indragiriIndex()
    {
        return view('frontoffice.locations.myco-indragiri');
    }

    public function cwIndex()
    {
        return view('frontoffice.locations.myco-cw');
    }

    public function satoriaIndex()
    {
        return view('frontoffice.locations.myco-satoria');
    }

    public function triliumIndex()
    {
        return view('frontoffice.locations.myco-trilium');
    }

    // OFFICE FUNCTIONS
    public function privateOffice()
    {
        return view('frontoffice.offices.private-office');
    }

    public function manageOffice()
    {
        return view('frontoffice.offices.manage-office');
    }

    public function virtualOffice()
    {
        return view('frontoffice.offices.virtual-office');
    }

    public function meetingRoom()
    {
        return view('frontoffice.offices.meeting-room');
    }

    // COWORKING AREAS FUNCTIONS
    public function hotDesk()
    {
        return view('frontoffice.coworking.hot-desk');
    }

    public function dedicatedDesk()
    {
        return view('frontoffice.coworking.dedicated-desk');
    }

    // BLOG FUNCTIONS
    public function blogIndex()
    {
        return view('frontoffice.company.blog');
    }

    public function blogDetail()
    {
        return view('frontoffice.company.blog-detail');
    }

    // CONTACT FUNCTION
    public function contanctIndex()
    {
        return view('frontoffice.company.contact');
    }

    // ABOUT FUNCTION
    public function aboutIndex()
    {
        return view('frontoffice.company.about-us');
    }

    // LOGIN
    public function login2()
    {
        return view('auth.login2');
    }


    // EVENT SPACES
    public function eventIndex()
    {
        return view('frontoffice.spaces.event-space');
    }

    public function podcastIndex()
    {
        return view('frontoffice.spaces.podcast-room');
    }

    public function studioIndex()
    {
        return view('frontoffice.spaces.studio-room');
    }
}
