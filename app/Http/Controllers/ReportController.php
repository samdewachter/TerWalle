<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use Storage;

class ReportController extends Controller
{
    public function showReports() {
    	$core_reports = Report::where('kind_of_report', 'kernverslag')->orderBy('date', 'DESC')->take(4)->get();
    	$activity_reports = Report::where('kind_of_report', 'activiteitenverslag')->orderBy('date', 'DESC')->take(4)->get();
    	$other_reports = Report::where('kind_of_report', 'ander')->orderBy('date', 'DESC')->take(4)->get();

    	return view('admin.reports.showReports', compact('core_reports', 'activity_reports', 'other_reports'));
    }

    public function newReport(){
    	return view('admin.reports.addReport');
    }

    public function addReport(Request $request){
    	$report = new Report();

    	$kind_of_report = $request->kind_of_report;

    	$this->validate($request, [
            'report_file' => 'required|mimes:doc,docx',
        ]);

        $uploaded_file = $request->file('report_file');

    	$file_path = Storage::put('uploads/reports/'. $kind_of_report, $uploaded_file);

    	$report->name = $request->name;
    	$report->file_path = $file_path;
    	$report->date = $request->date;
    	$report->kind_of_report = $kind_of_report;

    	if ($report->save()) {
    		return redirect('/admin/verslagen')->with('message', ['success', 'Verslag succesvol aangemaakt.']);
    	}
    	return redirect('/admin/verslagen')->with('message', ['error', 'Verslag niet succesvol aangemaakt.']);
    }

    public function downloadReport(Report $report){
    	$path = storage_path('app/'. $report->file_path);
		return response()->download($path);
    }

    public function allReports($kind_of_report){
    	$reports = Report::where('kind_of_report', $kind_of_report)->orderBy('date', 'DESC')->get();

    	switch ($kind_of_report) {
    		case 'kernverslag':
    			$kind_of_report = 'kernverslagen';
    			break;

    		case 'activiteitenverslag':
    			$kind_of_report = 'activiteitenverslagen';
    			break;

    		case 'ander':
    			$kind_of_report = 'andere verslagen';
    			break;
    		
    		default:
    			$kind_of_report = 'andere verslagen';
    			break;
    	}

    	return view('admin.reports.allReports', compact('reports', 'kind_of_report'));
    }

    public function editReport(Report $report){
    	return view('admin.reports.editReport', compact('report'));
    }

    public function updateReport(Request $request, Report $report){
    	$report->name = $request->name;
    	$report->date = $request->date;
    	$report->kind_of_report = $request->kind_of_report;

    	if ($request->hasFile('report_file')) {
    		Storage::delete($report->file_path);

    		$uploaded_file = $request->file('report_file');

    		$file_path = Storage::put('uploads/reports/'. $report->kind_of_report, $uploaded_file);

    		$report->file_path = $file_path;
    	}

		if ($report->save()) {
			return redirect('/admin/verslagen')->with('message', ['success', 'Verslag succesvol aangepast.']);
		}
    	return redirect('/admin/verslagen')->with('message', ['error', 'Verslag niet succesvol aangepast.']);
    }

    public function deleteReport(Report $report){
        if (Storage::delete($report->file_path)) {
            if ($report->delete()) {
                return redirect('/admin/verslagen')->with('message', ['success', 'Verslag succesvol verwijderd.']);
            }
            return redirect('/admin/verslagen')->with('message', ['error', 'Verslag niet succesvol verwijderd.']);
        }
        return redirect('/admin/verslagen')->with('message', ['error', 'Er ging iets fout bij het verwijderen van het bestand.']);
    }
}
